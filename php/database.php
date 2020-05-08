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
		try {
			$request = 'SELECT c.libelle, m.nom_fichier, m.nom_table, m.date_creation, c.type_champ, c.nom_champ, c.val_min_nb, c.val_max_nb, c.val_max_date, c.val_min_date, t.actif
						FROM champ c
						JOIN modele m on m.libelle = c.libelle
						JOIN type_champ t on t.type_champ = c.type_champ
						WHERE c.libelle = :libelle ';
			$statement = $db->prepare($request);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return $result;
	}

	//-------------------------------------------------------------
	// Back.php
	//-------------------------------------------------------------

	//Fonction qui récupère l'état des types de champs
	function dbRequestTypeActif($db) {
		try {
			$request = 'SELECT * FROM type_champ';
			$statement = $db->prepare($request);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return $result;
	}

	//Fonction qui update l'état d'un des types champ
	function dbUpdateType($db, $type, $etat) {
		try {
			$request = 'UPDATE type_champ
						SET actif = :actif
						WHERE type_champ = :type_champ';
			$statement = $db->prepare($request);
			$statement->bindParam(':actif', $etat, PDO::PARAM_INT);
			$statement->bindParam(':type_champ', $type, PDO::PARAM_STR);
			$statement->execute();

		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return true;
	}

	//-------------------------------------------------------------
	// Replay.php
	//-------------------------------------------------------------

	//Fonction récupérant la liste des modèle
	function dbRecupNomModele($db) {
		try {
			$request = 'SELECT m.libelle, COUNT(c.type_champ) AS nbChamp 
						FROM modele m
						JOIN champ c ON m.libelle = c.libelle
						GROUP BY m.libelle';
			$statement = $db->prepare($request);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return $result;
	}



 ?>