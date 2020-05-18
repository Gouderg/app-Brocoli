<?php
	require_once("../php/database.php");

	function generateData($modeleGen, $typeFichier) {

		$filename = '../fichier/downloadFic/'.$modeleGen['nomFichier'].$typeFichier;   #On stocke le chemin
		$file = fopen($filename, 'a+');												#On ouvre le fichier en lecture/écriture
		ftruncate($file, 0);														#On vide le fichier s'il y a dejà quelque chose dedans

		#Si le fichier est .sql
		if ($typeFichier == ".sql") {
			#Faire une boucle qui génère le nombre de ligne
			for ($ligne = 0; $ligne < $modeleGen['nbLigne']; $ligne++) {
				$ligneFic = "INSERT INTO ".$modeleGen['nomTable']." (";
					
				#La premières ordonne et met le nom du champ à la bonne place
				for ($position = 1; $position <= $modeleGen['nbType']; $position++) {
					for ($type = 0; $type < $modeleGen['nbType']; $type++) {
						if ($modeleGen[$type]->getId() == $position) {
							$ligneFic .= $modeleGen[$type]->getNomChamp(); 
						}
					}
					if (!($position == $modeleGen['nbType'])) {
						$ligneFic .= ', ';
					}
				}
				$ligneFic .= ") VALUES (";	
				#La deuxième ordonne et met la valeur générée aléatoirement
				for ($position = 1; $position <= $modeleGen['nbType']; $position++) {
					for ($type = 0; $type < $modeleGen['nbType']; $type++) {
						if ($modeleGen[$type]->getId() == $position) {
							$ligneFic .= $modeleGen[$type]->getValAlea(); 
						}
					}
					if (!($position == $modeleGen['nbType'])) {
						$ligneFic .= ', ';
					}
				}
				$ligneFic .= ");\n";

				fwrite($file, $ligneFic);	
			}

		#Si le fichier est un .csv on utilise une technique différente
		} else {
			$dataCSV = array();
			$nom = array();
			#On met dans l'ordre nos noms de champs
			for ($position = 1; $position <= $modeleGen['nbType']; $position++) {
				for ($type = 0; $type < $modeleGen['nbType']; $type ++) {
					if ($modeleGen[$type]->getId() == $position) {
						array_push($nom, $modeleGen[$type]->getNomChamp());
					}
				}
			}
			array_push($dataCSV, $nom);

			#On crée une boucle avec le bon nombre de ligne
			for ($ligne = 0; $ligne < $modeleGen['nbLigne']; $ligne++) {
				$dataTemp = array();
				#On génère des données alétoires
				for ($position = 1; $position <= $modeleGen['nbType']; $position++) {
					for ($type = 0; $type < $modeleGen['nbType']; $type ++) {
						if ($modeleGen[$type]->getId() == $position) {
							array_push($dataTemp, $modeleGen[$type]->getValAlea());
						}
					}
				}
				array_push($dataCSV, $dataTemp);
			}

			#On peuple le fichier csv
			foreach($dataCSV as $fields) {
				fputcsv($file, $fields);
			}
		}
		
		fclose($file);

		#Connexion à la base de donnée
		$db = dbConnect();
		if (!$db) {
			echo "Problème de connexion à la base de donnée";
			exit(1);
		}

		#On met à jour le chemin dans la base de donnée
		$gen = dbUpdatePathFile($db, $modeleGen['libelle'], $modeleGen['nomFichier'], $_POST['typeFichier']);
		if (!$gen) {
			echo "Requête incorrecte (dbUpdateCheminFile).";
			exit(1);
		}
	}


	#Fonction qui affiche un exemple de ce qui à été généré
	function checkAndDisplay($modeleGen) {
		#Connexion à la base de donnée
		$db = dbConnect();
		if (!$db) {
			echo "Problème de connexion à la base de donnée";
			exit(1);
		}

		$path = dbRequestPathFile($db, $modeleGen['libelle']);
		if (!$path) {
			return '';
		}

		$file = fopen($path, 'r');
		$chaine = array();
		$i = 0;
		while (!feof() && $i != 10) {
			array_push($chaine, fgets($file));
			$i += 1;
		}
		fclose($file);
		return $chaine;
	}

?>