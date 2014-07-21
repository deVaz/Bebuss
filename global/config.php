<?php


// Chemins ˆ utiliser pour accŽder aux vues/modeles/librairies
$module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
define('CHEMIN_VUE',    'modules/'.$module.'/views/');
define('CHEMIN_MODELE', 'modeles/');
define('CHEMIN_LIB',    'libs/');
define('CHEMIN_GLOBAL', 'modules/global_pages/');
?>