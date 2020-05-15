<?php 
	class Varchar extends TypeNomChamp{

		#Attributs
		private $longueur;
		private $fichier;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $longueur = null, $fichier = null, $nom_champ = null) {
			$this->longueur = $longueur;
			$this->fichier = $fichier;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;

		}

		#Getter
		public function getLongueur() {return $this->longueur;}
		public function getFichier() {return $this->fichier;}

		#Setter
		public function setLongueur($longueur) {$this->longueur = $longueur;}
		public function setFichier($fichier) {$this->fichier = $fichier;}
		
		#Fonction qui regarde si les valeurs rentrées sont bonnes en retournant false et return un message d'erreur sinon
		public function verifValue($longueur, $fichier) {
			if (is_numeric($longueur) && (int)$longueur >= 0 && (int)$longueur <= 255 || $longueur == NULL && $fichier != 'Aucun') {
				return false;
			} else {
				return "Vous avez saisi une mauvaise valeur pour le Varchar à la ligne ".$this->getId().".<br>";
			}
		} 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>