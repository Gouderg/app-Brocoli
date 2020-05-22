<?php 
	require_once("../php/database.php");
	if(!isset($_SESSION)) session_start(); 

	#Connexion à la base de donnée
	$db = dbConnect();
	if (!$db) {
		echo "Problème de connexion à la base de donnée";
		exit(1);
	}

	#On récupère les modèles
	$modele = dbRecupNomModele($db);
	if (!$modele) {
		echo "Requête incorrecte ou base de donnée vide (dbRecupNomModele)";
		exit(1);
	}

	$console = "";
	if (isset($_POST['generate']) || isset($_POST['index'])) {
		$valid = 0;
		$nbValid = 0;

		#On regarde le nombre de champs coché est égale 1
		for ($i = 1; $i <= sizeof($modele); $i++) {
			if (isset($_POST['check'.$i])) {
				$valid++;
				$nbValid = $i;
			}
		}

		#On envoie un message d'erreur s'il y a plus d'un modèle ou moins d'un modèle
		if ($valid > 1) {
			$console = "Veuillez ne sélectionner qu'un modèle";
		
		} elseif ($valid < 1) {
			$console = "Veuillez sélectionner un modèle";
		
		} else {
			#On stocke le libelle dans la variable $_SESSION pour pouvoir récupérer sur une autre page
			$_SESSION = array(); 
			$_SESSION['libelle'] = $modele[$nbValid - 1]['libelle'];
			
			#On renvoie vers la page adéquate
			if (isset($_POST['generate'])) {	
				header("Location: generate.php");
				exit();
				
			} elseif (isset($_POST['index'])) {
				header("Location: index.php");
				exit();

			} else {
				$console = "Si tu tombes sur ce message, c'est que tu as trouvé une autre façon de soumettre le formulaire bravo";
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Projet Brocoli</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<?php require "header.html"; ?>

	<form method="POST">

		<div class="col-md-2">
			<h1>Modèles :</h1>
			<br>
		</div>

		<div class="row">
			<div class="col-md-6">
				<section class="container">
					<table class="table" id="tabReplay">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nom du modèle</th>
								<th scope="col">Nombre de champ</th>
								<th scope="col">Date de création</th>
								<th scope="col">Sélection</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($modele as $nom) {
									$info = explode("_", $nom['libelle']); #On sépare le nombre et le nom du modèle
									echo '<tr>';
									echo '<th scope="row">'.(int)$info[0].'</th>';		#Numéro du modèle
									echo '<td>'.$info[1].'</td>';						#Nom du modèle
									echo '<td>'.$nom["nbChamp"].'</td>';				#Nombre de champs
									echo '<td>'.$nom['date_creation'].'</td>';			#Date de création du fichier
									echo '<td> <div class="form-check">
												<input type="checkbox" class="form-check-input" name="check'.$info[0].'"></div>';
									echo '</tr>';
								}
							?>
	 					</tbody>
					</table>
				</section>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-8">
						<h4>Changer la structure du modèle: </h4>
						<button type="submit" name="index" class="btn-lg btn-primary buttonReplay"> Structurer </button>
					</div>
				</div>
				<br><hr><br>
				<div class="row">
					<div class="col-md-8">
						<h4>Regénérer des données à partir d'un modèle: </h4>
						<button type="submit" name="generate" class="btn-lg btn-primary buttonReplay"> Générer </button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- Console de débuggage pour dire à l'utilisateur qu'il a mal coché -->
	<div class="console">
		<?php echo $console; ?>
	</div>
	
	<?php require "footer.html"; ?>
</body>
</html>

