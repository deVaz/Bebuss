#!/bin/bash

#Installer ruby et rybygems avec la commande
#sudo apt-get install ruby-full rubygems git-core

#Installer RHC
#sudo gem install rhc

#Connexion à Openshift (login : charlesdevazelhes@gmail.com password : tYkRg3Fdk9)
rhc setup

#Création d'une application en php + ajout bdd mysql + phpmyadmin
rhc app create -a projet -t php-5.3 -t mysql-5.5 -t phpmyadmin

# Ajouter mannuellement la base de données sur l'interface phpmyadmin via le dump bdd.sql

#Ajout de la clé SSH sur Openshift
rhc sshkey add cat ~/.ssh/id_rsa.pub