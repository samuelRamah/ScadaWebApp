
$(document).ready(function(){

	$("#erreur").hide();

	var pseudo = $("#pseudo").val();
	var pass = $("#pass").val();

	$("#connecter").click(function(){
		$.post("comparer_login.php",{
		 	pseudo:pseudo,
		 	pass:pass
		},function(donnee){
		 	if (donnee) {
		 		// $("erreur").show();
		 		//$("#erreur").append("<p>Vous êtes connecter!!!</p>");
		 		//$("#erreur").slideDown();
				//

				$("#debugage").text("" + donnee);
	

				//window.location = "pageOfficielle.php";
				
		 	};

			$("debugage").text( "" + donnee);
		 	// else {
		 	// 	// $("#erreur").append("<p>Il y a une errreur sur le login ou le mot de passe!!!</p>");
		 	// 	// $("erreur").show();
		 	// };	
		});
	});

});
