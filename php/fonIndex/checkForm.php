<?php
	#Fonction vérifiant si c'est un entier supérier à 0
	function verifEntier($entier) {
		if (is_numeric($entier) && !(is_float($entier)) && (int)$entier >= 0) {
			return (int)$entier;
		}
		return -1;
	}

	#Fonction qui vérifie chaque terme du formulaire qui renvoie soit un message d'erreur soit false
	function checkFormIndex($_post, $arrayTypeClass) {
		$console = false;	
		
		#Vérifie si chaque type est un entier >= 0 et met à jour la class
		$i = 0;
		$nbEntier = 0; #Nombre d'entier supérieur à 0
		foreach ($arrayTypeClass as $typeClass) {
			if (isset($_post[$typeClass->getType()])) {
				$arrayTypeClass[$i]->setValue(verifEntier(htmlspecialchars($_post[$typeClass->getType()])));
				if ($arrayTypeClass[$i]->getValue() > 0) $nbEntier += 1;
			}
			$i += 1;
		}

		#Vérfie s'il y existe un type ayant une valeur à 0
		if ($nbEntier == 0) {
			$console = "Veuillez mettre un nombre supérieur à 0 dans l'un des champs types. <br>";
		}

		#Vérifie si le nombre de ligne est valide
		if (isset($_post['nbLigne'])) {
			$nbLigne = verifEntier(htmlspecialchars($_post['nbLigne']));
			if ($nbLigne < 1) {
				$console = "Veuillez choisir un nombre entier de ligne supérieur à 0. <br>";
			}
		}

		#Vérifie si le nom du modèle et le nom de la table n'est pas vide 
		if (empty($_POST['nomModele']) || empty($_POST['nomTable'])) {
			$console = "Veuillez compléter les champs 'Nom du modèle' et 'Nom de la table'. <br>";
		}

		#Parcours chaque type et affiche un message d'erreur si un type n'est pas un entier > -1
		foreach ($arrayTypeClass as $typeClass) {
			if ($typeClass->getValue() == -1) {
				$console = 'Le type '.$typeClass->getType().' doit être un entier >= à 0. <br>';
			}
		}

		return $console;


	}


?>