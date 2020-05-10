<?php 
	class TypeNomChamp {

		#Attributs
		protected $type_champ;
		protected $nom_champ;
		protected $id;

		#Getter
		public function getNomChamp() {return $this->nom_champ;}
		public function getId() {return $this->id;}
		public function getTypeChamp() {return $this->type_champ;}

		#Setter
		public function setNomChamp($nom) {$this->nom_champ = $nom;}
		public function setId($id) {$this->id = $id;}
	}


?>