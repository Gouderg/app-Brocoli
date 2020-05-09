<?php 
	class Double {

		#Attributs
		private $valDoubleMin;
		private $valDoubleMax;

		#Constructeur
		public function __construct($valDoubleMin, $valDoubleMax) {
			$this->valDoubleMin = $valDoubleMin;
			$this->valDoubleMax = $valDoubleMax;

		}

		#Getter
		public function getValMin() {return $this->valDoubleMin;}
		public function getValMax() {return $this->valDoubleMax;}

		#Setter
		public function setValMin($valDoubleMin) {$this->valDoubleMin = $valDoubleMin;}
		public function setValMax($valDoubleMax) {$this->valDoubleMax = $valDoubleMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>