<?php

// On vŽrifie qu'un hash est prŽsent

if(!utilisateur_est_connecte()){
if (!empty($_GET['hash'])) {

	// On veut utiliser le modle des membres (~/modeles/membres.php)
	include CHEMIN_MODELE.'membres.php';
	$pseudo= hash_recup_pseudo($_GET['hash']);
	// valider_compte_avec_hash() est dŽfinit dans ~/modeles/membres.php
	if (valider_compte_avec_hash($_GET['hash'])) {
		$infosUtilisateurs=lire_infos_utilisateur($pseudo);
		$_SESSION['pseudo']=$infosUtilisateurs['pseudo'];
		$_SESSION['name']=$infosUtilisateurs['name'];
		$_SESSION['id']=$infosUtilisateurs['id'];
		$_SESSION['email']=$infosUtilisateurs['adresse_mail'];
		
		// Affichage de la confirmation de validation du compte
		include CHEMIN_VUE.'compte_valide.php';
		

	} else {
		include CHEMIN_GLOBAL.'compte_invalide.php';
	}

  } 
} else{
	include CHEMIN_GLOBAL.'deja_connecte.php';
}
?> 