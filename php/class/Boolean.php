<?php
	class Boolean extends TypeNomChamp {

		#Attributs
		private $etat;

		#Constructeur
		public function __construct($nom_champ = null, $etat = null) {
			$this->etat = $etat;
			$this->nom_champ = $nom_champ;
		}

		#Getter
		public function getEtat() {return $this->etat;}

		#Setter
		public function setEtat($etat) {$this->etat = $etat;}
		public function setNomChamp($nom) {$this->nom_champ = $nom;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>