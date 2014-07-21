<?php 
if (utilisateur_est_connecte()){
	include CHEMIN_MODELE.'membres.php';
	$infos_utilisateur=lire_infos_utilisateur($_SESSION['pseudo']);
	if (false !== $infos_utilisateur && $infos_utilisateur['hash_validation'] == '') {
		$pseudo=$infos_utilisateur['pseudo'];
		$name=$infos_utilisateur['name'];
		$email=$infos_utilisateur['adresse_mail'];
		$avatar_name=$infos_utilisateur['avatar_name'];
		$sexe=$infos_utilisateur['sexe'];
		$date_creation=$infos_utilisateur['created'];
		$password=sha1($infos_utilisateur['mdp']);
		$info_soiree=lire_infos_event($infos_utilisateur['id']);
         include CHEMIN_VUE.'afficher_profil.php';
	}
} 
else{
include CHEMIN_GLOBAL.'erreur_profil.php';
}
?>

  <<script type="text/javascript">    
    $(document).ready(function() { 

    	$("#convi").hide();
    	$(".bouton4").show();
    	$(".bouton4").click(function(){
    		$("#convi").toggle(400);
    		
    		return false;
    	});

    	var options = { 
		
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// always return false to prevent standard browser submit and page navigation 
			return false; 
		}); 
}); 

function afterSuccess()
{
 //hide submit button
	$('#loading-img').hide(); //hide submit button
	$("#convi").hide();
	location.reload();
	

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#fileupload').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#fileupload')[0].files[0].size; //get file size
		var ftype = $('#fileupload')[0].files[0].type; // get file type
		

		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
		
		
		$('#picture_submit').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		 
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

</script>
       