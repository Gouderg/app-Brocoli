<?php 
	class Time extends TypeNomChamp{

		#Attributs
		private $valTimeMin;
		private $valTimeMax;

		#Constructeur
		public function __construct($valTimeMin = null, $valTimeMax = null) {
			$this->valTimeMin = $valTimeMin;
			$this->valTimeMax = $valTimeMax;
			$this->nom_champ = $nom_champ;

		}

		#Getter
		public function getValMin() {return $this->valTimeMin;}
		public function getValMax() {return $this->valTimeMax;}

		#Setter
		public function setValMin($valTimeMin) {$this->valTimeMin = $valTimeMin;}
		public function setValMax($valTimeMax) {$this->valTimeMax = $valTimeMax;}
		public function setNomChamp($nom) {$this->nom_champ = $nom;}
		
		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>