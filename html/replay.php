<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet Brocoli</title>
</head>
<body>
	<?php require "header.html"; ?>

	<?php
		require_once("../php/database.php");

		#Connexion à la base de donnée
		$db = dbConnect();
		if (!$db) {
			echo "Problème de connexion à la base de donnée";
			exit(1);
		}

		#On récupère les modèles
		$modele = dbRecupNomModele($db);
		if (!$modele) {
			echo "Requête incorrecte ou base de donnée vide";
			exit(1);
		}

	?>
	
	<form method="post">

		<div class="col-md-2">
			<h1>Modèles :</h1>
			<br>
		</div>

		<div class="row">
			<div class="col-md-4">
				<section class="container">
					<table class="table" id="tabReplay">	
	  					<thead>
	    					<tr>
								<th scope="col">#</th>
								<th scope="col">Nom du modèle</th>
								<th scope="col">Nombre de champ</th>
								<th scope="col">Sélection</th>
					   		</tr>
						</thead>
						<tbody>
							<?php
								$i = 1; 
								foreach($modele as $nom) { 	
									echo '<tr>';
									echo '<th scope="row">'.$i.'</th>';
									echo '<td>'.$nom['libelle'].'</td>';
									echo '<td> 5 </td>';
									echo '<td> <div class="form-check">
												<input type="checkbox" class="form-check-input" name="check'.$i.'"></div>';
									echo '</tr>';
									$i += 1;

								}
							?>
	 					</tbody>
					</table>
				</section>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-8">
						<h4>Changer la structure du modèle: </h4>
						<button type="submit" name="index" class="btn-lg btn-primary buttonReplay"> Struct </button>
					</div>
				</div>
				<br><hr><br>
				<div class="row">
					<div class="col-md-8">
						<h4>Regénérer des données à partir d'un modèle: </h4>
						<button type="submit" name="generate" class="btn-lg btn-primary buttonReplay"> Generate </button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- Console de débuggage pour dire à l'utilisateur qu'il a mal coché -->
	<div>
	</div>
	
	<?php require "footer.html"; ?>
</body>
</html>

