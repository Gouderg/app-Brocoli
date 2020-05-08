<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Projet Brocoli</title>
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #CC6600;">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"aria-expanded="true"><img src="../img/icon/Menu.png" width="50%"></a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../html/index.php">Index</a>
					<a class="dropdown-item" href="../html/generate.php">Genérateur </a> <!-- temporaire -->
					<a class="dropdown-item" href="../html/replay.php">Rejouer un modèle</a>
					<a class="dropdown-item" href="../html/back.php">Back </a>
				</div>
				<div class="text-center"><h1 style="font-weight: bold;">BROCCOLI - DATA GENERATOR</h1></div>
				
			</div>
		</nav>
	</header>


	<?php 
		require_once("../php/database.php");

		#Connexion à la base
		$db = dbConnect();
		if (!$db) {
			echo "Problème de connexion avec la base de donnée";
			exit(1); 
		}

		#On récupère le tableau des champs
		$champType = dbRequestTypeActif($db);
		if (!$champType) {
			echo "Requête incorrecte ou table inexistante (dbRequestTypeActif)";
			exit(1);
		}
	?>

	<br>
	<form method="post">
		<div class="container">
			<table class="table">
				<tbody>
					<?php foreach($champType as $champ) { ?>
						<tr>
							<th scope="row"><?php echo $champ['type_champ']; ?></th>
							<td>
								<div class="input-group mb-3">
									<select class="custom-select" name= <?php echo "actif".$champ['type_champ']; ?>>
										<?php
											if ($champ['actif'] == 1) {
												echo "<option value='Actif' selected>Actif</option>"
													 ."<option value='Inactif'>Inactif</option>";
											} else {
												echo "<option value='Actif'>Actif</option>"
													."<option value='Inactif' selected>Inactif</option>";
											}
										?>
									</select>
									
								</div>
							</td>
						</tr>		
					<?php } ?>
				</tbody>
			</table>
			<div class="row">
				<div class="form-check col">
					<input type="checkbox" name="check">
					<label class="form-check-label" for="check">Valider la saisie</label>
				</div>	
				<div class="col">
					<button type="submit" class="btn btn-primary" id="maj">Mettre à jour</button>
				</div>
			</div>
		</div>
	</form>
	<?php

		#Obligé de mettre un radio pour éviter un ping pong entre les valeurs à cause du reload des valeurs
		if (isset($_POST['check'])) {
			$i = 0;
			#Remet les bonnes valeurs dans le tableau après saisie
			foreach ($champType as $champ) {
				switch ($_POST['actif'.$champ['type_champ']]) {
					case 'Actif':
						if ($champ['actif'] != '1') $champType[$i]['actif'] = '1';
					break;

					case 'Inactif':
						if ($champ['actif'] != '0') $champType[$i]['actif'] = '0';
					break;
				}
				$i += 1;
			}

			#Envoie une requête à la base de donnée pour Update chaque type
			foreach($champType as $champ) {
				$result = dbUpdateType($db, $champ['type_champ'], (int)$champ['actif']);
				if (!$result) {
					echo "Problème d'update de la base de donnée (dbUpdateType)";
					exit(1);
				}
			}
		}				

	?>

	<br><br><br><br>
	<footer class="fixed-bottom" style="background-color: #CC6600;">
		<div class="footer-copyright py-3 text-center">
			Copyright PRALAIN Léopold - ILLIEN Victor
		</div>
	</footer>
</body>
</html>