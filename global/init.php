<?php

// Inclusion du fichier de configuration (qui dŽfinit des constantes)
include 'global/config.php';

session_start();
// DŽsactivation des guillemets magiques
ini_set('magic_quotes_runtime', 0);
set_magic_quotes_runtime(0);

if (1 == get_magic_quotes_gpc())
{
	function remove_magic_quotes_gpc(&$value) {
	
		$value = stripslashes($value);
	}
	array_walk_recursive($_GET, 'remove_magic_quotes_gpc');
	array_walk_recursive($_POST, 'remove_magic_quotes_gpc');
	array_walk_recursive($_COOKIE, 'remove_magic_quotes_gpc');
}

function utilisateur_est_connecte() {

	return !empty($_SESSION['pseudo']);
}
