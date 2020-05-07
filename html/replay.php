
<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet Brocoli</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<?php require "header.html" ?>
	<br><br><br><br><br>

	<?php
		require_once("../php/database.php");

		#Connection à la base de donnée
		$db = dbConnect();
		if (!$db) {
			echo "Problème de connection à la base de donnée";
			exit(1);
		}

		#On récupère les modèles
		$modele = dbRecupNomModele($db);
		if (!$modele) {
			echo "Requête incorrecte ou base de donnée vide";
			exit(1);
		}

		foreach ($modele as $value) {
			echo $value['libelle'].'<br>';
		}

foreach($_SESSION as $value) {
			echo $value.'<br>';
		}

	?>
	
	<form method="post">

		<div class="col-sm-2">
			<h1>Modèles :</h1>
			<hr>
		</div>

		<div class="row">
			<div class="col-md-4">
				<section class="container">
					<table class="table" id="tabReplay">	
	  					<thead>
	    					<tr>
								<th scope="col">#</th>
								<th scope="col">Nom du modèle</th>
					   		</tr>
						</thead>
						<tbody>
							<?php
								$i = 1; 
								foreach($modele as $nom) { 	
									echo '<tr>';
									echo '<th scope="row">'.$i.'</th>';
									echo '<td>'.$nom['libelle'].'</td>';
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
						<div class="form-group police">
							<label for="renommer" class="col-form-label">Renommer le fichier :</label>
							<hr>
								<input type="text" class="  form-control" id="newfic" value="Nouveau nom du fichier">
						</div>
						<br><br>
					</div>

					<div class="row">
						<div class="col-auto ">		
							<label class="police"> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  Changer la structure du modèle : &nbsp; &nbsp; &nbsp; </label>

							<br><br><br><br><br><br>
						
							<div class="col-auto">
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								<button type="submit" class="btn btn-outline-primary btn-lg" id="btnGenerer"> <a href="index.php">Click here </a></button>						
							</div>
						</div>
						&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
						<div class="vertical-line col-auto"> &nbsp; &nbsp; &nbsp; </div>
						<div class="col-auto"> 
							<label class="police"> &nbsp; &nbsp; &nbsp;  Regénérer des données à partir d'un modèle :</label>

							<br><br><br><br><br><br>
						
							<div class="col-auto">
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
								<button type="submit" class="btn btn-outline-primary btn-lg" id="btnGenerer"> <a href="generate.php"> Click here </a></button>						
							</div>
						</div>
			
					</div>		
				</div>
			</div>
		</div>
	</form>

	<br><br><br><br><br>

	<?php require "footer.html" ?>
</body>
</html>

