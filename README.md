# Broccoli

![index](https://github.com/Gouderg/app-Brocoli/blob/master/fichier/img/maquette/indexSite.png)

Application permettant de générer de la donnée dans un format SQL/CSV à partir de modèles pré-définis ou créés par vos soins. 


## Installation

### Dépendances

Vous devez posséder sur votre machine:
	
	* PHP version 7 ou supérieur
	* Un serveur Web (Apache)
	* MySQL

Le projet à été essayé sous WAMP et sous Linux.

### Mise en place du site

Le site possède sa propre base de donnée que vous devez charger afin de le rendre fonctionnel.
Après vous être rendu à la racine du site, allez dans votre terminal mysql et exécutez la commande suivante:
```sql
	SOURCE sql/bdd.sql;
```
Tout est inclus dans ce fichier, mais si vous voulez changer les logins de connexion, vous pouvez changer les constantes dans le fichier php/constante.php

A la racine du projet, exécutez la commande suivante : 
```bash
	sudo chmod 777 fichier/downloadFic
```

Cela permet au site de créer des fichiers dans ce répertoire.
Si le répertoire n'existe pas, il faut le créer avec la commande suivante :
```bash
	sudo mkdir fichier/downloadFic
```

## Utilisation

Le site se veut simple d'utilisation.

La page back est utilisé pour désactiver un type champ sur la page d'accueil. Par exemple, si je désactive un varchar, celui-ci ne sera plus proposé sur la page d'accueil, mais apparaîtra si vous rejouez un modèle.
Vous pouvez rejouer un modèle existant dans la base de donnée depuis la page rejouer.