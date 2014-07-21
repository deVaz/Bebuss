<div class=inner1>
			<div class="container_12">
				
				<div class="wrapper">
					
					<div id="content_e">
					 <div id="title_event">
						<h1>Creer un evenement  </h1>
					  </div>
					  <div class="message"></div>
					  <div id="form">
						<form  method="POST" id="form_event">						
							<fieldset id= "info_region">
							<h1>Choisir la Region </h1>
								<select class="select1" title="Choisis ta region">
								        <option >Selectionner</option>
									    <option value="Alsace">Alsace</option>
									    <option value="Aquitaine">Aquitaine</option>
									    <option value="Auvergne">Auvergne</option>
									    <option value="Basse-Normandie">Basse-Normandie</option>
									    <option value="Bourgogne">Bourgogne</option>
									    <option value="Bretagne">Bretagne</option>
									    <option value="Centre">Centre</option>
									    <option value="Champagne-Ardenne">Champagne-Ardenne</option>
									    <option value="Corse">Corse</option>
									    <option value="Franche-Comté">Franche-Comté</option>
									    <option value="Haute-Normandie">Haute-Normandie</option>
									    <option value="Paris">Paris</option>
									    <option value="Languedoc-Roussillon">Languedoc-Roussillon</option>
									    <option value="Limousin">Limousin</option>
									    <option value="Lorraine">Lorraine</option>
									    <option value=">Midi-Pyrénées">Midi-Pyrénées</option>
									    <option value="Nord-Pas-de-Calais">Nord-Pas-de-Calais</option>
									    <option value="Pays de la Loire">Pays de la Loire</option>
									    <option value="Picardie">Picardie</option>
									    <option value="Poitou-Charentes">Poitou-Charentes</option>
									    <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
									    <option value="Rhône-Alpes">Rhône-Alpes</option>							    
							    </select><span class="correct" id="correct_region"><img src="images/check_mark_form.png"/></span><span class="erreurs" id="erreur_region"></span>					
							</fieldset>
	                  
	                  <div id="inputam">
							<fieldset class="info_orga">							      
                                    <h1>Informations Organisateur</h1>
                                      <div id="info_pratique">
									<label>Nom * </label>
									<input type = "text" name="name"  id="name1"  value="<?php echo $_SESSION['name'];?>" class="text-input"/><span class="erreurs"></span><br> 
									<label>Pseudo * </label>
									<input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo'];?>"class="text-input"/><span class="erreurs"></span><br>
									<label>Telephone * </label>
									<input type="text" name="telephone" id="telephone" value=""class="text-input"/>
									<span class="correct" id="correct_tel"><img src="images/check_mark_form.png"/></span>
									<span class="erreurs" id="erreur_tel"></span><br>
									<label>Adresse mail * </label>
									<input type="text" name="email" id="email1" value="<?php echo $_SESSION['email'];?>" class="text-input"/><span class="erreurs"></span><br>
							       </div>
							</fieldset>
							
							<fieldset class="info_orga">
							<h1>Informations Evenement </h1>
							<div id="info_pratique">
							<label>Nom de la soiree </label>
							<input type="text" name="nomSoiree" id="nomSoiree" value="" class="text-input"/>
							<span class="correct" id="correct_soiree"><img src="images/check_mark_form.png"/></span>
							<span class="erreurs" id="erreur_soiree"></span></br>
							<label>Genre </label>
							<select class="select2" title="Choisissez">
						             	<option>Selectionner</option>
									    <option>After</option>
									    <option>After Work</option>
									    <option>Autre</option>
									    <option>Before</option>
									    <option>Concert</option>
									    <option>Festivals</option>
									    <option>Soiree Clubbing</option>
									    <option>Soiree Etudiante</option>							    
							    </select>
							    <span class="correct" id="correct_genre"><img src="images/check_mark_form.png"/></span>
							    <span class="erreurs" id="erreur_genre"></span>
							    <label>Lieux </label>
							    <input type="text" name="lieux" id="lieux" value="" class="text-input"/>
							    <span class="correct" id="correct_lieux"><img src="images/check_mark_form.png"/></span>
							    <span class="erreurs" id="erreur_lieux"></span><br>				    
							    <label>Date </label>
							    <?php										 
										  // Parcours du tableau
										  echo '<select  class="jours">',"\n";
										  for($i=1; $i<=31; $i++)
										  {
										    echo "\t",'<option value="'. $i .'" >', $i ,'</option>',"\n";										 
										  }
										  echo '</select>',"\n";										  
										  $mois=array('Janvier','Fevrier','Mars','Avril','Mai','Juin',
													  'Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
                                          echo '<select class="mois">',"\n";
                                          for($i=0;$i<12;$i++){
                                          echo "\t",'<option value="'. $mois[$i] .'" >', $mois[$i] ,'</option>',"\n";
										  }
										  echo '</select>',"\n";
										  
										  echo '<select class="annees">',"\n";
										  for($i=2014; $i<=2050; $i++)
										  {
										  echo "\t",'<option value="'. $i .'" >', $i ,'</option>',"\n";
										  }
										  echo '</select>',"\n";
										  echo'<span class="erreurs" id="erreur_date"></span>';
										  echo'</br>';
										?>
										<label>Prix </label>
										<input type="text" name="prix" id="prix" value="" class="text-input"/>
									    <span class="correct" id="correct_prix"><img src="images/check_mark_form.png"/></span>
									    <span class="erreurs" id="erreur_prix"></span><br>	</br>									
										<label>Description de l'evenement</label>
										<textarea rows ="10" name="description" id="description" placeholder="Votre description de l'evenement"></textarea>
									    <span class="correct" id="correct_desc"><img src="images/check_mark_form.png"/></span>
										<span class="erreurs" id="erreur_desc"></span>
							         </div>
							</fieldset>
							</div>
							<fieldset class="info_orga">
							     <h1>Photo  de l'evenement</h1>
							     <div id="flyer_event">						    
							 	<div id="dropbox">
									<span class="message">Drop images here to upload. <br /></span>
								</div>                             	       
	                             </div>		                          				     
							</fieldset>							
					<div id="validation">				                                         
                     <input type="submit" name="submit"  class="button_valid" value="Confirmer les informations et valider " /> 
                     <span class="erreurs" id="erreur_generale"></span> 
			     	</div>	
			     	
					</form>	
					</div>
				</div>			
			</div>	
			
		</div>
	</div>
	<script>
	$(document).ready(function(){	
	
	$("#telephone").focusin(function(){		
		 $("#correct_tel").slideUp();
		 $("#telephone").css("background-color","#FFFFCC");
		 $("#telephone").css("border","");
		 $("#telephone").css("background-color","#FFFFCC");
		 
	});
 $("#nomSoiree").focusin(function(){
	
	 $("#correct_soiree").slideUp();
	 $("#nomSoiree").css("background-color","#FFFFCC");
	 $("#nomSoiree").css("border","");
	 $("#nomSoiree").css("background-color","#FFFFCC");
	 
});
 $("#lieux").focusin(function(){
	 $("#correct_lieux").slideUp();
	 $("#lieux").css("background-color","#FFFFCC");
	 $("#lieux").css("border","");
	 $("#lieux").css("background-color","#FFFFCC");
});
 $("#prix").focusin(function(){
	 $("#correct_prix").slideUp();
	 $("#prix").css("background-color","#FFFFCC");
	 $("#prix").css("border","");
	 $("#prix").css("background-color","#FFFFCC");
});
 $("#description").focusin(function(){
	 $("#correct_desc").slideUp();

	 $("#description").css("background-color","#FFFFCC");
	 $("#description").css("border","");	 
});
 $(".select1").focusin(function(){
	 $("#correct_region").slideUp('2000');
 });
 
 $("#telephone").focusout(function(){
	 var telephone=	$("#telephone").val();
	 if(telephone!=""){
	 	$("#telephone").css("background-color","#CCFFCC");
	 	$("#correct_tel").slideDown();
	 } else	{
		 css_erreur($("#telephone"),$("#erreur_tel"));
		 
	 }
 });
 
 $("#nomSoiree").focusout(function(){
	 var nomSoiree=	$("#nomSoiree").val();
	 if(nomSoiree!=""){
	 	$("#nomSoiree").css("background-color","#CCFFCC");
	 	$("#correct_soiree").slideDown();
	 } else	{
		 css_erreur($("#nomSoiree"),$("#erreur_soiree"));
		 
	 }
 });
 $("#lieux").focusout(function(){
	 var lieux=	$("#lieux").val();
	 if(lieux!=""){
	 	$("#lieux").css("background-color","#CCFFCC");
	 	$("#correct_lieux").slideDown();
	 } else {
		 css_erreur($("#lieux"),$("#erreur_lieux"));
	 }

 });
 $(".select1").focusout(function(){
	 var region=$(".select1").val();
	 if(region!="Selectionner"){
	 	$("#correct_region").fadeIn();
	 } else {
		 $("#erreur_region").html("Choisissez une option");
		 $("#erreur_region").slideDown('2000');
		 }
 });
 $("#prix").focusout(function(){
	 var prix=	$("#prix").val();		 
	 if(prix!=""){		 
		  if(!isNaN(prix)){
			  if(prix>0){
	           $("#prix").css("background-color","#CCFFCC");
	           $("#correct_prix").slideDown();
			  } else {
				  css_erreur($("#prix"));
			  }
		   } 
		  else {
			  css_erreur($("#prix"),$("#erreur_prix"));
		   }
	  }
	 else {
		 css_erreur($("#prix"),$("#erreur_prix"));	 
	 } 
 });
 
 $("#description").focusout(function(){
	 var description=	$("#description").val();
	 if(description!=""){
		  if(description.length>10){
		 $("#description").css("background-color","#CCFFCC");
		 $("#correct_desc").slideDown();
		  } else{
			  css_erreur($("#description"),$("#erreur_desc"));
		  }
	 } 
	 else {
		 css_erreur($("#description"),$("#erreur_desc"));	 
	 }

 });


 $(".button_valid").click(function () {		
	 $("#erreur_generale").slideUp(20,function(){		
	 $(".button_valid").hide().after('<img src= "images/ajax-loader.gif" class = "loader">');		
     var t=setTimeout('sendData()',2000);		
		});	
	 return false; 
});
		
	});

 function sendData(){
		   var action="modules/event/ajout.php";
			var region=$(".select1").val();
			var tel=$("#telephone").val();
			var nomSoiree=$("#nomSoiree").val();
			var genre=$(".select2").val();
			var date=$(".jours").val()+ " "+$(".mois").val()+ " "+$(".annees").val();
			var lieux=$("#lieux").val();
			var prix=$("#prix").val();
			var desc=$("#description").val();			
		 $.post(action,{
			   region: region,
			   tel: tel,
			   nomSoiree: nomSoiree,
			   genre: genre,
			   date: date,
			   lieux: lieux,
			   prix: prix,
			   desc: desc
		    	},function(data){
		    		$("#erreur_generale").html(data);
		    		$("#erreur_generale").slideDown('slow');
		    		$(".button_valid").show();
		    		$(".loader").hide();
		    		if(data.match('success')!=null)
	    			{
		    		$(".message").html(data);
	    			 $("#form").slideUp();	    			 
	    			}
		    });
	}

	function css_erreur(classe,id){
		classe.css("background-color","#FFD1D1");
		classe.css("border","1px solid #ed1c24 ");
		classe.css("border-shadow"," 0 0 1px #ed1c24 inset");		
	}

	</script>
	