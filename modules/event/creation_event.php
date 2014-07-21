<?php

   if (utilisateur_est_connecte()){
   	
		include CHEMIN_VUE.'formulaire_event.php';
		include CHEMIN_MODELE.'event.php';
							
	}
	else {
       include CHEMIN_GLOBAL.'erreur_profil.php';

	}
	
?>
<script type="text/javascript">



</script>