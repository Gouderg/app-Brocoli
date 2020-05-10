SELECT c.nom_champ, c.val_min_nb, c.val_max_nb, c.libelle, c.type_champ, t.actif, m.date_creation, m.nom_fichier
from champ c
JOIN type_champ t ON t.type_champ = c.type_champ
JOIN modele m ON m.libelle = c.libelle;


#Requête pour sélectionner tout venant d'un meme libelle
SELECT c.libelle, m.nom_fichier, m.nom_table, c.type_champ, c.nom_champ, c.val_min_nb, c.val_max_nb, c.val_max_date, c.val_min_date
FROM champ c
JOIN modele m on m.libelle = c.libelle
WHERE c.libelle = '1_modVictor';

#Requête qui récupère l'état des champs => back.php, index.php
SELECT * FROM type_champ;


#Requête qui update l'état d'un des types => back.php
UPDATE type_champ
SET actif = :actif
WHERE type_champ = :type_champ;

#Requête pour récupérer la liste des modèles avec le nombre de champs => replay.php
SELECT m.libelle, COUNT(c.type_champ) AS nbChamp, m.date_creation
FROM modele m
JOIN champ c ON m.libelle = c.libelle
GROUP BY m.libelle;

#Requête pour récupérer la liste des type utilisés dans un modèle = index.php
SELECT t.type_champ, COUNT( * ) AS nbChamp
FROM type_champ t 
JOIN champ c ON t.type_champ = c.type_champ
WHERE c.libelle = '1_modVictor'
GROUP BY t.type_champ
ORDER BY t.type_champ;

#Requête pour récupérer le nom de la table et le nom du modèle => generate.php
SELECT libelle, nom_table
FROM modele
WHERE libelle = "1_modVictor";

#Requête pour récupérer les types, le nom du type et ses valeurs => generate.php
SELECT type_champ, nom_champ, val_min_nb, val_max_nb, val_min_date, val_max_date, longueur, liste_txt, etat
FROM champ
WHERE libelle = "1_modVictor"; 
