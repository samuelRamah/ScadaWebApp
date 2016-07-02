<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>|HOME|</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/slate-bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
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
	            <li class="active"><a href="#">
	            	<div class="row" style="text-align: center">
	            		<i class="glyphicon glyphicon-home"></i>	
	            	</div>
	            	<div class="row" style="padding:10px; ">Home</div>
	            	</a>
	            </li>
	            <li><a href="#about">Evolution</a></li>
	            <li><a href="#contact">Debug</a></li>
	            <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Log out <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><a href="#">Log out</a></li>
	                <li><a href="#">Mode Admin</a></li>
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
		        <h1>Data</h1>
		        <div id="show"></div>
		    </div>
      		<div class="row" id="nodes">	
				<?php 
					require 'panel.php';
					$nodes = getNodes();

					for ($i = 0; $i < count($nodes) ; $i++){
						$panel = createPanel($nodes[$i], $i);
						echo "$panel";
					}
				 ?>

      		</div>

		</div>
		
	</section>

	
	<footer>
		
	</footer>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="script.js"></script>
</body>
</html>