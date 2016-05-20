<?php 

	$base = new PDO('mysql:host=localhost;dbname=Scada;charset=utf8', 'adodab', 'droopy');
	$login_utilisateur = $_POST["pseudo"];
	$password_utilisateur = $_POST["pass"];
	/*-- Alaina ao anaty base ny nom_utilisateur && mopt_de_passe puis atao anaty tableau ensuite comparena
		
		supposons $nom_utilisateur && $mopt_de_passe sont reçus
		
		--*/

	$reponse = $base->query("SELECT pseudo, password FROM user WHERE pseudo=". $login_utilisateur . " AND password=" . $password_utilisateur);

	echo $reponse;


 ?>
