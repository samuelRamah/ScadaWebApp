<!DOCTYPE html>
<html>
<head>
	<title>|PAGE OFICIELLE|</title>
	<meta charset="utf-8" />
	<!-- <meta http-equiv="refresh" content="2" /> -->
	<link rel ="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/slate-bootstrap.min.css">
</head>
<body>

	<div id="Block_Principale">

		<header>
			<div id="menu" class="navbar navbar-default navbar-fixed-top">
				<div class="navbar-header">
					<button class="btn btn-success navbar-toggle" 
					 		data-toggle="collapse" 
					 		data-target=".navbar-collapse">
					 		<span class="glyphicon glyphicon-chevron-down"></span>
					</button>
					<div id="titre">
						<h3>System Control And Data Aquisition</h3>
					</div>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="nav active"><a href="">Général</a></li>
						<li class="nav"><a href="evolution.php">Evolution</a></li>
						<li class="nav"><a href="debogage.php">Débogage</a></li>
						<li class="nav"><a href="">Administrateur</a></li>
					</ul>
				</div>
			</div>
		</header> 

		<section id="body" class="container" style="margin-top: 75px">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>ID NODE</th>
						<th>DESCRIPTION</th>
						<th>ETAT</th>
						<th>LOCALISATION</th>
						<th>AUTRE</th>
					</tr>
				</thead>
				<tbody id="corps-tab">
					
				</tbody>
			</table>
			<!-- <div id="test"></div>

			<input type="button" id="Ajout" value="Ajout()"> -->
			<script src="jquery.js" type="text/javascript"></script>
			<script src="ajax.js" type="text/javascript"></script>
		</section>

	</div>
</body>
</html>