
	<div class="inner">
			<div class="container_12">

					<div class="wrapper">
					   <div class="grid_12">
					   </div>
					</div>
					<div class="wrapper">
					<div class="title"> Espace Administration</div>
						<div id="liste_soirees_non_valide">
						    <h1>Liste des soirees non validees</h1>
						    
							<?php foreach($donnees as $value){

							echo '<div>
					              <ul>
					                 <li>
					 					<a href="index.php?module=event&amp;action=afficher_event&amp;eid='.$value['eid'].'">
							                <img src="libs/timthumb.php?src=images/event_flyers/'.$value['pic'].'&h=100&w=80"title="Voir la soiree"/> 
						    		    </a>
								        <h3>'.$value['name'].'</h3>
					                    <p>'.$value['date'].'</p>
					 					<p>'.substr($value['description'],0, 8).'...</p>
					 					</li>
								  </ul>
	                             <fieldset id="zone_admin" >
					 			 <a href=""><img src="images/check_mark_form.png"/></a>
					 			 <a href=""><img src="images/croix_rouges.png"/></a>
								 </fieldset>
					 			</div></br> ';
							}?>	
						</div>
					</div>
			</div>
			
	</div>
	
	
