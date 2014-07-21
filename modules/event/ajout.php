<?php 
session_start();
$region=$_POST['region'];
$tel=$_POST['tel'];
$nomSoiree=$_POST['nomSoiree'];
$genre=$_POST['genre'];
$date=$_POST['date'];
$lieux=$_POST['lieux'];
$prix=$_POST['prix'];
$desc=$_POST['desc'];

try {
	$pdo = new PDO('mysql:host=localhost;dbname=bebuss','root','root');
}
catch(Exception $e) {
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N° : '.$e->getCode();
}

if ($region =="Selectionner"){
	echo'<div class="erreur"> choisissez une region </div>';
	exit();
}
	else if($tel==""){
		echo'<div class="erreur">Champ telephone vide </div>';
		exit();		
	}
	else if($nomSoiree==""){
		echo'<div class="erreur"> Champ soiree vide </div>';
		exit();
	}	
	else if($genre=="Selectionner"){
		echo'<div class="erreur"> Choisissez un type de soiree </div>';
		exit();
	}
	else if($date=="1 janvier 2014"){
		echo'<div class="erreur"> Choisissez une date </div>';
		exit();
	}
	else if($lieux==""){
		echo'<div class="erreur"> Choisissez un endroit </div>';
		exit();
	}
	else if($prix==""){
		echo'<div class="erreur"> Champ prix vide </div>';
		exit();
	}
	else if($prix<0){
		echo'<div class="erreur"> Montant negatif </div>';
	}
	else if($desc==""){
		echo'<div class="erreur">Champ description vide </div>';
	}
	else if(strlen($desc)<10){
		echo'<div class="erreur"> Description trop courte</div>';
	}

else {
	$hash_validation = md5(uniqid(rand(), true));
		$requete=$pdo->prepare('INSERT INTO events (name,location,creator_id,prix,pic,description,genre,date,region,hash_validation)
				 VALUES (:name,:location,:creator_id,:prix,:pic,:description,:genre,:date,:region,:hash_validation)');
		$requete->execute(array(
				'name'=>$nomSoiree,
				'location'=>$lieux,
				'creator_id'=>$_SESSION['id'],
				'prix'=>$prix,
				'pic'=>$_SESSION['tempo_event'],
				'description'=>$desc,
				'genre'=>$genre,
				'date'=>$date,
				'region'=>$region,
				'hash_validation'=>$hash_validation
				));
		
		$requete=$pdo->prepare('UPDATE users SET telephone=:telephone WHERE id=:id');
		$requete->execute(array('telephone'=>$tel,
		'id'=>$_SESSION['id']));
		$_SESSION['tempo_event']="";
	echo '<div class="success"><p>'.$_SESSION['pseudo'].'Ton évènement a bien ete enregistre</p><br/>
		<p> Tu recevras prochainement (approximativement 24h) un email de confirmation</p> 
		 <p><div class="lien_retour"><a href="index.php">Retour a l\'accueil</a></p>
	     <p><div class="lien_retour"><a href="index.php?module=membres&amp;action=afficher_profil">Retour au profil</a></p>';
	
	    
	
	}


?>