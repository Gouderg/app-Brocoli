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
		
		#Fonction qui regarde si les valeurs rentrés sont bonnes en retournant false et return un message d'erreur sinon
		public function verifValue($valMin, $valMax) {
			$heureMin = explode(":", $valMin);
			$heureMax = explode(":", $valMax);

			if (preg_match('`^\d{1,2}:\d{1,2}:\d{1,2}$`', $valMin) &&		#On vérifie la validité de l'heure
				preg_match('`^\d{1,2}:\d{1,2}:\d{1,2}$`', $valMax) && 		
			   	(int)$heureMin[1] <= 59 && (int)$heureMax[1] <= 59 && 		#On vérifie les secondes
			   	(int)$heureMin[2] <= 59 && (int)$heureMax[2] <= 59 &&		#On vérifie les minutes
			   	(int)$heureMin[0] <= 23 && (int)$heureMax[0] <= 23){		#On vérifie les heures
			   	
			   	#On regarde si la différence entre les deux times est positive
				$valMinNew = new DateTime($valMin);
				$valMaxNew = new DateTime($valMax);
				$interval = $valMaxNew->getTimestamp() - $valMinNew->getTimestamp();

				if ($interval < 0) {
					return "Vous avez saisi un temps minimal supérieur à un temps maximal pour le Time à la ligne ".$this->getId().". <br>";
				} else {
					return false;
				}
			} else {
				return "Votre saisi d'heure n'est valide pour le Time à la ligne ".$this->getId().". <br>";
			}
		}
		
		#Fonction qui retourne une valeur aléatoire
		public function getValAlea() {
			$timeMin = explode(':', $this->getValMin());
			$timeMax = explode(':', $this->getValMax());
			$sec = rand(0, 60);
			$min = rand(0, 60);
			$heure = rand((int)$timeMin[0], (int)$timeMax[0]);
			return '"'.$heure.':'.$min.':'.$sec.'"';
		}
	}

?>