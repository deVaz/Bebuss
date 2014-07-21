<?php 

if(isset($_SESSION['admin'])){
	include CHEMIN_MODELE.'admin.php';
	$donnees=return_event();
	include CHEMIN_VUE.'page_admin.php';
} 


