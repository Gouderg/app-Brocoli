<?php 
	class TypeChamp {

		//Attributs
		private $type;
		private $value;
		private $actif;

		//Constructeur
		public function __construct($type, $actif, $value = 0) {
			$this->type = $type;
			$this->actif = $actif;
			$this->value = $value;
		}

		//getter
		public function getType() {return $this->type;}
		public function getValue() {return $this->value;}
		public function getActif() {return $this->actif;}

		//setter
		public function setType($type) {$this->type = $type;}
		public function setValue($value) {$this->value = $value;}
		public function setActif($actif) {$this->actif = $actif;}


	}

?>