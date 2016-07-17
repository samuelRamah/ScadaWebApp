<!DOCTYPE html>
<html>
<head>
	<title><?= $titre; ?></title>
	<meta charset="utf-8" />
	<!-- <meta http-equiv="refresh" content="2" /> -->
	<link rel ="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/slate-bootstrap.min.css">

	<style type="text/css" media="screen">

	</style>
</head>
<body >

	<header>
		 <div class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <!-- <span > <img src="images/ispm.png" alt="ispm_logo"></span> -->
	          <a class="navbar-brand" href="#">Supervisory Control and Data Acquisition</a>
	        </div>
	        <div class="nav navbar-nav navbar-right navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li class=<?php echo "\"$class[0]\""?>><a href="index.php?p=home" ><i class="glyphicon glyphicon-home">   Home</i></a>
	            </li>
	            <li class=<?php echo "\"$class[1]\""?>><a href="index.php?p=evolution"><i class="glyphicon glyphicon-stats">   Evolution</i></a></li>
	            <li class=<?php echo "\"$class[2]\""?>><a href="index.php?p=schedule"><i class="glyphicon glyphicon-tasks">   Schedule</i></a></li>
	            <li class=<?php echo "\"$class[3]\""?>><a href="index.php?p=sketchbook"><i class="glyphicon glyphicon-grain">   SketchBook</i></a></li>
	            <li class=<?php echo "\"$class[4]\""?>><a href="index.php?p=debug"><i class="glyphicon glyphicon-console">   Debug</i></a></li>
	            <!-- <li class=<?php echo "\"$class[4]\""?>><a href="index.php?p=debug"><i class="glyphicon glyphicon-hourglass">   Debug</i></a></li> -->
	            <li class=<?php echo "\"dropdown $class[5]\"" ?>>
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
			<div class="page-header">
			    <h1> <img class="profile-img img-circle" src="images/ispm.png" alt="logo_ispm" height="100px" /> Data <span class="pull-right"><input class="btn btn-default" type="button" OnClick="javascript:window.location.reload()" value="Reload"></span></h1>
			    <div id="show"></div>
			</div>

			<?= $content; ?>

		</div>

	</section>

	
	<footer class="footer">
		
	</footer>
</body>

</html>