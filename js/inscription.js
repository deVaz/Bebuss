$(document).ready(function(){
$("#popup_name form").submit(function () {	
	var action="modules/membres/inscription.php";
	var pseudo=$("#pseudo").val();
	var name=$("#name").val();
	var mdp=$("#mdp").val();
	var email=$("#email").val();
	var select=$(".select").val();
	$(".messages").slideUp(800,function(){	
		
	   $.post(action,{
		   name: name,
		   select:select,
	    	pseudo: pseudo,
	    	mdp: mdp,
	    	email: email
	    	},function(data){
	    		$(".messages").html(data);
	    		$(".messages").slideDown('slow');	    	    		
	    		if(data.match('success')!=null)
	    			{
	    			 $("#con").slideUp();
	    			 
	    			}
	    		
	    	});    
	});
	
			 return false; 
	});
});


//$('#formulaire').html('<img src= "images/camera-loader.gif">');	
//$.post("modules/membres/inscription.php",$("#contact").serialize(),function(texte){			        
//});