<!DOCTYPE html>
<html>
<head>
	<title><?= $titre; ?></title>
	<meta charset="utf-8" />
	<!-- <meta http-equiv="refresh" content="2" /> -->
	<link rel ="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/slate-bootstrap.min.css">
</head>
<body>

	<div id="Block_Principale">

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
						<li id="home" class=<?php echo "\"nav $class[0]\""?>><a href="index.php?p=home">Home</a></li>
						<li id="evolution" class=<?php echo "\"nav $class[1]\""?>><a href="index.php?p=evolution">Evolution</a></li>
						<li id="debug" class=<?php echo "\"nav $class[2]\""?>><a href="index.php?p=debug">Debug</a></li>
						<li class=<?php echo "\"nav $class[3]\""?>><a href="index.php?p=admin">Admin</a></li>
					</ul>
				</div>
			</div>
		</header> 

		<section id="body" class="container">

			<?= $content; ?>
			
			<script src="js/jquery.js" type="text/javascript"></script>
		</section>

	</div>
</body>
</html>