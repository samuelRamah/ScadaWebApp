<?php 
	session_start();

	/*$_SESSION['nom'];
	$_SESSION['prenom'];*/

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color: rgb(220, 160, 80);
		}

		#container{
			width: 500px;
			margin: auto;
		}
		#formulaire{
			width: 400px;
			border: 2px black solid;
			border-radius: 10px;
			background-color: rgb(200, 200, 200);
			padding: 10px;
		}

		#formulaire input[type="submit"]{
			display: inline-block;
			vertical-align: left;
			background-color: rgba(15, 75, 65, 0.6);
			box-shadow: 10px;
		}

		label{
			display: inline-block;
			width: 110px;
			margin: 6px;
		}


	</style>
</head>
<body>
	<div id="container">
		<h1>MA PAGE</h1>
		<ul>
			<li>liste1</li>
			<li>liste2</li>
		</ul>
		<form method="POST" action="test.p1hp">
			<div id="formulaire">
				<label for="nom">Nom :</label>
				<input type="text" id="nom" name="nom" />
				<br/>
				<label for="mdp">Password :</label>
				<input type="password" id="mdp" name="mdp" />
				<br/>
				<label></label><input type="submit" value="envoi" />
			</div>
		</form>
	</div>
</body>
</html>