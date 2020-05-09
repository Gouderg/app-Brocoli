<?php 
	abstract class TypeNomChamp {
		protected $nom_champ;

		public function getNomChamp() {
			echo $this->nom_champ;
		}

		abstract public function setNomChamp($nom);
	}


?>