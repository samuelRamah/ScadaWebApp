$(document).ready(function (){

	// $(document).load(function(){
		// $("#corps-tab").append("<tr></tr>");
		// $ligne = "<td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td>";
		// $("#corps-tab tr:last").append($ligne);
	// })

	// $("#Ajout").click(function(){
	// 	$("#corps-tab").append("<tr></tr>");
	// 	$ligne = "<td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td>";
	// 	$("#corps-tab tr:last").append($ligne);
	// });

	
	// 	$.ajax({
	// 		url:"pageOfficielle.php";
	// 		success:
	// 			function(retour){
	// 				$("#corps-tab").append("<tr></tr>");
	// 				$ligne = "<td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td><td>Colonne inserer</td>";
	// 				$("#corps-tab tr:last").append($ligne);
	// 			}
	// }

	// setInterval(refresh(),2000);

	/*--------- VALEURS AO @ DEBUG ---------*/
	/*
	
	var msg-src = $("#message-source");
	var msg-type = $("#message-type");

	*/
	//envoyer();
	recupMessage();

	function recupMessage()
	{
		$.post("recuperer.php",function(donnees){
			$contenu_table = donnees;
			$("#corps-tab ").html($contenu_table);
			// $.post("temporiser.php",function(){});
			// envoyer();
			setInterval(recupMessage,2000);
		});
	}
	

});
