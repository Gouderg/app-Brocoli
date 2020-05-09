<?php 
	class Integer extends TypeNomChamp{

		#Attributs
		private $valIntMin;
		private $valIntMax;

		#Constructeur
		public function __construct($valIntMin = null, $valIntMax = null, $nom_champ = null) {
			$this->valIntMin = $valIntMin;
			$this->valIntMax = $valIntMax;
			$this->nom_champ = $nom_champ;

		}

		#Getter
		public function getValMin() {return $this->valIntMin;}
		public function getValMax() {return $this->valIntMax;}

		#Setter
		public function setValMin($valIntMin) {$this->valIntMin = $valIntMin;}
		public function setValMax($valIntMax) {$this->valIntMax = $valIntMax;}
		public function setNomChamp($nom) {$this->nom_champ = $nom;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>