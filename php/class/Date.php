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

		#Fonction qui regarde si les valeurs rentrées sont bonnes en retournant false et renvoie un message d'erreur sinon
		public function verifValue($valMin, $valMax) {
			$dateMin = explode("-", $valMin);
			$dateMax = explode("-", $valMax);

			if (preg_match('`^\d{4}-\d{1,2}-\d{1,2}$`', $valMin) && 		#On regarde si la date de valeur min est valide
				preg_match('`^\d{4}-\d{1,2}-\d{1,2}$`', $valMax) && 		#On regarde si la date de valeur max est valide
			   (int)$dateMin[1] <= 12 && (int)$dateMax[1] <= 12 && 			#On regarde si le mois saisie est inférieur à 12
			   (int)$dateMin[2] <= 31 && (int)$dateMax[2] <= 31) { 			#On regarde si le jour saisie est inférieur à 31

				$valMinNew = new DateTime($valMin);
				$valMaxNew = new DateTime($valMax);
				$interval = $valMinNew->diff($valMaxNew);			#On calcule la différence entre les 2 dates pour savoir si min < max
				$interval = $interval->format('%R%a')*(24*3600);

				if ($interval < 0) {
					return "Vous avez saisi une date minimal supérieur à la date maximal pour la Date à la ligne ".$this->getId().'.<br>';
				}
				return false;

			} else {
				return "Votre saisi de date n'est valide pour la Date à la ligne ".$this->getId().'.<br>';
			}

		}
		#Fonction qui retourne une valeur aléatoire
		public function getValAlea() {
			$dateMin = explode("-", $this->getValMin());
			$dateMax = explode("-", $this->getValMax());
			$annee = rand((int)$dateMin[0], (int)$dateMax[0]);
			$mois = rand(1, 12);
			$jour = rand(1, 30);

			return '"'.$annee.'-'.$mois.'-'.$jour.'"';
		}

	}

?>