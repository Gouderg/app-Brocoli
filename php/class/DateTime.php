<?php 
	class DateTime {

		#Attributs
		private $valDateTimeMin;
		private $valDateTimeMax;

		#Constructeur
		public function __construct($valDateTimeMin, $valDateTimeMax) {
			$this->valDateTimeMin = $valDateTimeMin;
			$this->valDateTimeMax = $valDateTimeMax;

		}

		#Getter
		public function getValMin() {return $this->valDateTimeMin;}
		public function getValMax() {return $this->valDateTimeMax;}

		#Setter
		public function setValMin($valDateTimeMin) {$this->valDateTimeMin = $valDateTimeMin;}
		public function setValMax($valDateTimeMax) {$this->valDateTimeMax = $valDateTimeMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>