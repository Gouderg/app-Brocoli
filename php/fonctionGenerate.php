<?php 
	require_once("../php/database.php");
	session_start();

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

		$modGen['libelle'] = $dataMod['libelle'];
		$temp = explode('_', $dataMod['libelle']);
		$modGen['nomModele'] = $temp[1];
		$modGen['nomTable'] = $dataMod['nom_table'];
		$modGen['nbLigne'] = 0;

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
				case 'Date':
				case 'Time':
					$temp = new $value['type_champ']($j, $value['type_champ'], $value['val_min_date'], $value['val_max_date'], $value['nom_champ']);
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
		$modGen['nbType'] = $j;
		return $modGen;
	}

	#Fonction qui retourne le select de position 
	function positionType($nbType, $posType) {

		$boutonSelect = '<td class="col-1"><select class="form-control">';
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

	#Fonction qui retourne les bons champ de valeur
	function switchValue($objType) {

		$valeurs = '';
		
		switch($objType->getTypeChamp()) {

			case 'Boolean':
				$etat = checkVal($objType->getEtat());
				$valeurs = '<td><input type="text" class="form-control" placeholder="0: Faux, 1: True, 2: Random" value ='.$etat.'></td>';
			break;

			case 'Integer':
			case 'Tinyint':
			case 'Double':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" placeholder="Valeur Minimal" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" placeholder="Valeur Maximal" value ='.$valMax.'></td>';
			break;

			case 'Varchar':
			case 'Char':
				$longueur = checkVal($objType->getLongueur());
				$valeurs = '<td><input type="text" class="form-control" placeholder="Longueur Chaine" value ='.$longueur.'></td>';

				//Pour le fichier il faut faire un select

			break;

			case 'Date':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" placeholder="0001-01-01" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" placeholder="9999-12-31" value ='.$valMax.'></td>';
			break;

			case 'DateTimes':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" placeholder="1753-01-01 00:00:00" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" placeholder="9999-12-31 23:59:59" value ='.$valMax.'></td>';
			break;

			case 'Time':
				$valMin = checkVal($objType->getValMin());
				$valMax = checkVal($objType->getValMax());
				$valeurs = '<td><input type="text" class="form-control" placeholder="00:00:00" value ='.$valMin.'></td>';
				$valeurs .= '<td><input type="text" class="form-control" placeholder="23:59:59" value ='.$valMax.'></td>';
			break;


		}

		return $valeurs;
	}

	#Fonction qui retourne soit une valeur soit rien 
	function checkVal($val) {
		if ($val != NULL) return $val;
		return ' ';
	}

?>