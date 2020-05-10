<?php
	require_once("../php/fonctionGenerate.php");

	if(!isset($_SESSION)) session_start();

	$modeleGen = array();

	#On regarde qui nous envoie des données
	#Si c'est replay.php, on effectue une requete sql pour récupérer un modèle déjà sauvegarder
	if (isset($_SESSION['libelle'])) {
		$modeleGen = fillFromReplay($_SESSION['libelle']);
		
	} 
	#Si c'es index.php, on rempli juste le tableau
	elseif (isset($_SESSION['nomModele'])) {
		$modeleGen = fillFromIndex();
	
	}

	#On vide $_SESSION pour éviter d'avoir des erreurs
	$_SESSION = array();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Projet Broccoli</title>
</head>
<body>
	<?php require "header.html"; ?>

	<form method="post">
		<div class="row">
			<div class="col-md-8">
				<section class="container">
					<table class="table">
						<div class="form-group row">
							<label for="nomModel" class="col-sm-2 col-form-label">Nom du modèle:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nomModele" value=<?php echo $modeleGen['nomModele']; ?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="nbLigne" class="col-sm-2 col-form-label">Nombre de Ligne:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nbLigne" value=<?php echo $modeleGen['nbLigne']; ?>>
							</div>
						</div>
						<thead>
							<tr>
								<th scope="col">Position</th>
								<th scope="col">Type champ</th>
								<th scope="col">Nom du champ</th>
								<th scope="col">Valeurs</th>
							</tr>
						</thead>
						<tbody>

							<?php
								#On fais une boucle pour parcourir tous les types
								for ($i = 0; $i < $modeleGen['nbType']; $i++) {
									#On récupère les valeurs nécessaires et si elles sont nulles on ne met rien 
									if ($modeleGen[$i]->getNomChamp() != NULL) {
										$nomChamp = $modeleGen[$i]->getNomChamp();
									} else {
										$nomChamp = " ";
									}

									echo '<tr>';	
									echo positionType($modeleGen['nbType'], $modeleGen[$i]->getId());				#Génère la position
									echo '<th scope="row">'.$modeleGen[$i]->getTypeChamp().'</th>';					#Génère le type
									echo '<td><input type="text" class="form-control" value ='.$nomChamp.'></td>';	#Génère le nom
									echo switchValue($modeleGen[$i]); 												#Génère les valeurs
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</section>
			</div>
			<div class="col-md-4">
				<hr>
				<section class="container" id="tabBord">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="save">
						<label class="form-check-label" for="save">Sauvegarder</label>
					</div>
					<hr>
					<div class="form-row align-items-center">		
						<div class="col-auto">
							<input type="text" id="nomFichier" class="form-control" placeholder="sql">
						</div>
						<div class="col-auto">
							<select id="typeFichier" class="form-control">
								<option selected>.sql</option>
								<option>.csv</option>
							</select>
						</div>		
					</div>
					<hr>
					<div class="form-row align-items-center">	
						<div class="col-auto">
							<button type="submit" class="btn btn-outline-success btn-lg" id="btnGenerer">Générer</button>						
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-outline-info btn-lg" id="btnDownload">Télécharger</button>
						</div>
					</div>
				</section>
				<hr>
			</div>
		</div>
	</form>
	<hr>
	<div class="row">
		<div class="col-md-8">
			<div class="card" style=" margin-left: 10rem;">
				<div class="card-body">
					<h5 class="card-title">Console</h5>
					<p class="card-text">
						+----+-----------------------+----------+<br>
						| id | nom                   | quantite |<br>
						+----+-----------------------+----------+<br>
						|  2 | Tournevis électrique  |       85 |<br>
						|  3 | Coupe bordure         |       38 |<br>
						|  4 | Tondeuse à gazon      |       18 |<br>
						|  5 | Nettoyeur HP          |        1 |<br>
						|  6 | Scie sauteuse         |        7 |<br>
						|  7 | Remorque 700kg        |        5 |<br>
						|  8 | Groupe électrogène    |        2 |<br>
						|  9 | Raton laveur          |       24 |<br>
						| 10 | Aspirateur            |       58 |<br>
						| 11 | Oscilloscope          |       12 |<br>
						| 12 | Planche à voile       |       72 |<br>
						+----+-----------------------+----------+<br>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<?php require "footer.html"; ?>


</body>
</html>