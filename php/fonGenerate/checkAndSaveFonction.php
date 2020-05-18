<?php
	require_once("../php/database.php"); 
	if(!isset($_SESSION)) session_start();
	#Fonction qui vérifie si la position est bonne
	function checkPosition($nbType) {
		$verifTemp = array();
		for($i = 1; $i <= $nbType; $i++) {
			if (in_array($_POST['pos'.$i], $verifTemp)) {
				return false;
			}
			array_push($verifTemp, $_POST['pos'.$i]);
		}
		return true;
	}

	#Fonction qui rempli la variable Session permettant de sauvegarder les données rentrées quand on refresh la page
	function fillGenerate($modeleGen) {
		$_SESSION = array();

		$_SESSION['libelle'] = $modeleGen['libelle'];
		$_SESSION['nomModele'] = $modeleGen['nomModele'];
		$_SESSION['nomTable'] = $modeleGen['nomTable'];
		$_SESSION['nbLigne'] = $modeleGen['nbLigne'];
		$_SESSION['nbType'] = $modeleGen['nbType'];

		for ($i = 0; $i < $modeleGen['nbType']; $i++) {
			$_SESSION['_'.$i] = array();
			array_push($_SESSION['_'.$i], $modeleGen[$i]);
		}
	}

	#Fonction qui sauvegarde le modèle en cours
	function saveModele($modeleGen) {

		#Connexion à la base de donnée
		$db = dbConnect();
		if (!$db) {
			echo "Problème de connexion à la base de donnée (saveModele)";
			exit(1);
		}

		#On récupère la date du jour
		$dateNow = new DateTime(null, new DateTimeZone('Europe/Paris'));
		$update = false;
		#On arrive à 3 cas de figures différents
		#Si le libelle existe et que le nom du modèle n'a pas changé, on update la base
		#Si le libelle existe et que le nom du modèle a changé, on crée un nouveau modèle
		#Si le libelle n'existe pas on crée un nouveau modèle

		#Si le libelle existe on cherche à savoir si le nom du modèle à changer
		if (isset($modeleGen['libelle'])) {
			$libelle = explode('_', $modeleGen['libelle']);
			$libelle[0] .= '%';

			#On récupère le libelle assossié au numéro
			$nomMod = dbRecupLibelleID($db, $libelle[0]);
			if (!$nomMod) {
				echo "Requête incorrecte (dbRecupLibelle)";
				exit(1);
			}

			$nomNewMod = explode('_', $nomMod['libelle']);
			if ($nomNewMod[1] == $modeleGen['nomModele']) $update = true;

			#Si update est true, on met à jour le libelle de la base de donnée
			if ($update) {
				$delChamp = dbDeleteChamp($db, $modeleGen['libelle']);
				if (!$delChamp) {
					echo 'Requête incorrecte (dbDeleteChamp)';
					exit(1);
				}
				$updateMod = dbUpdateMod($db, $modeleGen['libelle'], $modeleGen['nomTable'], $dateNow->format("Y-m-d"));
				if (!$updateMod) {
					echo 'Requête incorrecte (dbUpdateMod)';
					exit(1);
				}
			} 

			#Si update est false, on ajoute un nouveau modèle
			else {
				$id = dbRecupLastLibelle($db) + 1;							#On récupère le dernier id et on lui ajoute 1
				$modeleGen['libelle'] = $id."_".$modeleGen['nomModele'];	#On met le nouveau libelle

				#Requête pour ajouter un modele à la table modèle
				$addMod = dbAddModele($db, $modeleGen['libelle'], $modeleGen['nomTable'], $dateNow->format("Y-m-d"));
				if (!$addMod) {
					echo "Requête incorrecte (dbAddModele)";
					exit(1);
				}
			}
			
			#Boucle pour ajouter chaque champ à la table champ
			for ($i = 0; $i < $modeleGen['nbType']; $i++) {
				switch ($modeleGen[$i]->getTypeChamp()) {

					case 'Integer':
					case 'Double':
					case 'Tinyint':
						$addValue = dbAddValInt($db, $modeleGen[$i]->getNomChamp(), (int)$modeleGen[$i]->getValMin(), 
												(int)$modeleGen[$i]->getValMax(), $modeleGen['libelle'], $modeleGen[$i]->getTypeChamp());
					break;

					case 'Char':
					case 'Varchar':
						$addValue = dbAddValChar($db, $modeleGen[$i]->getNomChamp(), $modeleGen[$i]->getLongueur(), 
												 $modeleGen[$i]->getFichier(), $modeleGen['libelle'], $modeleGen[$i]->getTypeChamp());
					break;

					case 'DateTimes':
					case 'Date':
					case 'Time':
						$addValue = dbAddValDateTime($db, $modeleGen[$i]->getNomChamp(), $modeleGen[$i]->getValMin(), 
													$modeleGen[$i]->getValMax(), $modeleGen['libelle'], $modeleGen[$i]->getTypeChamp());
					break;

					case 'Boolean':
						$addValue = dbAddValBool($db, $modeleGen[$i]->getNomChamp(), (int)$modeleGen[$i]->getEtat(), 
												$modeleGen['libelle'], $modeleGen[$i]->getTypeChamp());
					break;

				}

				if (!$addValue) {
					echo "Requête incorrecte (dbAddVal".$modeleGen[$i]->getTypeChamp().")";
					exit(1);
				}
			}	
		}
		return "Sauvegarde du modèle effectué <br>";
	}

?>