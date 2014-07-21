#!/bin/bash

#Mettre dans les variables :
#1.URL du projet
#2.Nom de la base de données
#3.User BDD
#4.Password BDD
set ssh://53cd42025004468c5c000346@dossiercharles-devazelhes.rhcloud.com/~/git/dossiercharles.git/ projet adminmPlQtgY Fv4ijUL2mVum

#Ajout du site web
git init
git clone $1

#Copie du projet APP (dossier site) dans projet

#Modification des identifiants de la base de données
echo '<?php
define("DB_HOST", "localhost");
define("DB_LOGIN", "'$3'");
define("DB_PASS", "'$4'");
define("DB_BDD", "'$2'");
?>' > config.php

#Commit
git add -A :/
git commit -m "Ajout du site"
git push origin master