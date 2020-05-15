<?php 
	class Double extends TypeNomChamp{

		#Attributs
		private $valDoubleMin;
		private $valDoubleMax;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $valDoubleMin = null, $valDoubleMax = null, $nom_champ = null) {
			$this->valDoubleMin = $valDoubleMin;
			$this->valDoubleMax = $valDoubleMax;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;

		}

		#Getter
		public function getValMin() {return $this->valDoubleMin;}
		public function getValMax() {return $this->valDoubleMax;}

		#Setter
		public function setValMin($valDoubleMin) {$this->valDoubleMin = $valDoubleMin;}
		public function setValMax($valDoubleMax) {$this->valDoubleMax = $valDoubleMax;}
		
		#Fonction qui vérifie si la valeur est correcte 
		public function verifValue($valMin, $valMax) {
			if (is_numeric($valMin) && is_numeric($valMax)) {
					if (floatval($valMin) > floatval($valMax)) {
						return "La valeur minimale est supérieur à la valeur maximale";
					} else {
						return false;
					}
			} else {
				return "La valeur saisi n'est pas numérique (essayer de remplacer la virgule par un point)";
			}	
		}
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>