<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Projet Broccoli</title>
</head>
<body>
	<?php require "header.html" ?>
	<br><br><br><br><br>


	<form method="post">
		<div class="row">
			<div class="col-md-8">
				<section class="container" id="champ">
					<table class="table" id="tabChamp">
						<!-- Générer par le php -->
						<div class="form-group row">
							<label for="nomModel" class="col-sm-2 col-form-label">Nom du modèle:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nomModel" value="Nom du modèle">
							</div>
						</div>
						<thead>
							<tr>
								<th scope="col">Position</th>
								<th scope="col">Type champ</th>
								<th scope="col">Nom du champ</th>
								<th>Valeurs</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="col-1">
									<select class="form-control">
										<option selected>1</option>
										<option>2</option>
										<option>3</option>
									</select>
								</td>
								<th scope="row">Integer</th>
								<td><input type="text" class="form-control" placeholder="Age"></td>
								<td><input type="text" class="form-control" placeholder="Valeur minimale"></td>
								<td><input type="text" class="form-control" placeholder="Valeur maximale"></td>
								<td>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="autoIncr">
										<label class="form-check-label" for="autoIncr">Incrementation auto</label>
									</div>
								</td>
							</tr>
							<tr>
								<td class="col-1">
									<select class="form-control">
										<option>1</option>
										<option selected>2</option>
										<option>3</option>
									</select>
								</td>
								<th scope="row">Double</th>
								<td><input type="text" class="form-control" placeholder="Salaire" aria-label="Salaire"></td>
								<td><input type="text" class="form-control" placeholder="Valeur minimale"></td>
								<td><input type="text" class="form-control" placeholder="Valeur maximale"></td>
							</tr>
							<tr>
								<td class="col-1">
									<select class="form-control">
										<option>1</option>
										<option>2</option>
										<option selected>3</option>
									</select>
								</td>
								<th scope="row">Varchar</th>
								<td><input type="text" class="form-control" placeholder="Metier"></td>
								<td><input type="text" class="form-control" placeholder="Valeur minimale"></td>
								<td><input type="text" class="form-control" placeholder="Valeur maximale"></td>
							</tr>
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
	<hr id="separation">
	<div class="row">
		<div class="col-md-8">
			<section class="container" id="console">
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

			</section>
		</div>
	</div>
	
	
	


	<?php require "footer.html" ?>
</body>
</html>