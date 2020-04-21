<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projet Broccoli</title>
</head>	
<body>
	<?php require "header.html" ?>
	
	<form method="POST">
		<div class="container"> 
			<br><br><br><br><br>
			<h1>Générateur de données</h1>
			<hr>
			<img src="../img/icon/brocolis.jpg" width="20%" class="rounded float-right">

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
					<input type="text" class="form-control" id="nbLigne">
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<h2>Nombre de champs types: </h2>
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
			<button type="submit" class="btn btn-success btn-lg"><a href="generate.php">Suivant</a></button>
		</div>
	</form>
	<br><br><br><br><br><br>
	<?php require "footer.html" ?>
</body>
</html>