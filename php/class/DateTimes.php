<?php 
	class DateTimes extends TypeNomChamp{

		#Attributs
		private $valDateTimeMin;
		private $valDateTimeMax;

		#Constructeur
		public function __construct($id = null, $type_champ = null, $valDateTimeMin = null, $valDateTimeMax = null, $nom_champ = null) {
			$this->valDateTimeMin = $valDateTimeMin;
			$this->valDateTimeMax = $valDateTimeMax;
			$this->nom_champ = $nom_champ;
			$this->id = $id;
			$this->type_champ = $type_champ;

		}

		#Getter
		public function getValMin() {return $this->valDateTimeMin;}
		public function getValMax() {return $this->valDateTimeMax;}

		#Setter
		public function setValMin($valDateTimeMin) {$this->valDateTimeMin = $valDateTimeMin;}
		public function setValMax($valDateTimeMax) {$this->valDateTimeMax = $valDateTimeMax;}
		
		#Fonction qui regarde si les valeurs rentrés sont bonnes en retournant false et return un message d'erreur sinon
		public function verifValue($valMin, $valMax) {
			if (preg_match('`^\d{4}-\d{1,2}-\d{1,2}_\d{1,2}:\d{1,2}:\d{1,2}$`', $valMin) &&		#On vérifie la validité de la date
				preg_match('`^\d{4}-\d{1,2}-\d{1,2}_\d{1,2}:\d{1,2}:\d{1,2}$`', $valMax)) {
				
				#On sépare la date et l'heure
				$enseMin = explode("_", $valMin);
				$enseMax = explode("_", $valMax);

				#On sépare les différentes parties de la date et de l'heure
				$heureMin = explode(":", $enseMin[1]);
				$heureMax = explode(":", $enseMax[1]);
				$dateMin = explode("-", $enseMin[0]);
				$dateMax = explode("-", $enseMax[0]);

				if ((int)$heureMin[1] <= 59 && (int)$heureMax[1] <= 59 && 							#On vérifie les secondes			
				   (int)$heureMin[2] <= 59 && (int)$heureMax[2] <= 59 &&							#On vérifie les minutes
				   (int)$heureMin[0] <= 23 && (int)$heureMax[0] <= 23 && 							#On vérifie les heures
				   (int)$dateMin[0] >= 1753 && (int)$dateMax[0] >= 1753 && 							#On vérifie l'année minimal
				   (int)$dateMin[1] <= 12 && (int)$dateMax[1] <= 12 &&								#On vérifie le nombre de mois
				   (int)$dateMin[2] <= 31 && (int)$dateMax[2] <= 31) {								#On vérifie le nombre de jour

					#On calcule l'interval de temps entre les 2 valeurs
					$valMinNew = new DateTime($enseMin[0].$enseMin[1]);
					$valMaxNew = new DateTime($enseMax[0].$enseMax[1]);
					$interval = $valMinNew->diff($valMaxNew);
					$interval = $interval->format('%R%a')*(24*3600);
					
					if ($interval < 0) {
						return "Vous avez saisi une date minimal supérieur à la date maximal pour le Datetime à la ligne ".$this->getId().". <br>";
					} else {
						return false;
					}
				} else {
					return "Votre saisi de date n'est valide pour le DateTime à la ligne ".$this->getId().". <br>";
				}
			} else {
				return "Votre saisi de date n'est valide pour le DateTime à la ligne ".$this->getId().". <br>";
			}


		}
		#Fonction qui retourne une valeur aléatoire
		public function getValAlea() {
			$min = explode("_", $this->getValMin());
			$max = explode("_", $this->getValMax());
			$dateTimeMin = new DateTime($min[0]." ".$min[1]);
			$dateTimeMax = new DateTime($max[0]." ".$max[1]);
			$new = rand($dateTimeMin->getTimestamp(), $dateTimeMax->getTimestamp());
			$dateNew = new Datetime();
			$dateNew->setTimestamp($new);
			return '"'.$dateNew->format("Y-m-d H:i:s").'"';
		}
	}

?>