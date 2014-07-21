<?php $title ='Accueil Bebus';?>

<div id="content">
		<div class="ic">More Website Templates @ TemplateMonster.com - April 15, 2013!</div>
		<div id="slider">
			<div class="container_12">			
				<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
		      <div data-src="images/slide1.jpg">
		          <div class="camera_caption fadeIn">
		              <h2>Our Recent Projects</h2>
		              	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		              	<p><a href="#" class="button">More Info</a></p>
		          </div>
		      </div>
		      <div data-src="images/slide2.jpg">
		          <div class="camera_caption fadeIn">
		              <h2>biz.Power</h2>
		              	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat uis aute irure dolor reprehender.
		              	<p><a href="#" class="button">More Info</a></p>
		          </div>
		      </div>
		      <div data-src="images/slide3.jpg">
		          <div class="camera_caption fadeIn">
		              <h2>Development</h2>
		              	Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat roident, sunt in culpa qui officia.
		              	<p><a href="#" class="button">More Info</a></p>
		          </div>
		     
		     </div>
		    </div>
	  	</div>
		</div>
		<div class="inner">
			<div class="container_12">
				<div class="wrapper">
					<div class="grid_12">
						<div class="block">
						<div class="container"> 					   
						<div class="testimonial-block">
								<p><em> Bebuss est un site de referencement de soirees pour les etudiants qui souhaitent promouvoir leurs evenements </p>
							</div>
							<?php if (!utilisateur_est_connecte()) { ?>						
						   <a href="#?w=350" rel="popup_name" class="register1"></a>
						   
						   <?php } else {?>
						   <div class="grid-inner">
                                 <div id="title_m"><h2>Hello <?php echo $_SESSION['pseudo']?> </h2></br> </div>							              			
                      			  <div id="image_m"><img alt="" src="images/images.jpeg"></div>     			    			 								
																		
								<?php }?> 
							</div>
						   </div>	
					</div>
				</div>
				<div class="wrapper">
					<div class="block">
						
					</div>
				</div>
				<div class="wrapper">
					<div class="grid_12">
						<h2 class="h-pad">Our Clients</h2>
						<ul class="clients-list">
							<li><a href="#"><img src="images/client1.png" alt=""></a></li>
							<li><a href="#"><img src="images/client2.png" alt=""></a></li>
							<li><a href="#"><img src="images/client3.png" alt=""></a></li>
							<li><a href="#"><img src="images/client4.png" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>			
		</div>
	</div>	
<div id="popup_name" class="popup_block">
    <div class= "messages"></div>	
	<fieldset id="con"> 
		<h2>Inscription</h2>
		<form  method ="post"  id ="contact" > 
     
     	  <input type="text" name="pseudo" placeholder="pseudo" id="pseudo"  value="" class="text-input" /> 
     	  <div id="sexe">
     	  <select class="select" title="Select one">
    <option>male</option>
    <option>female</option>
    </select>
     	   </div>	         			
		    <input type="text" name="name" placeholder="nom" id="name"  value="" class="text-input" /> 		  
		    <input type="password" name="mdp" placeholder="mot de passe" id="mdp"  value="" class="text-input" />  		    		     
		    <input type="text" name="email" placeholder="adresse email" id="email"  value="" class="text-input" />  		    
		    <input type="submit" name="submit"  id="contact_up" value="Envoyer" />  
		     
			    <div id= "loading"><img src= "images/camera-loader.gif" ></div>
		</form>
     </fieldset>
 </div>	


<script src="js/modale.js"></script>
<script src="js/inscription.js"></script>