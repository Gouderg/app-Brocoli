<?php
	class Boolean {

		#Attributs
		private $etat;

		#Constructeur
		public function __construct($etat) {
			$this->etat = $etat;
		}

		#Getter
		public function getEtat() {return $this->etat;}

		#Setter
		public function setEtat($etat) {$this->etat = $etat;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>