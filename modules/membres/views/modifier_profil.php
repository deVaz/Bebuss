
	<div class="inner">
			<div class="container_12">
				<div class="wrapper">
					<div class="grid_12">
				</div>
				</div>
				<div class="wrapper">				
					<div id="profile_img">
					<div id="output">
					<?php if($avatar_name!=null){
					echo'<img class="avatar_img" src="images/avatar/'.$avatar_name.'">';
					} else {?>
					<img src="images/image_accueil.png"class='avatar_img' alt="">
					<?php }?>	</div>												 
		    	
		     <form action="modules/membres/processupload.php" method="post" enctype="multipart/form-data" id="MyUploadForm"> 
		<figure id="photo_up"><img src="images/picture_upload.png" alt=""></figure>                      	                 
	     <input name="fileupload" id="fileupload"  type="file"/> </br>	
	     <input type="submit"  id="picture_submit" value="Upload" />        
       </form>		
		  </div>		
					  <div id="info-name"><?php echo $name;?></div>
					  <div id="sexe_icone">
					  <?php if($sexe=="male"){
					     echo'<img class="info_sexe" src="images/male_icone.png">';
					  } else {
                         echo'<img class="info_sexe" src="images/female.png">';
                        } ?>
                         </div>
					  <div id="infos_creation">Date d'inscription : <?php echo date("d-m-Y", strtotime($date_creation));?></div>			     	
				     	
      
		   <div id="bouton_mod"><a href="" class="bouton4">Modifier</a></div>	
                         <fieldset id="info_perso">
                         
                         <h1>Infos perso</h1>
                              <div id="contain_info">
					           <label id= "info_pro">Nom : <label id= "info_pro"><?php echo $pseudo;?></label></br>
					           <label id= "info_pro">Email : <label id= "info_pro"><label id="info_pro"><?php echo $email;?></label>
									</div>
					           </fieldset>
					           <fieldset id="info_perso">
					          <h1>Mes soirees organisees :</h1>				          
					           </fieldset>					           
					            <fieldset id="info_perso">
					          <h1>Je participe a :</h1>
					          
					           </fieldset>
		    
		
			
				 
			
				
		</div>
	</div>
	</div>
	
	
		 