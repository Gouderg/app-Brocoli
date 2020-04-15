#------------------------------------------------------------
# Change database
#------------------------------------------------------------
USE projetIV_PL;

#------------------------------------------------------------
# Database cleanup
#------------------------------------------------------------
DROP TABLE IF EXISTS modele;
DROP TABLE IF EXISTS type_champ;
DROP TABLE IF EXISTS champ;

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

SET autocommit = 0;
SET names utf8;
