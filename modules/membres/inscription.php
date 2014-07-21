<?php
$name=$_POST['name'];
$password=$_POST['mdp'];
$adresse_mail=$_POST['email'];
$pseudo=$_POST['pseudo'];
$sexe=$_POST['select'];
try {
	$pdo = new PDO('mysql:host=localhost;dbname=bebuss','root','root');
}
catch(Exception $e) {
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N¡ : '.$e->getCode();
}
    //requete utilies
    // comprendre pourquoi les function et include ne marhcent pas 
	$requete=$pdo->prepare('SELECT COUNT(*)  FROM users WHERE pseudo=?');
	$requete->execute(array($pseudo));
	$result=$requete->fetchColumn();
	
	
	$requete=$pdo->prepare('SELECT COUNT(*) FROM users WHERE adresse_mail=?');
	$requete->execute(array($adresse_mail));
	$result2=$requete->fetchColumn();
	 
	
	if ($pseudo ==""){
		echo'<div class="error">Rempli ton pseudo </div>';
		exit();
	}
	if(!is_string($pseudo)){
		echo'<div class="error">Pseudo invalide </div>';
	}
	else  if($result>0) {
		echo'<div class="error">Pseudo deja utilise </div>';
		exit();
	}
	
	else if(strlen($pseudo)<3) {
		echo'<div class="error">Pseudo trop court </div>';
		exit();
	}
	
   else if($name ==""){
  	echo'<div class="error">Champ nom vide </div>';
  
  	exit();
  } 
  else if(!is_string($name)) {
  	echo'<div class="error">  nom invalide</div>';
  	exit();
  } 
  
  // verification mdp 
  else if($password==""){
  	echo'<div class="error">Champ mot de passe vide </div>';
  	exit();
  	
  } else if (strlen($password)<6){
  	echo'<div class="error"> Mot de passe trop court</div>';
  	exit();
  }
  //verification email
  else if($adresse_mail==""){
  	echo'<div class="error"> Veuillez remplir l\'email</div>';
  	exit();
  }
  else if(!is_string($adresse_mail)){
  	echo'<div class="error"> email invalide</div>';
  	exit();
  }
  else if($result2>0) {
  	echo'<div class="error"> adresse email  deja utilisee </div>';
  	exit();
  }
  //tout s'est bien passe 
   else {
    // insertion dans la base de donnee
    $hash_validation = md5(uniqid(rand(), true));
    if($result<1){
	$requete=$pdo->prepare('INSERT INTO users (name,sexe,pseudo,password,adresse_mail,hash_validation,created) VALUES (:name,:sexe,:pseudo,:password,:adresse_mail,:hash_validation,NOW())');
	$requete->execute(array(
	 'name'=>$name,
	 'sexe'=>$sexe,
	 'pseudo'=>$pseudo,
	 'password'=>sha1($password),
	 'adresse_mail'=>$adresse_mail,
	 'hash_validation'=>$hash_validation)); 
	$requete=$pdo->prepare('SELECT COUNT(*) FROM users WHERE pseudo= ?');
	$requete->execute(array($pseudo));
	$result=$requete->fetchColumn();
	if($result >1 ){
	$requete=$pdo->prepare('SELECT *FROM users WHERE id =?');
	$requete->execute(array($pdo->lastInsertId()));
	}
    }

	$message_mail = '<html><head></head><body>
	<p>Merci de t\'inscrire sur "Bebus" !</p>
	<p>Clique sur  <a href="http://localhost:8888/bebuss/index.php?module=membres&amp;action=valider_compte&amp;hash='.$hash_validation.'">ce lien</a> pour activer ton compte !</p>
	</body></html>';
	
	$headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
	$headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
	$headers_mail .= 'From: "Bebus-CreerTaSoiree.com" <contact@monsite.com>'      ."\r\n";
	
	// Envoi du mail
	mail($adresse_mail, 'Inscription sur <bebus.com>', $message_mail, $headers_mail);
	
	echo '<div class="success"><h1>Bienvenue '.$_POST['pseudo'].'</h1>
			<div class="succes_logo">
			  <figure class="img-indent">
		       <img src="images/check_mark.jpg" alt="">
			  </figure>
			</div><br/>
			<p> Tu es maintenant inscrit </p> 
			<p>Check ton email pour valider! </p>
			</div>';

	  
	}
  
