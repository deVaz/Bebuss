<?php


function valider_compte_avec_hash($hash_validation) {
	include'libs/PD02.php';
	$requete = $pdo->prepare("UPDATE users SET
		hash_validation = ''
		WHERE
		hash_validation = :hash_validation");
	$requete->execute(array('hash_validation'=>$hash_validation));
	return ($requete->rowCount() == 1);
	
	
}
function hash_recup_pseudo($hash_validation){
	include'libs/PD02.php';
	$requete = $pdo->prepare("SELECT pseudo FROM users  WHERE hash_validation = :hash_validation");		
	 $requete->execute(array('hash_validation'=>$hash_validation));
	 
	 if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	
		$requete->closeCursor();
		return $result['pseudo'];
	}
	return false;
		 
}
function add_avatar($pseudo,$avatar_name,$thumb_name,$avt_path){
	include'libs/PD02.php';
	$requete=$pdo->prepare(
           'UPDATE users 
			SET avatar_name=:avatar_name,
				thumb_name=:thumb_name,
				avt_path=:avt_path
	        WHERE pseudo=:pseudo');
	$requete->execute(array(
			'avatar_name'=>$avatar_name,
			'thumb_name'=>$thumb_name,
			'avt_path'=>$avt_path,
			'pseudo'=>$pseudo));
}

function lire_infos_utilisateur($pseudo) {
	include'libs/PD02.php';
	$requete = $pdo->prepare("SELECT * 
		FROM users
		WHERE
		pseudo = :pseudo");

	$requete->bindValue(':pseudo', $pseudo);
	$requete->execute();

	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

		$requete->closeCursor();
		return $result;
		
	}
	return false;
}
function lire_infos_event($id) {
	include'libs/PD02.php';
	$requete = $pdo->prepare("SELECT *
		FROM events
		WHERE
		id = :id");

	$requete->bindValue(':id', $id);
	$requete->execute();

	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

		$requete->closeCursor();
		return $result;

	}
	return false;
}


