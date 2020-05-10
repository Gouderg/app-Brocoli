<?php 
	class Time extends TypeNomChamp{

		#Attributs
		private $valTimeMin;
		private $valTimeMax;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $valTimeMin = null, $valTimeMax = null, $nom_champ = null) {
			$this->valTimeMin = $valTimeMin;
			$this->valTimeMax = $valTimeMax;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;
		}

		#Getter
		public function getValMin() {return $this->valTimeMin;}
		public function getValMax() {return $this->valTimeMax;}

		#Setter
		public function setValMin($valTimeMin) {$this->valTimeMin = $valTimeMin;}
		public function setValMax($valTimeMax) {$this->valTimeMax = $valTimeMax;}
		
		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>