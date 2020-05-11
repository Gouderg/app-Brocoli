<?php 
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


?>