<?php
	class Boolean extends TypeNomChamp {

		#Attributs
		private $etat;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $etat = null, $nom_champ = null) {
			$this->etat = $etat;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;
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