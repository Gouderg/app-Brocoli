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

		#Fonction qui vérifie la validité du nom du champ et sa taille
		public function verifNom($nom) {
			if (strlen($nom) > 25 || strlen($nom) < 1) {
				return "Veuillez saisir un nom ayant un nombre de caractère compris entre 1 et 25 pour le ".$this->getTypeChamp()." à la ligne ".$this->getId().". <br>";
			}
			return false;
		}
	}


?>