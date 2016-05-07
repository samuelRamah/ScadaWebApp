<!DOCTYPE html>
<html>
<head>
	<title>|PAGE OFICIELLE|</title>
	<meta charset="utf-8"/>
	<link rel ="stylesheet" type="text/css" href="styleOfficielle.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/slate-bootstrap.min.css">
</head>
<body>

	<header class="container">
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
						<li class="nav"><a href="pageOfficielle.php">Général</a></li>
						<li class="nav"><a href="evolution.php">Evolution</a></li>
						<li class="nav active"><a href="">Débogage</a></li>
						<li class="nav"><a href="">Administrateur</a></li>
					</ul>
				</div>
			</div>
		</header> 

		<section id="body" class="container">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th>Message source</th>
					<th><input type="text"/></th>
				</tr>
				<tr>
					<th>Message type</th>
					<th><input type="text"/></th>
				</tr>
				<tr>
					<th>Reçu</th>
					<th><input type="checkbox"></th>
				</tr>
				<tr>
					<th>Non reçu</th>
					<th><input type="checkbox"></th>
				</tr>
			</table>

			<input type="submit" value="Test" background-color="bleu" />
		</section>
</body>
</html>