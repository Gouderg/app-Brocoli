<?php
	require_once('../php/constante.php');
	
	//Fonction connection à la base de données
	function dbConnect() {
		try {
			$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8',DB_USER, DB_PASSWORD);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $exception) {
			error_log('Connection error: '.$exception->getMessage());
			return false;
		}
		return $db;
	}

	//Fonction récupérant les données d'un modèle
	function dbRecupModele($db, $libelle) {

	}

	//Fonction ajoutant un modèle()




 ?>