<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

<title> <?php echo $title ?> </title>
<meta charset="utf-8"><link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/camera.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/modale.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/dropbox.css" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.js"></script>
<script type="text/javascript" src="js/camera.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/connexion.js"></script>
<script type="text/javascript" src="js/jquery.filedrop.js"></script>
 <script type="text/javascript" src="js/script.js"></script>

<script>
    jQuery(function(){      
      jQuery('#camera_wrap_1').camera({
        height: '317px',
        loader: false,
        pagination: false,
        thumbnails: false
      });
    });
  </script>
  <!--[if lt IE 8]><div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div><![endif]-->
  	<!--[if lt IE 9]>
	   	<script src="js/html5shiv.js"></script>
	   	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	   	<link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
	   	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	   	<link href='http://fonts.googleapis.com/css?family=Lato:400' rel='stylesheet' type='text/css'>
	   	<link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
    <![endif]-->
</head>

<body>
	<header>
	
		<div class="container_12">		
				<div class="wrapper">
				
					<a href="index.php" class="logo"></a>
					<?php if(utilisateur_est_connecte()){
					echo'<nav style="margin-right:165px">';
					} else {
                      echo'<nav style="margin-right:250px">';
                     }?>
					
						<ul class="menu">
							<li class="active"><a href="index.php">Bebuss</a></li>
							<li><a href="works.html">Soirees </a></li>
							 <?php if(utilisateur_est_connecte()) { ?>
							<li><a href="index.php?module=membres&amp;action=afficher_profil">Profil</a></li>
							<?php }?>
							<?php
							  if(!empty($_SESSION['admin'])){
								echo'<li><a href=index.php?module=admin&amp;action=valider_soiree>Admin</a></li> ';
                             }?>
							<li><a href="contacts.html">contacts</a></li>
						</ul>
					</nav>
					 
					 <?php if (isset($_SESSION['avatar'])){					 	 
                      echo '<img class="circular" src="images/avatar/'.$_SESSION['avatar'].'">';
					 }
					  else 
 					 { 
 					 	echo '<img class="circular" src="images/default_large.png">';
                     }?>
					
					
					<div id="info_bulle">   
					  <img src="images/bulle.png" alt="" id="fleche_bulle" />                
	                   <div class="dropdown">
	                   <?php 
	                    if(utilisateur_est_connecte()){ ?>		                   
			                   <h1 id="info_title"> <?php echo $_SESSION['pseudo'];?></h1>			                   
			                    <ul class="root">						
									<li>													
										<a href="index.php?module=membres&amp;action=afficher_profil">Profil</a>										
									</li>						
									<li>													
										<a href="index.php?module=membres&amp;action=deconnexion">Logout</a>										
									</li>					
								</ul>							
						<?php } else { ?> 								
							<ul class="root"> 
								<li>
		                        <a href="#?w=350" rel="connexionForm" class="connexion">se connecter</a>
		                        </li>
	                        </ul>
	                        </div> 
	                    <?php }?>                                 
                </div>	                          
			</div>					
	 </div>
	
	<div id="connexionForm" class="popup_block">
	    <div class="messages"></div>	
		<fieldset id="con1"> 
			<h2>Connexion</h2>
			<form  method ="post" id ="contact">      
	     	 	<input type="text" name="pseudo" placeholder="pseudo" id="pseudo1"  value="" class="text-input" />     	         					 
			    <input type="password" name="mdp" placeholder="mot de passe" id="mdp1"  value="" class="text-input" />  		    		     		    
			    <input type="submit" name="submit"  id="contact_co" value="connexion" /> 
			    <div id= "loading"><img src= "images/camera-loader.gif" ></div>   
			 </form>
	     </fieldset>
 </div>	
		
	</header>
<script type="text/javascript">
$(document).ready(function(){	
	
	$("#info_bulle").hide();	
	$(".circular").click(function(){
		 $("#info_bulle").toggle(400);		
		return false;
    });
    	
	$("#connexionForm form").submit(function () {		 
		$(".messages").slideUp(800,function(){	
		   $("#contact_co").hide();
		   $("#loading").fadeIn('slow');
           var t=setTimeout('sendData1()',1000);        		   				   
		});		
				 return false; 
	});	
});

function sendData1(){
	  var action="modules/membres/connexion.php";
	  var pseudo1=$("#pseudo1").val();
	  var mdp1=$("#mdp1").val();		
	     $.post(action,{
		   pseudo1: pseudo1,
		   mdp1: mdp1,
	    	},function(data){
	    		$(".messages").html(data);
	    		$(".messages").slideDown('slow');
	    		$("#loading").fadeOut('slow',function(){
	    		$("#contact_co").fadeIn(100);	
	    		});
	    		if(data.match('success')!=null)
	    			{
	    			 $("#con1").slideUp();
	    			 
	    			}
	    	});
};
//function delay(ms){
//	var end=new Date().getTime() +ms;
//	while(end > new Date().getTime() );
//}


</script>