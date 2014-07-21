

<?php

   if (utilisateur_est_connecte()){
		include CHEMIN_MODELE.'membres.php';
		$infos_utilisateur=lire_infos_utilisateur($_SESSION['pseudo']);
		if (false !== $infos_utilisateur && $infos_utilisateur['hash_validation'] == '') {
		   $pseudo=$infos_utilisateur['pseudo'];
		   $name=$infos_utilisateur['name'];
		   $email=$infos_utilisateur['adresse_mail'];
		   $avatar_name=$infos_utilisateur['avatar_name'];
		   $date_creation = new DateTime($infos_utilisateur['created']);
		 
		   
			include CHEMIN_VUE.'page_profil.php';
		}
	}
	else {
		include CHEMIN_GLOBAL.'erreur_profil.php';
	}
?>


