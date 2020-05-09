<?php 
	require_once("../php/database.php");

	spl_autoload_register(function ($className) {
		include('../php/class/'.$className.'.php');
	});

	#Fonction qui récupère les données grâce au libelle envoyé par replay.php
	function fillModGen($libelle) {
		$db = dbConnect();
		if (!$db) {
			echo "Erreur de connexion à la base de donnée";
			exit();
		}

		$valueMod = dbRequestValue($db, $libelle);
		if (!$valueMod) {
			echo "Table inexistante (dbRequestValue)";
			exit();
		}
		$dataMod = dbRequestData($db, $libelle);

	}

?>