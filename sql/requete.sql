SELECT c.nom_champ, c.val_min_nb, c.val_max_nb, c.libelle, c.type_champ, t.actif, m.date_creation, m.nom_fichier
from champ c
JOIN type_champ t ON t.type_champ = c.type_champ
JOIN modele m ON m.libelle = c.libelle;


#Requête pour sélectionner tout venant d'un meme libelle
SELECT c.libelle, m.nom_fichier, m.nom_table, m.date_creation, c.type_champ, c.nom_champ, c.val_min_nb, c.val_max_nb, c.val_max_date, c.val_min_date, t.actif
FROM champ c
JOIN modele m on m.libelle = c.libelle
JOIN type_champ t on t.type_champ = c.type_champ
WHERE c.libelle = 'Thomas';

#Requête qui récupère l'état des champs
SELECT * FROM type_champ;


#Requête qui update l'état d'un des types
UPDATE type_champ
SET actif = :actif
WHERE type_champ = :type_champ;

#Requête pour récupérer la liste des modèles avec le nombre de champs
SELECT m.libelle, COUNT(c.type_champ) AS nbChamp
FROM modele m
JOIN champ c ON m.libelle = c.libelle
GROUP BY m.libelle;