<?php 
	class DateTime extends TypeNomChamp{

		#Attributs
		private $valDateTimeMin;
		private $valDateTimeMax;

		#Constructeur
		public function __construct($valDateTimeMin = null, $valDateTimeMax = null, $nom_champ = null) {
			$this->valDateTimeMin = $valDateTimeMin;
			$this->valDateTimeMax = $valDateTimeMax;
			$this->nom_champ = $nom_champ;

		}

		#Getter
		public function getValMin() {return $this->valDateTimeMin;}
		public function getValMax() {return $this->valDateTimeMax;}

		#Setter
		public function setValMin($valDateTimeMin) {$this->valDateTimeMin = $valDateTimeMin;}
		public function setValMax($valDateTimeMax) {$this->valDateTimeMax = $valDateTimeMax;}
		public function setNomChamp($nom) {$this->nom_champ = $nom;}
		
		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>