<?php 
	class Char {

		#Attributs
		private $longueur;
		private $fichier;

		#Constructeur
		public function __construct($longueur, $fichier) {
			$this->longueur = $longueur;
			$this->fichier = $fichier;

		}

		#Getter
		public function getLongueur() {return $this->longueur;}
		public function getFichier() {return $this->fichier;}

		#Setter
		public function setLongueur($longueur) {$this->longueur = $longueur;}
		public function setFichier($fichier) {$this->fichier = $fichier;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>