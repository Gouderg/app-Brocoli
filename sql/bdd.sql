#------------------------------------------------------------
# Delete database
#------------------------------------------------------------
DROP DATABASE IF EXISTS projetIV_PL;
DROP USER IF EXISTS 'leopoldUSER'@'localhost';

#------------------------------------------------------------
# Create database
#------------------------------------------------------------
CREATE DATABASE projetIV_PL;

#------------------------------------------------------------
# Create user
#------------------------------------------------------------
CREATE USER 'leopoldUSER'@'localhost' IDENTIFIED BY 'phpInMyHeart333!!!';
GRANT ALL PRIVILEGES ON projetIV_PL.* TO 'leopoldUSER'@'localhost';
FLUSH PRIVILEGES;

USE projetIV_PL;

#------------------------------------------------------------
# Table: modele
#------------------------------------------------------------

CREATE TABLE modele(
        libelle          Varchar (50) NOT NULL ,
        chemin_fichier   Varchar (75) NULL ,
        nom_table        Varchar (50) NOT NULL ,
        date_creation    Date NOT NULL
	,CONSTRAINT modele_PK PRIMARY KEY (libelle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_champ
#------------------------------------------------------------
CREATE TABLE type_champ(
        type_champ Varchar (512) NOT NULL ,
        actif      Bool NOT NULL
	,CONSTRAINT type_champ_PK PRIMARY KEY (type_champ)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: champ
#------------------------------------------------------------
CREATE TABLE champ(
        id               Int  Auto_increment  NOT NULL ,
        nom_champ        Varchar (50) NOT NULL ,
        longueur         Double NULL ,
        liste_txt        Varchar (512) NULL ,
        val_min_nb       Double NULL ,
        val_max_nb       Double NULL ,
        val_min_date     DateTime NULL ,
        val_max_date     DateTime NULL ,
        etat             Int NULL ,
        libelle      Varchar (512) NOT NULL ,
        type_champ   Varchar (512) NOT NULL
	,CONSTRAINT champ_PK PRIMARY KEY (id)

	,CONSTRAINT champ_modele_FK FOREIGN KEY (libelle) REFERENCES modele(libelle)
	,CONSTRAINT champ_type_champ0_FK FOREIGN KEY (type_champ) REFERENCES type_champ(type_champ)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: type_champ
#------------------------------------------------------------
INSERT INTO type_champ VALUES ('Integer', 1);
INSERT INTO type_champ VALUES ('Double', 1);
INSERT INTO type_champ VALUES ('Tinyint', 1);
INSERT INTO type_champ VALUES ('Varchar', 1);
INSERT INTO type_champ VALUES ('Char', 1);
INSERT INTO type_champ VALUES ('Boolean', 1);
INSERT INTO type_champ VALUES ('Date', 1);
INSERT INTO type_champ VALUES ('Time', 1);
INSERT INTO type_champ VALUES ('DateTimes', 1);

#------------------------------------------------------------
# Table: modele
#------------------------------------------------------------
INSERT INTO modele (libelle, nom_table, date_creation) VALUES ('1_modVictor', 'table1', '2020-02-15');
INSERT INTO modele (libelle, nom_table, date_creation) VALUES ('2_modLeopold', 'table2', '2020-03-15');
INSERT INTO modele (libelle, nom_table, date_creation) VALUES ('3_modThomas', 'table3', '2020-04-15');

#------------------------------------------------------------
# Table: champ
#------------------------------------------------------------
INSERT INTO champ (nom_champ, val_min_nb, val_max_nb, libelle, type_champ) VALUES ('Age', '0', '99', '1_modVictor', 'Integer');
INSERT INTO champ (nom_champ, val_min_nb, val_max_nb, libelle, type_champ) VALUES ('Salaire', '0', '9999', '1_modVictor', 'Integer');
INSERT INTO champ (nom_champ, longueur, liste_txt, libelle, type_champ) VALUES ('Metier', '50', 'departement', '1_modVictor', 'Varchar');
INSERT INTO champ (nom_champ, val_min_date, val_max_date, libelle, type_champ) VALUES ('Date Naissance', '2000-01-01 00:00:00', '2004-01-01 00:00:00', '1_modVictor', 'Date');
INSERT INTO champ (nom_champ, etat, libelle, type_champ) VALUES ('Utile', '0', '1_modVictor', 'Boolean');
INSERT INTO champ (nom_champ, val_min_date, val_max_date, libelle, type_champ) VALUES ('Heure', '1753-01-01 12:00:00', '1753-01-01 13:00:00', '1_modVictor', 'Time');
INSERT INTO champ (nom_champ, val_min_date, val_max_date, libelle, type_champ) VALUES ('Heure', '2003-01-01 12:00:00', '2004-01-01 13:00:00', '1_modVictor', 'DateTimes');

INSERT INTO champ (nom_champ, val_min_nb, val_max_nb, libelle, type_champ) VALUES ('Age', '0', '99', '2_modLeopold', 'Integer');
INSERT INTO champ (nom_champ, longueur, liste_txt, libelle, type_champ) VALUES ('Metier', '50', 'departement', '2_modLeopold', 'Varchar');
INSERT INTO champ (nom_champ, val_min_date, val_max_date, libelle, type_champ) VALUES ('Date Naissance', '2000-01-01 00:00:00', '2004-01-01 00:00:00', '2_modLeopold', 'Date');

INSERT INTO champ (nom_champ, val_min_nb, val_max_nb, libelle, type_champ) VALUES ('Age', '0', '99', '3_modThomas', 'Integer');
INSERT INTO champ (nom_champ, longueur, liste_txt, libelle, type_champ) VALUES ('Metier', '50', 'departement', '3_modThomas', 'Varchar');
INSERT INTO champ (nom_champ, val_min_date, val_max_date, libelle, type_champ) VALUES ('Date Naissance', '2000-01-01 00:00:00', '2004-01-01 00:00:00', '3_modThomas', 'Date');

SET autocommit = 0;
#SET names utf8; Si on l'active empêche les requêtes sql de se faire