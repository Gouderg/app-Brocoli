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
					<input type="text" class="form-control" id="nbLigne" name="nbLigne">
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
		$data = null;

		$modele= htmlspecialchars($_POST["nomModele"]);
		$fichier=htmlspecialchars($_POST["nomFichier"]);
		$nbLigne = htmlspecialchars($_POST["nbLigne"]);
		$int= htmlspecialchars($_POST['int']);
		$double= htmlspecialchars($_POST["double"]);
		$tinyInt= htmlspecialchars($_POST["tinyInt"]);
		$varchar= htmlspecialchars($_POST["varchar"]);
		$char= htmlspecialchars($_POST["char"]);
		$boolean= htmlspecialchars($_POST["boolean"]);
		$date= htmlspecialchars($_POST["date"]);
		$time= htmlspecialchars($_POST["time"]);
		$datetime= htmlspecialchars($_POST["datetime"]);
		
		

		$nbLigne = verifEntier($_POST["nbLigne"]);
		$int= verifEntier($_POST['int']);
		$double= verifEntier($_POST["double"]);
		$tinyInt= verifEntier($_POST["tinyInt"]);
		$varchar= verifEntier($_POST["varchar"]);
		$char= verifEntier($_POST["char"]);
		$boolean= verifEntier($_POST["boolean"]);
		$date= verifEntier($_POST["date"]);
		$time= verifEntier($_POST["time"]);
		$datetime= verifEntier($_POST["datetime"]);
	

	

		if(isset($modele) && isset($_POST["nomFichier"]) && isset($_POST["nbLigne"]) && $nbLigne == true && $int == true && $double == true && $tinyInt == true && $varchar == true && $char == true && $boolean == true && $date == true && $time == true && $datetime == true) { 
			$data = array(
				 "nomModele" => $_POST["nomModele"],
				 "nomFichier" => $_POST["nomFichier"],
				 "nbLigne" => $_POST["nbLigne"],
				 "int" => $_POST["int"],
				 "double" => $_POST["double"],
				 "tinyInt" => $_POST["tinyInt"],
				 "varchar" => $_POST["varchar"],
				 "char" => $_POST["char"], 
				 "boolean" => $_POST["boolean"],
				 "date" => $_POST["date"],
				 "time" => $_POST["time"],
				 "datetime" =>$_POST["datetime"],
				);
			var_dump($data);
		
		} else {
			echo "Error wrong !!!";
		}


	


		function verifEntier($entier){
			if( is_numeric($entier) == true && is_float($entier) == false ){
				return true;
			} else {
				return false;
			}	
		}


		/*

		Faire un dossier class avec un fichier champ.php qui est une classe
		Avoir des attributs avec nom , valeurs.
		Avoir une méthode qui fait les vérifications et ensuite, on met toutes les classes dans un tableau que l'on passe sur l' autre page

		*/

	?>
	<br><br><br><br><br><br>
	<?php require "footer.html" ?>
	
</body>
</html>