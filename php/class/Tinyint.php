<?php 
	class Tinyint extends TypeNomChamp{

		#Attributs
		private $valTinyIntMin;
		private $valTinyIntMax;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $valTinyIntMin = null, $valTinyIntMax = null, $nom_champ = null) {
			$this->valTinyIntMin = $valTinyIntMin;
			$this->valTinyIntMax = $valTinyIntMax;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;

		}

		#Getter
		public function getValMin() {return $this->valTinyIntMin;}
		public function getValMax() {return $this->valTinyIntMax;}

		#Setter
		public function setValMin($valTinyIntMin) {$this->valTinyIntMin = $valTinyIntMin;}
		public function setValMax($valTinyIntMax) {$this->valTinyIntMax = $valTinyIntMax;}

		#Méthode
		# Fonction qui effectue la vérification des données et qui retourne 
		# Fonction retournant une ligne SQL/CSV permettant la génération 


	}

?>