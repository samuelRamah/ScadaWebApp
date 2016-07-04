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
	<header>
		 <div class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">Supervisory Control and Data Acquisition</a>
	        </div>
	        <div class="nav navbar-nav navbar-right navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li class=<?php echo "\"nav $class[0]\""?>><a href="index.php?p=home" ><i class="glyphicon glyphicon-home">   Home</i></a>
	            </li>
	            <li class=<?php echo "\"nav $class[1]\""?>><a href="index.php?p=evolution"><i class="glyphicon glyphicon-stats">   Evolution</i></a></li>
	            <li class=<?php echo "\"nav $class[2]\""?>><a href="index.php?p=debug"><i class="glyphicon glyphicon-hourglass">   Debug</i></a></li>
	            <li class=<?php echo "\"dropdown $class[3]\"" ?>>
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Log out <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><a href="#">Log out</a></li>
	                <li><a href="index.php?p=admin">Mode Admin</a></li>
	              </ul>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </div>		
	</header>

	<section>

		<div class="container" id="bodyHome">

			<?= $content; ?>
			<script src="js/jquery.js" type="text/javascript"></script>

		</div>

	</section>

	
	<footer>
		
	</footer>
</body>

</html>