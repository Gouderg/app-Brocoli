<?php 
	class Varchar extends TypeNomChamp{

		#Attributs
		private $longueur;
		private $fichier;

		#Constructeur
		public function __construct($longueur = null, $fichier = null, $nom_champ = null) {
			$this->longueur = $longueur;
			$this->fichier = $fichier;
			$this->nom_champ = $nom_champ;

		}

		#Getter
		public function getLongueur() {return $this->longueur;}
		public function getFichier() {return $this->fichier;}

		#Setter
		public function setLongueur($longueur) {$this->longueur = $longueur;}
		public function setFichier($fichier) {$this->fichier = $fichier;}
		public function setNomChamp($nom) {$this->nom_champ = $nom;}
		
		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>