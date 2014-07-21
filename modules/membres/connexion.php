<?php 
session_start();
$password=$_POST['mdp1'];
$pseudo=$_POST['pseudo1'];

function combinaison_connexion_valide($pseudo, $password) {
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=bebuss','root','root');
	}
	catch(Exception $e) {
		echo 'Erreur : '.$e->getMessage().'<br />';
		echo 'N¡ : '.$e->getCode();
	}
	$requete = $pdo->prepare("SELECT id FROM users
		WHERE
		pseudo = :pseudo AND
		password = :password AND
		hash_validation = ''");

	$requete->bindValue(':pseudo', $pseudo);
	$requete->bindValue(':password', $password);
	$requete->execute();

	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

		$requete->closeCursor();
		return $result['id'];
	}
	return false;
}
 function exist_pseudo($pseudo){
 	try {
 		$pdo = new PDO('mysql:host=localhost;dbname=bebuss','root','root');
 	}
 	catch(Exception $e) {
 		echo 'Erreur : '.$e->getMessage().'<br />';
 		echo 'N¡ : '.$e->getCode();
 	}
 	$requete = $pdo->prepare("SELECT id FROM users
 			WHERE
 			pseudo = :pseudo");
 	$requete->bindValue(':pseudo', $pseudo);
 	$requete->execute();
 	
 	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
 	
 		$requete->closeCursor();
 		return $result['id'];
 	}
 	return false;
 }
	
	
	$id_utilisateur = combinaison_connexion_valide($pseudo, sha1($password));
	$pseudo_valide=exist_pseudo($pseudo);
	function return_infos($id_utilisateur){
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=bebuss','root','root');
		}
		catch(Exception $e) {
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N¡ : '.$e->getCode();
		}
		
		$requete = $pdo->prepare("SELECT *
		FROM users
		WHERE
		id = :id_utilisateur");
		
		$requete->bindValue(':id_utilisateur', $id_utilisateur);
		$requete->execute();
		
		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
		
			$requete->closeCursor();
			return $result;
		
		}
		return false;
	}
	$donnees_utilisateurs= return_infos($id_utilisateur);
	// Si les identifiants sont valides
	if ($pseudo=="") {
		echo'<div class="error">Remplis ton pseudo</div>';
		exit();
	}
	else if (false == $pseudo_valide) {
	echo'<div class="error">Ce pseudo est invalide</div>';
	exit();
	}
	else if ($password=="") {
		echo'<div class="error">Remplis ton mot de passe</div>';
		exit();
	}
	 else if (false == $id_utilisateur) {
	 	echo'<div class="error">Identifiants incorrect</div>';
	exit();
	 } else{
	$_SESSION['pseudo']=$pseudo;
	$_SESSION['id']=$id_utilisateur;
	$_SESSION['email']=$donnees_utilisateurs['adresse_mail'];
	$_SESSION['name']=$donnees_utilisateurs['name'];
	if($donnees_utilisateurs['thumb_name']!=null){
	$_SESSION['avatar']=$donnees_utilisateurs['thumb_name'];
	}
	if($donnees_utilisateurs['avatar_name']!=null){
	$_SESSION['photo_profil']=$donnees_utilisateurs['avatar_name'];
	}
	if($donnees_utilisateurs['admin']==1){
		$_SESSION['admin']="Admin";
	} else {
		$_SESSION['admin']="";
	}
	echo '<div class="success"><h1> connexion reussie '.$_POST['pseudo1'].'</h1></div>';
	
}