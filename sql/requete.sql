SELECT c.nom_champ, c.val_min_nb, c.val_max_nb, c.libelle, c.type_champ, t.actif, m.date_creation, m.nom_fichier
from champ c
JOIN type_champ t ON t.type_champ = c.type_champ
JOIN modele m ON m.libelle = c.libelle;
