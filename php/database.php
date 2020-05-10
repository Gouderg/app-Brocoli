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
			$request = 'SELECT m.libelle, COUNT(c.type_champ) AS nbChamp, m.date_creation 
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

	//-------------------------------------------------------------
	// Index.php
	//-------------------------------------------------------------
	function dbRequestModValue($db, $libelle) {
		try {
			$request = 'SELECT t.type_champ, COUNT( * ) AS nbChamp
						FROM type_champ t
						JOIN champ c ON t.type_champ = c.type_champ
						WHERE c.libelle = :libelle
						GROUP BY t.type_champ
						ORDER BY t.type_champ';
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

	function dbRequestModData($db, $libelle) {
		try {
			$request = 'SELECT nom_table FROM modele WHERE libelle = :libelle';
			$statement = $db->prepare($request);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return $result;
	}

	//-------------------------------------------------------------
	// Generate.php
	//-------------------------------------------------------------
	function dbRequestValueGen($db, $libelle) {
		try {
			$request = 'SELECT type_champ, nom_champ, val_min_nb, val_max_nb, val_min_date, val_max_date, longueur, liste_txt, etat
						FROM champ
						WHERE libelle = :libelle';
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

	function dbRequestDataGen($db, $libelle) {
		try {
			$request = 'SELECT libelle, nom_table
						FROM modele
						WHERE libelle = :libelle';
			$statement = $db->prepare($request);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return $result;
	}


 ?>