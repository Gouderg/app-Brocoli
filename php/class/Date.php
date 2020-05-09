<?php 
	class Date {

		#Attributs
		private $valDateMin;
		private $valDateMax;

		#Constructeur
		public function __construct($valDateMin, $valDateMax) {
			$this->valDateMin = $valDateMin;
			$this->valDateMax = $valDateMax;

		}

		#Getter
		public function getValMin() {return $this->valDateMin;}
		public function getValMax() {return $this->valDateMax;}

		#Setter
		public function setValMin($valDateMin) {$this->valDateMin = $valDateMin;}
		public function setValMax($valDateMax) {$this->valDateMax = $valDateMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>