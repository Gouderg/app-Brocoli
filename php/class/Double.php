<?php 
	class Double extends TypeNomChamp{

		#Attributs
		private $valDoubleMin;
		private $valDoubleMax;

		#Constructeur
		public function __construct($valDoubleMin = null, $valDoubleMax = null, $nom_champ = null) {
			$this->valDoubleMin = $valDoubleMin;
			$this->valDoubleMax = $valDoubleMax;
			$this->nom_champ = $nom_champ;

		}

		#Getter
		public function getValMin() {return $this->valDoubleMin;}
		public function getValMax() {return $this->valDoubleMax;}

		#Setter
		public function setValMin($valDoubleMin) {$this->valDoubleMin = $valDoubleMin;}
		public function setValMax($valDoubleMax) {$this->valDoubleMax = $valDoubleMax;}
		public function setNomChamp($nom) {$this->nom_champ = $nom;}
		
		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>