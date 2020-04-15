USE projetIV_PL;

#------------------------------------------------------------
# Table: type_champ
#------------------------------------------------------------
INSERT INTO  type_champ VALUES ('INT', true);
INSERT INTO  type_champ VALUES ('CHAR', true);
INSERT INTO  type_champ VALUES ('VARCHAR', true);
INSERT INTO  type_champ VALUES ('TINYINT', true);
INSERT INTO  type_champ VALUES ('DOUBLE FLOAT', true);
INSERT INTO  type_champ VALUES ('DATE', true);
INSERT INTO  type_champ VALUES ('TIME', true);
INSERT INTO  type_champ VALUES ('DATETIME', true);
INSERT INTO  type_champ VALUES ('BOOLEAN', true);

#------------------------------------------------------------
# Table: modele
#------------------------------------------------------------
INSERT INTO modele VALUES ('Victor', 'fichier1', 'table1', '2020-02-15');
INSERT INTO modele VALUES ('Leopold', 'fichier2', 'table2', '2020-03-15');
INSERT INTO modele VALUES ('Thomas', 'fichier3', 'table3', '2020-04-15');

#------------------------------------------------------------
# Table: champ
#------------------------------------------------------------
INSERT INTO champ (nom_champ, longueur, val_min_nb, val_max_nb, libelle, type_champ) VALUES ('Age', '50', '0', '99', 'Victor', 'INT');
INSERT INTO champ (nom_champ, longueur, liste_txt, libelle, type_champ) VALUES ('Metier', '50', 'metier.txt', 'Victor', 'VARCHAR');
INSERT INTO champ (nom_champ, longueur, val_min_date, val_max_date, libelle, type_champ) VALUES ('Date Naissance', '50', '2000-01-01', '2004-01-01', 'Victor', 'DATE');

INSERT INTO champ (nom_champ, longueur, val_min_nb, val_max_nb, libelle, type_champ) VALUES ('Age', '50', '0', '99', 'Leopold', 'INT');
INSERT INTO champ (nom_champ, longueur, liste_txt, libelle, type_champ) VALUES ('Metier', '50', 'metier.txt', 'Leopold', 'VARCHAR');
INSERT INTO champ (nom_champ, longueur, val_min_date, val_max_date, libelle, type_champ) VALUES ('Date Naissance', '50', '2000-01-01', '2004-01-01', 'Leopold', 'DATE');

INSERT INTO champ (nom_champ, longueur, val_min_nb, val_max_nb, libelle, type_champ) VALUES ('Age', '50', '0', '99', 'Thomas', 'INT');
INSERT INTO champ (nom_champ, longueur, liste_txt, libelle, type_champ) VALUES ('Metier', '50', 'metier.txt', 'Thomas', 'VARCHAR');
INSERT INTO champ (nom_champ, longueur, val_min_date, val_max_date, libelle, type_champ) VALUES ('Date Naissance', '50', '2000-01-01', '2004-01-01', 'Thomas', 'DATE');
