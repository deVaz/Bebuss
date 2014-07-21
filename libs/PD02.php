<?php 
try {
	$pdo = new PDO('mysql:host=localhost;dbname=bebuss','root','root');
}
catch(Exception $e) {
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N¡ : '.$e->getCode();
}