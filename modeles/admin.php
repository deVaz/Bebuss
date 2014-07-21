<?php 


function return_event(){
	include CHEMIN_LIB.'PD02.php'; 
 $requete=$pdo->prepare('SELECT * FROM events WHERE hash_validation NOT IN (
 		  SELECT hash_validation FROM events WHERE hash_validation="")');
 $requete->execute();
if ($result = $requete->fetchAll(PDO::FETCH_ASSOC)) {

		$requete->closeCursor();
		return $result;

	}
	return false;
}

?>