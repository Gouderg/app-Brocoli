<?php 
	require_once("../php/database.php");
	if (!isset($_SESSION)) session_start();

	spl_autoload_register(function ($className) {
		include('../php/class/'.$className.'.php');
	});

	#Fonction qui récupère les données grâce au libelle envoyé par replay.php
	function fillFromReplay($libelle) {
		#Connexion à la base de donnée
		$db = dbConnect();
		if (!$db) {
			echo "Erreur de connexion à la base de donnée";
			exit();
		}

		#Récupère chaque type et sa valeur
		$valueMod = dbRequestValueGen($db, $libelle);
		if (!$valueMod) {
			echo "Table inexistante ou mauvais libelle (dbRequestValueGen)";
			exit();
		}

		#Récupère les données de la base
		$dataMod = dbRequestDataGen($db, $libelle);
		if (!$dataMod) {
			echo "Table inexistante ou mauvais libelle (dbRequestDataGen)";
			exit();
		}

		$modGen['libelle'] = $dataMod['libelle'];							#On stocke le libelle
		$temp = explode('_', $dataMod['libelle']);
		$modGen['nomModele'] = $temp[1];									#On stocke le nom du Modele
		$modGen['nomTable'] = $dataMod['nom_table'];						#On stocke le nom de la table
		$modGen['nbLigne'] = 0;												#On stocke le nombre de ligne
		$date = new DateTime(null, new DateTimeZone('Europe/Paris'));
		$modGen['pathFichier'] = $dataMod['chemin_fichier']; 				#On stocke le chemin du fichier
		if ($modGen['pathFichier']) {
			$path = explode("/", $modGen['pathFichier']);
			$modGen['nomFichier'] = $path[3];
		} else {
			$modGen['pathFichier'] = $_SESSION['pathFichier'];
			$modGen['nomFichier'] = $temp[1]."_".$date->format("YmdHis");
		}



		$j = 0;
		foreach ($valueMod as $value) {
			$j += 1;
			switch ($value['type_champ']) {

				case 'Varchar':
				case 'Char':
					$temp = new $value['type_champ']($j, $value['type_champ'], $value['longueur'], $value['liste_txt'], $value['nom_champ']);
					array_push($modGen, $temp);
				break;

				case 'Boolean':
					$temp = new $value['type_champ']($j, $value['type_champ'], $value['etat'], $value['nom_champ']);
					array_push($modGen, $temp);
				break;

				case 'DateTimes':
					$dateMin = explode(" ", $value['val_min_date']);
					$dateMax = explode(" ", $value['val_max_date']);
					$temp = new $value['type_champ']($j, $value['type_champ'], $dateMin[0]."_".$dateMin[1], $dateMax[0]."_".$dateMax[1], 
													 $value['nom_champ']);
					array_push($modGen, $temp);
				break;

				case 'Date':
					$temp = new $value['type_champ']($j, $value['type_champ'], $value['val_min_date'], $value['val_max_date'],									 $value['nom_champ']);
					array_push($modGen, $temp);
				break;
				
				case 'Time':
					$heureMin = explode(" ", $value['val_min_date']);
					$heureMax = explode(" ", $value['val_max_date']);
					$temp = new $value['type_champ']($j, $value['type_champ'], $heureMin[1], $heureMax[1], $value['nom_champ']);
					array_push($modGen, $temp);
				break;

				case 'Integer':
				case 'Tinyint':
				case 'Double':
					$temp = new $value['type_champ']($j, $value['type_champ'], $value['val_min_nb'], $value['val_max_nb'], $value['nom_champ']);
					array_push($modGen, $temp);
				break;
			}
		}
		$modGen['nbType'] = $j;
		return $modGen;
	}

	#Fonction qui récupère et ordonne les donnée envoyé par index.php
	function fillFromIndex() {
		$modGen['libelle'] = null;
		$modGen['nomModele'] = $_SESSION['nomModele'];
		$modGen['nomTable'] = $_SESSION['nomTable'];
		$modGen['nbLigne'] = $_SESSION['nbLigne'];
		unset($_SESSION['nomModele'], $_SESSION['nomTable'], $_SESSION['nbLigne']);

		$j = 0;
		foreach ($_SESSION as $key => $value) {
			for ($i = 0; $i < $value; $i++) {
				$j++;
				$temp = new $key($j, $key);
				array_push($modGen, $temp);
			}
		}
		#Permet quand on regénère la page de garder la position initial sinon ça n'affiche rien
		$_SESSION['nomModele'] = $modGen['nomModele'];
		$_SESSION['nomTable'] = $modGen['nomTable'];
		$_SESSION['nbLigne'] = $modGen['nbLigne'];
		$modGen['nbType'] = $j;
		$date = new DateTime(null, new DateTimeZone('Europe/Paris'));
		$modGen['nomFichier'] = $modGen['nomModele']."_".$date->format("YmdHis");
		$modGen['pathFichier'] = NULL;
		return $modGen;
	}

	#Fonction qui retourne le select de position 
	function positionType($nbType, $posType, $numero) {

		$boutonSelect = '<td><select class="form-control" name= "pos'.$numero.'">';
		$select = '';
		for ($i = 1; $i <= $nbType; $i++) {
			if ($posType == $i) {
				$select = 'selected';
			} else {
				$select = ' ';
			} 
			$boutonSelect .= '<option '.$select.'>'.$i.'</option>';
		}
		$boutonSelect .= '</select></td>';
		return $boutonSelect;
	}

	#Fonction qui retourne les bons champ de valeur, pas mal de recopie de code à cause de la personalisation du placeholder
	function switchValue($objType) {

		$valeurs = '';
		switch($objType->getTypeChamp()) {

			case 'Boolean':
				$etat = checkVal($objType->getEtat());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().
						   '" placeholder="0: Faux, 1: True, 2: Random" value ='.$etat.'></td>';
			break;

			case 'Integer':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().'1'.
						   '" placeholder="-2 147 483 648" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" name="'.$objType->getId().'2'.
							'" placeholder="2 147 483 647" value ='.$valMax.'></td>';
			break;

			case 'Tinyint':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().'1'.
						   '" placeholder="-128" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" name="'.$objType->getId().'2'.
							'" placeholder="127" value ='.$valMax.'></td>';
			break;

			case 'Double':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().'1'.
						   '" placeholder="Valeur Minimal" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" name="'.$objType->getId().'2'.
							'" placeholder="Valeur Maximal" value ='.$valMax.'></td>';
			break;

			case 'Varchar':
			case 'Char':
				$longueur = checkVal($objType->getLongueur());
				$nomFichier = checkVal($objType->getFichier());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().'1'.
						   '" placeholder="Longueur (0-255) - Aucun" value ='.$longueur.'></td>';
				$valeurs .= fillSelectVarchar($objType->getId(), $nomFichier);
			break;

			case 'Date':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().'1'.
						   '" placeholder="0001-01-01" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" name="'.$objType->getId().'2'.
							'" placeholder="9999-12-31" value ='.$valMax.'></td>';
			break;

			case 'DateTimes':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().'1'.
						   '" placeholder="1753-01-01_00:00:00" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" name="'.$objType->getId().'2'.
							'" placeholder="9999-12-31_23:59:59" value ='.$valMax.'></td>';
			break;

			case 'Time':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" name="'.$objType->getId().'1'.
						   '" placeholder="00:00:00" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" name="'.$objType->getId().'2'.
							'" placeholder="23:59:59" value ='.$valMax.'></td>';
			break;
		}
		return $valeurs;
	}

	#Fonction qui retourne soit une valeur soit rien 
	function checkVal($val) {
		if ($val != NULL) return $val;
		return ' ';
	}

	#Fonction qui retourne le select du liste de Char/Varchar
	function fillSelectVarchar($id, $nomFichier) {

		#On ouvre le fichier et on le lis ligne par ligne pour le stocker dans un tableau 
		$fichier = fopen('../fichier/liste/liste.txt', 'r') or die('Fichier non accessible (liste.txt)');
		$listeFichier = array();
		while(!feof($fichier)) {
			$temp = fgets($fichier);
			$temp = str_replace("\n", "", $temp);
			array_push($listeFichier, $temp);
		}
		fclose($fichier);


		#Permet de sélectionner ou pas la bonne valeur
		if ($nomFichier == NULL) {$selected = 'selected';}
		else {$selected = ' ';}
		
		$select = '<td><select class="form-control" name="'.$id.'2">';
		$select .= '<option '.$selected.' > Aucun </option>';
		
		foreach($listeFichier as $nom) {
			if ($nomFichier == $nom) {$selected = 'selected';}
			else {$selected = ' ';}
			
			$select .= '<option '.$selected.' >'.$nom.'</option>';
		}
		$select .= '</select></td>';
		return $select;
	}

?>