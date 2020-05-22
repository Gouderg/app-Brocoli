<?php 
	class Tinyint extends TypeNomChamp{

		#Attributs
		private $valTinyIntMin;
		private $valTinyIntMax;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $valTinyIntMin = null, $valTinyIntMax = null, $nom_champ = null) {
			$this->valTinyIntMin = $valTinyIntMin;
			$this->valTinyIntMax = $valTinyIntMax;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;

		}

		#Getter
		public function getValMin() {return $this->valTinyIntMin;}
		public function getValMax() {return $this->valTinyIntMax;}

		#Setter
		public function setValMin($valTinyIntMin) {$this->valTinyIntMin = $valTinyIntMin;}
		public function setValMax($valTinyIntMax) {$this->valTinyIntMax = $valTinyIntMax;}

		#Fonction qui vérifie si la valeur est correcte 
		public function verifValue($valMin, $valMax) {
			if (is_numeric($valMin) && is_numeric($valMax) && (int)$valMin >= -128 && (int)$valMax <= 127) {
				if ((int)$valMin > $(int)$valMax) {
					return "Votre valeur minimale est supérieur à votre valeur maximale. <br>";
				} else {
					return false;
				}
			} else {
				return "Vous avez saisi une mauvaise valeur pour le TinyInt à la ligne ".$this->getId().".<br>";
			}
		}
		
		#Fonction qui retourne une valeur aléatoire
		public function getValAlea() {
			return rand((int)$this->getValMin(), (int)$this->getValMax());
		}


	}

?>