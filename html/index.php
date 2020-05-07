
<?php session_start(); ?> 
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
					<input type="text" class="form-control" id="nomModele" name="nomModele">
				</div>
			</div>
			<div class="form-group row">
				<label for="nomFichier" class="col-sm-2 col-form-label">Nom du fichier</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nomFichier" name="nomFichier">
				</div>
			</div>
			<div class="form-group row">
				<label for="nbLigne" class="col-sm-2 col-form-label">Nombre de ligne</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nbLigne" name="nbLigne" value=0>
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
					<input type="text" class="form-control" id="int" name="int" value=0>
				</div>
				<div class="form-group col-md-2">
					<label for="double">Double-Float</label>
					<input type="text" class="form-control" id="double" name="double" value=0>
				</div>
				<div class="form-group col-md-2">
					<label for="tinyInt">Tiny-Int</label>
					<input type="text" class="form-control" id="tinyInt" name="tinyInt" value=0>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="varchar">Varchar</label>
					<input type="text" class="form-control" id="varchar" name="varchar" value=0>
				</div>
				<div class="form-group col-md-2">
					<label for="char">Char</label>
					<input type="text" class="form-control" id="char" name="char" value=0>
				</div>
				<div class="form-group col-md-2">
					<label for="boolean">Boolean</label>
					<input type="text" class="form-control" id="boolean" name="boolean" value=0>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="date">Date</label>
					<input type="text" class="form-control" id="date" name="date" value=0>
				</div>
				<div class="form-group col-md-2">
					<label for="time">Time</label>
					<input type="text" class="form-control" id="time" name="time" value=0>
				</div>
				<div class="form-group col-md-2">
					<label for="datetime">DateTime</label>
					<input type="text" class="form-control" id="datetime" name="datetime" value=0>
				</div>
			</div>
			<button type="submit" class="btn btn-success btn-lg">Suivant</button>
		</div>
	</form>
	

	<?php

		
		

		if (isset($_POST["nbLigne"])) {
			$nbLigne = verifEntier(htmlspecialchars($_POST["nbLigne"]));
		}
		if (isset($_POST['int'])) {
			$int= verifEntier(htmlspecialchars($_POST['int']));	
		}
		if (isset($_POST["double"])) {
			$double= verifEntier(htmlspecialchars($_POST["double"]));	
		}
		
		if (isset($_POST["tinyInt"])) {
			$tinyInt= verifEntier(htmlspecialchars($_POST["tinyInt"]));
		}
		if (isset($_POST['varchar'])) {
			$varchar= verifEntier(htmlspecialchars($_POST["varchar"]));
		}
		if (isset($_POST["char"])) {
			$char= verifEntier(htmlspecialchars($_POST["char"]));
		}	
		if (isset($_POST["boolean"])) {
			$boolean= verifEntier(htmlspecialchars($_POST["boolean"]));
		}
		if (isset($_POST['date'])) {
			$date= verifEntier(htmlspecialchars($_POST["date"]));
		}
		if (isset($_POST["time"])) {
			$time= verifEntier(htmlspecialchars($_POST["time"]));	
		}
		if (isset($_POST["datetime"])) {
			$datetime= verifEntier(htmlspecialchars($_POST["datetime"]));	
		}


		

			
		
		if(isset($_POST["nomModele"]) && isset($_POST["nomFichier"]) && isset($_POST["nbLigne"]) && $nbLigne == true && $nbLigne != 0 && $int == true && $double == true && $tinyInt == true && $varchar == true && $char == true && $boolean == true && $date == true && $time == true && $datetime == true) { 
		
				$_SESSION["nomModele"] = $_POST["nomModele"];
				$_SESSION["nomFichier"] = $_POST["nomFichier"];
				$_SESSION["nbLigne"] = $_POST["nbLigne"];
				$_SESSION["int"] = $_POST["int"];
				$_SESSION["double"] = $_POST["double"];
				$_SESSION["tinyInt"] = $_POST["tinyInt"];
				$_SESSION["varchar"] = $_POST["varchar"];
				$_SESSION["char"] = $_POST["char"];
				$_SESSION["boolean"] = $_POST["boolean"];
				$_SESSION["date"] = $_POST["date"];
				$_SESSION["time"] = $_POST["time"];
				$_SESSION["datetime"] = $_POST["datetime"];

				//echo "window.location = 'replay.php';"

			
		}


	


		function verifEntier($entier){
			if( is_numeric($entier) == true  &&  is_float($entier) == false ){
				return true;
			}
			return false;
		}

	?>
	<br><br><br><br><br><br>
	<?php require "footer.html" ?>
	
</body>
</html>