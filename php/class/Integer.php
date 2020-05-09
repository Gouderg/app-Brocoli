<?php 
	class Integer {

		#Attributs
		private $valIntMin;
		private $valIntMax;

		#Constructeur
		public function __construct($valIntMin, $valIntMax) {
			$this->valIntMin = $valIntMin;
			$this->valIntMax = $valIntMax;

		}

		#Getter
		public function getValMin() {return $this->valIntMin;}
		public function getValMax() {return $this->valIntMax;}

		#Setter
		public function setValMin($valIntMin) {$this->valIntMin = $valIntMin;}
		public function setValMax($valIntMax) {$this->valIntMax = $valIntMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>