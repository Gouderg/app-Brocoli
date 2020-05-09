<?php 
	class Time {

		#Attributs
		private $valTimeMin;
		private $valTimeMax;

		#Constructeur
		public function __construct($valTimeMin, $valTimeMax) {
			$this->valTimeMin = $valTimeMin;
			$this->valTimeMax = $valTimeMax;

		}

		#Getter
		public function getValMin() {return $this->valTimeMin;}
		public function getValMax() {return $this->valTimeMax;}

		#Setter
		public function setValMin($valTimeMin) {$this->valTimeMin = $valTimeMin;}
		public function setValMax($valTimeMax) {$this->valTimeMax = $valTimeMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>