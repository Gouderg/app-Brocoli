<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<title>Projet Broccoli</title>
</head>	
<body>
	<?php require "html/header.html" ?>
	
	<form method="POST">
		<div class="container"> 
			<br>
			<h1>Générateur de données</h1>
			<hr>
			<img src="img/icon/brocolis.jpg" width="20%" class="rounded float-right">

			<div class="form-group row">
				<label for="nomModele" class="col-sm-2 col-form-label">Nom du modèle</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nomModele">
				</div>
			</div>
			<div class="form-group row">
				<label for="nomFichier" class="col-sm-2 col-form-label">Nom du fichier</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nomFichier">
				</div>
			</div>
			<div class="form-group row">
				<label for="nbLigne" class="col-sm-2 col-form-label">Nombre de ligne</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nbLigne" size="50">
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<h2>Nombre de Champs types: </h2>
			<hr>
			
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="int">Integer</label>
					<input type="text" class="form-control" id="int" placeholder="0">
				</div>
				<div class="form-group col-md-2">
					<label for="double">Double-Float</label>
					<input type="text" class="form-control" id="double" placeholder="0">
				</div>
				<div class="form-group col-md-2">
					<label for="tinyInt">Tiny-Int</label>
					<input type="text" class="form-control" id="tinyInt" placeholder="0">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="varchar">Varchar</label>
					<input type="text" class="form-control" id="varchar" placeholder="0">
				</div>
				<div class="form-group col-md-2">
					<label for="char">Char</label>
					<input type="text" class="form-control" id="char" placeholder="0">
				</div>
				<div class="form-group col-md-2">
					<label for="boolean">Boolean</label>
					<input type="text" class="form-control" id="boolean" placeholder="0">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="date">Date</label>
					<input type="text" class="form-control" id="date" placeholder="0">
				</div>
				<div class="form-group col-md-2">
					<label for="time">Time</label>
					<input type="text" class="form-control" id="time" placeholder="0">
				</div>
				<div class="form-group col-md-2">
					<label for="datetime">DateTime</label>
					<input type="text" class="form-control" id="datetime" placeholder="0">
				</div>
			</div>
			<button type="submit" class="btn btn-success btn-lg">Suivant</button>
		</div>
	</form>
	<br><br><br>
	<?php require "html/footer.html" ?>
</body>
</html>