<?php
	class Boolean extends TypeNomChamp {

		#Attributs
		private $etat;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $etat = null, $nom_champ = null) {
			$this->etat = $etat;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;
		}

		#Getter
		public function getEtat() {return $this->etat;}

		#Setter
		public function setEtat($etat) {$this->etat = $etat;}

		#Fonction qui regarde si la variable est bien égale à 1,2 ou 0 et retourne false si c'est bon ou bien un message d'erreur 
		public function verifValue($etat) {
			if ((int)$etat >= 0 && (int)$etat <= 2 && is_numeric($etat)) {
				return false;
			} else {
				return "Vous avez saisi une valeur différente de 0, 1 ou 2 pour le Boolean à la ligne ".$this->getId().".<br>";
			}
		} 

		#Fonction retournant une valeur aléatoire
		public function getValAlea() {
			if ((int)$this->getEtat() == 0) {
				return 0;
			} elseif ((int)$this->getEtat() == 1) {
				return 1;
			} elseif ((int)$this->getEtat() == 2) {
				return rand(0,1);
			}
		}


	}

?>