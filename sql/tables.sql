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
        libelle       Varchar (50) NOT NULL ,
        nom_fichier   Varchar (50) NOT NULL ,
        nom_table     Varchar (50) NOT NULL ,
        date_creation Date NOT NULL
	,CONSTRAINT modele_PK PRIMARY KEY (libelle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_champ
#------------------------------------------------------------
CREATE TABLE type_champ(
        type_champ Varchar (1024) NOT NULL ,
        actif      Bool NOT NULL
	,CONSTRAINT type_champ_PK PRIMARY KEY (type_champ)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: champ
#------------------------------------------------------------
CREATE TABLE champ(
        id           Int  Auto_increment  NOT NULL ,
        nom_champ    Varchar (50) NOT NULL ,
        longueur     Double NULL ,
        val_min_nb   Double NULL ,
        val_max_nb   Double NULL ,
        val_min_date Date NULL ,
        val_max_date Date NULL ,
        liste_txt    Varchar (1024) NULL ,
        fichier      Varchar (1024) NULL ,
        libelle      Varchar (50) NOT NULL ,
        type_champ   Varchar (1024) NOT NULL
	,CONSTRAINT champ_PK PRIMARY KEY (id)

	,CONSTRAINT champ_modele_FK FOREIGN KEY (libelle) REFERENCES modele(libelle)
	,CONSTRAINT champ_type_champ0_FK FOREIGN KEY (type_champ) REFERENCES type_champ(type_champ)
)ENGINE=InnoDB;

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

SET autocommit = 0;
SET names utf8;