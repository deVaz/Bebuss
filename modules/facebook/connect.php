<?php 
require 'facebook-sdk/facebook.php';


$facebook=new Facebook(array(
	'appid'=>'446153932181766',
    'secret'=>'20e4e964e2c4a2e8af877e3aba49b2e3'));

	header('Location:'.$facebook->getLoginUrl(array('display'=>'popup')));

?>