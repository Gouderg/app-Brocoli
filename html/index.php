<?php
	require_once("../php/database.php");
	require_once("../php/class/typeChamp.php");
	require_once("../php/fonIndex/checkForm.php");

	if(!isset($_SESSION)) session_start();
	
	$libelle = '';
	if (isset($_SESSION['libelle'])) {
		$libelle = $_SESSION['libelle'];
	}
	$_SESSION = array();
	/**** INITIALISATION DE LA PAGE ****/

	#Connexion à la base de donnée
	$db = dbConnect();
	if (!$db) {
		echo "Problème de connexion à la base de donnée";
		exit(1);
	}

	#On récupère le tableau de l'activité des champs
	$champType = dbRequestTypeActif($db);
	if (!$champType) {
		echo "Requête incorrecte ou table inexistante (dbRequestTypeActif)";
		exit(1);
	}

	#Si libelle n'est pas nulle, on récupère les données lui correspondant
	if (!empty($libelle)) {
		#Récupération de l'occurence de chaque type
		$typeValue = dbRequestModValue($db, $libelle);
		if (!$typeValue) {
			echo "Requête incorrecte ou table inexistante (dbRequestModValue)";
			exit(1);
		}
		#Récupération du nom de la table et du nom du modèle
		$dataMod = dbRequestModData($db, $libelle);
		if (!$dataMod) {
			echo "Requête incorrecte ou table inexistante (dbRequestModData)";
			exit(1);
		}
		$info = explode('_', $libelle);
		array_push($dataMod, $info[1]);

	}

	#On crée une array de class contenant chaque type avec son état et sa valeur
	$arrayTypeClass = array();
	foreach ($champType as $champ) {
		$isHere = True;
		if (!empty($libelle)) {
			foreach ($typeValue as $type) {
				if ($type['type_champ'] == $champ['type_champ']) {
					$isHere = False;
					$class = new TypeChamp($champ['type_champ'], $champ['actif'], $type['nbChamp']);
					array_push($arrayTypeClass, $class);
				}
			}
		}
		if ($isHere) {
			$class = new TypeChamp($champ['type_champ'], $champ['actif'], 0);
			array_push($arrayTypeClass, $class);
		}
	}

	#Ensemble de variable permettant de fermer proprement le formulaire
	$i = 0;
	$nbActif = 0;
	foreach($champType as $type) {
		if ($type['actif'] == 1) {
			$nbActif += 1;
		}
	}

	/**** VERIFICATION DU FORMULAIRE ****/
	$console = "";

	#Si on soumet le formulaire
	if (isset($_POST['suivant'])) {
		#On check les données à travers une fonction
		$console = checkFormIndex($_POST, $arrayTypeClass);
			
		#Si on a rencontré aucune erreur dans la saisie des données et que nomModele et nomTable ne sont pas nuls on envoie à travers $_SESSION
		if (!$console) {
			
			$_SESSION['nomModele'] = htmlspecialchars($_POST['nomModele']);
			$_SESSION['nomTable'] = htmlspecialchars($_POST['nomTable']);
			$_SESSION['nbLigne'] = htmlspecialchars($_POST['nbLigne']);

			foreach ($arrayTypeClass as $typeClass) {
				if ($typeClass->getValue() > 0 ) {
					$_SESSION[$typeClass->getType()] = $typeClass->getValue();
				}
			}
			#On redirige l'utilisateur vers la page génération
			header("Location: generate.php");
			exit();
		}
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Location" content="generate.php">
		<title>Projet Broccoli</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css">
	</head>	
	<body>
		<?php require "header.html"; ?>
		<form method="POST">
			<div class="container">
				<h1>Générateur de données</h1>
				<hr>
				<img src="../fichier/img/icon/brocolis.jpg" width="20%" class="rounded float-right">

				<div class="form-group row">
					<label for="nomModele" class="col-sm-2 col-form-label">Nom du modèle</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="nomModele" <?php if(!empty($libelle)) {echo "value=".$dataMod[0];} ?>>
					</div>
				</div>
				<div class="form-group row">
					<label for="nomTable" class="col-sm-2 col-form-label">Nom de la table</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="nomTable" <?php if(!empty($libelle)) {echo "value=".$dataMod['nom_table'];} ?>>
					</div>
				</div>
				<div class="form-group row">
					<label for="nbLigne" class="col-sm-2 col-form-label">Nombre de ligne</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="nbLigne" value=4>
					</div>
				</div>
			</div>
			<br>
			<div class="container">
				<h2>Nombre de champs types: </h2>
				<hr>
				<?php
					foreach ($arrayTypeClass as $class) {
						if ($class->getActif() == 1) {
							if ($i % 3 == 0) {
								echo "<div class='form-row'>";
								$j = 0;
							}
							$j += 1;
				?>
							<div class="form-group col-md-2">
								<label for= <?php echo $class->getType(); ?>><?php echo $class->getType(); ?></label>
								<input type="text" class='form-control' name= <?php echo "'".$class->getType()."'"; ?> 
										value=<?php echo $class->getValue(); ?>>
							</div>
				<?php
							if ($j == 3) echo "</div>";
							if ($j != 3 && $i == $nbActif - 1) echo '</div>';
							$i += 1;
						}
					}
				?>
				<br>
				<div class="form-row">
					<div class="form-group col-md-2">
						<button type="submit" name="suivant" class="btn btn-success btn-lg">Suivant</button>
					</div>
				</div>
			</div>
		</form>

		<div class="console">
			<?php echo $console; ?>
		</div>

		<?php require "footer.html"; ?>
	</body>
</html>