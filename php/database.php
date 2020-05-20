<?php
	require_once('../php/constante.php');
	
	#Fonction connexion à la base de donnée
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

	#Fonction qui récupère l'état des types de champs
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

	#Fonction qui update l'état d'un des types champ
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

	#Fonction récupérant la liste des modèles
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

	#Fonction récupérant le nombre de champ pour un libelle
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

	#Fonction récupérant le nom de la table d'un libelle
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

	#Fonction récupérant toutes les valeurs des champs d'un libelle
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

	#Fonction récupérant le libelle et le nom de la table
	function dbRequestDataGen($db, $libelle) {
		try {
			$request = 'SELECT libelle, nom_table, chemin_fichier
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

	#Fonction récupérant le libelle ayant le bonne id
	function dbRecupLibelleID($db, $id) {
		try {
			$request = 'SELECT libelle
						FROM modele
						WHERE libelle LIKE :id';
			$statement = $db->prepare($request);
			$statement->bindParam(':id', $id, PDO::PARAM_STR);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return $result;
	}

	#Fonction récupérant l'id du dernier libelle
	function dbRecupLastLibelle($db) {
		try {
			$request = 'SELECT CONVERT(SUBSTR(libelle, 1, INSTR(libelle, "_") - 1), SIGNED INTEGER) as id
						FROM modele
						ORDER BY id DESC
						LIMIT 1';
			$statement = $db->prepare($request);
			$statement->execute();
			$result = $statement->fetchColumn();

		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return $result;
	}

	#Fonction ajoutant un modèle à la table modèle 
	function dbAddModele($db, $libelle, $table, $dateCreation, $path) {
		try {
			$request = 'INSERT INTO modele	VALUES (:libelle, :pathFichier, :table, :dateCreation)';
			$statement = $db->prepare($request);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->bindParam(':pathFichier', $path, PDO::PARAM_STR);
			$statement->bindParam(':table', $table, PDO::PARAM_STR);
			$statement->bindParam(':dateCreation', $dateCreation, PDO::PARAM_STR);
			$statement->execute();

		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return true;
	}

	#Fonction qui ajoute un champ de type Integer, Tinyint, Double
	function dbAddValInt($db, $nom, $valMin, $valMax, $libelle, $type) {
		try {
			$request = 'INSERT INTO champ (nom_champ, val_min_nb, val_max_nb, libelle, type_champ)
						VALUES (:nom, :valMin, :valMax, :libelle, :type_champ)';
			$statement = $db->prepare($request);
			$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
			$statement->bindParam(':valMin', $valMin, PDO::PARAM_INT);
			$statement->bindParam(':valMax', $valMax, PDO::PARAM_INT);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->bindParam(':type_champ', $type, PDO::PARAM_STR);
			$statement->execute();

		} catch (PDOException $exception){
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return true;
	}

	#Fonction qui ajoute un champ de type Char, Varchar
	function dbAddValChar($db, $nom, $longueur, $fichier, $libelle, $type) {
		try {
			$request = 'INSERT INTO champ (nom_champ, longueur, liste_txt, libelle, type_champ)
						VALUES (:nom, :longueur, :fichier, :libelle, :type_champ)';
			$statement = $db->prepare($request);
			$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
			$statement->bindParam(':longueur', $longueur, PDO::PARAM_INT);
			$statement->bindParam(':fichier', $fichier, PDO::PARAM_STR);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->bindParam(':type_champ', $type, PDO::PARAM_STR);
			$statement->execute();

		} catch (PDOException $exception){
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return true;
	}

	#Fonction qui ajoute un champ de type Datetimes, Date, Time
	function dbAddValDateTime($db, $nom, $min, $max, $libelle, $type) {
		$dateMin = new DateTime($min);
		$dateMax = new DateTime($max);
		$dMin = $dateMin->format("Y-m-d H:i:s");
		$dMax = $dateMax->format("Y-m-d H:i:s");
		try {
			$request = 'INSERT INTO champ (nom_champ, val_min_date, val_max_date, libelle, type_champ)
						VALUES (:nom, :dateMin, :dateMax, :libelle, :type_champ)';
			$statement = $db->prepare($request);
			$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
			$statement->bindParam(':dateMin', $dMin, PDO::PARAM_STR);
			$statement->bindParam(':dateMax', $dMax, PDO::PARAM_STR);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->bindParam(':type_champ', $type, PDO::PARAM_STR);
			$statement->execute();

		} catch (PDOException $exception){
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return true;
	}

	#Fonction qui ajoute un champ de type Bool
	function dbAddValBool($db, $nom, $etat, $libelle, $type) {
		try {
			$request = 'INSERT INTO champ (nom_champ, etat, libelle, type_champ)
						VALUES (:nom, :etat, :libelle, :type_champ)';
			$statement = $db->prepare($request);
			$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
			$statement->bindParam(':etat', $etat, PDO::PARAM_INT);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->bindParam(':type_champ', $type, PDO::PARAM_STR);
			$statement->execute();

		} catch (PDOException $exception){
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return true;
	}

	#Fonction qui supprime tous les champs d'un modele
	function dbDeleteChamp($db, $libelle) {
		try {
			$request = 'DELETE FROM champ WHERE libelle = :libelle';
			$statement = $db->prepare($request);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->execute();
		} catch (PDOException $exception) {
			error_log('Request error: ' .$exception->getMessage());
			return false;
		}
		return true;
	}

	#Fonction qui met à jour le nouveau modele
	function dbUpdateMod($db, $libelle, $nomTable, $dateCreation, $pathFichier) {
		try {
			$request = 'UPDATE modele
						SET nom_table = :table, date_creation = :dateCreation, chemin_fichier = :pathFichier
						WHERE libelle = :libelle';
			$statement = $db->prepare($request);
			$statement->bindParam(':table', $nomTable, PDO::PARAM_STR);
			$statement->bindParam(':dateCreation', $dateCreation, PDO::PARAM_STR);
			$statement->bindParam(':pathFichier', $pathFichier, PDO::PARAM_STR);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->execute();

		} catch (PDOException $exception) {
			error_log('Request error :' .$exception->getMessage());
			return false;
		}
		return true;
	}

	#Fonction qui va chercher le chemin du fichier du libelle
	function dbRequestPathFile($db, $libelle) {
		try {
			$request = 'SELECT chemin_fichier
						FROM modele
						WHERE libelle = :libelle';
			$statement = $db->prepare($request);
			$statement->bindParam(':libelle', $libelle, PDO::PARAM_STR);
			$statement->execute();
			$result = $statement->fetchColumn();

		} catch (PDOException $exception) {
			error_log("Request error : " .$exception->getMessage());
			return false;
		}
		return $result;
	} 

 ?>