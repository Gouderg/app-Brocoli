<?php 
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

	#Fonction qui rempli la varible Session permettant de sauvegarder les données rentrées quand on refresh la page
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


?>