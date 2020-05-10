<?php 
	class Date extends TypeNomChamp{

		#Attributs
		private $valDateMin;
		private $valDateMax;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $valDateMin = null, $valDateMax = null, $nom_champ = null) {
			$this->valDateMin = $valDateMin;
			$this->valDateMax = $valDateMax;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;

		}

		#Getter
		public function getValMin() {return $this->valDateMin;}
		public function getValMax() {return $this->valDateMax;}

		#Setter
		public function setValMin($valDateMin) {$this->valDateMin = $valDateMin;}
		public function setValMax($valDateMax) {$this->valDateMax = $valDateMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>