<?php 
	class Integer extends TypeNomChamp{

		#Attributs
		private $valIntMin;
		private $valIntMax;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $valIntMin = null, $valIntMax = null, $nom_champ = null) {
			$this->valIntMin = $valIntMin;
			$this->valIntMax = $valIntMax;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;			

		}

		#Getter
		public function getValMin() {return $this->valIntMin;}
		public function getValMax() {return $this->valIntMax;}

		#Setter
		public function setValMin($valIntMin) {$this->valIntMin = $valIntMin;}
		public function setValMax($valIntMax) {$this->valIntMax = $valIntMax;}

		#Fonction qui vérifie si la valeur est correcte 
		public function verifValue($valMin, $valMax) {
			if (is_numeric($valMin) && is_numeric($valMax) && (int)$valMin >= -2147483648 && (int)$valMax <= 2147483647) {
				if ((int)$valMin > (int)$valMax) {
					return "Votre valeur minimale est supérieur à votre valeur maximale. <br>";
				} else {
					return false;
				}
			} else {
				return "Vous avez saisi une mauvaise valeur pour le Integer à la ligne ".$this->getId().".<br>";
			}
		}

		#Fonction qui retourne une valeur aléatoire
		public function getValAlea() {
			return rand((int)$this->getValMin(), (int)$this->getValMax());
		}

	}

?>