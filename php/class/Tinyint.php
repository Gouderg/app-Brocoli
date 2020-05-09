<?php 
	class Tinyint {

		#Attributs
		private $valTinyIntMin;
		private $valTinyIntMax;

		#Constructeur
		public function __construct($valTinyIntMin, $valTinyIntMax) {
			$this->valTinyIntMin = $valTinyIntMin;
			$this->valTinyIntMax = $valTinyIntMax;

		}

		#Getter
		public function getValMin() {return $this->valTinyIntMin;}
		public function getValMax() {return $this->valTinyIntMax;}

		#Setter
		public function setValMin($valTinyIntMin) {$this->valTinyIntMin = $valTinyIntMin;}
		public function setValMax($valTinyIntMax) {$this->valTinyIntMax = $valTinyIntMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>