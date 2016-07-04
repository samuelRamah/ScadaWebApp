<?php 

	require '../app/Autoloader.php';
	App\Autoloader::register();

	require '../app/Database.php';
	require '../app/panel.php';

	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = 'home';
	}

	ob_start();

	$class = createClass(4);
	if ($p === 'home') {
		$titre = "|HOME|";
		$class[0] = "active";
		require('../pages/home.php');
?>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>

<?php

	}
	elseif ($p=== 'evolution') {
		$titre = "|EVOLUTION|";
		$class[1] = "active";
		require('../pages/evolution.php');
	
?>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="Chart/dist/Chart.js"></script>
		<script src="js/traceChart.js"></script>

<?php



	}
	elseif ($p=== 'debug') {
		$titre = "|DEBUG|";
		$class[2] = "active";
		require('../pages/debug.php');
	
?>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

<?php
	}
	elseif($p === "admin"){
		$titre = "|ADMIN|";
		$class[3] = "active";
		require('../pages/administrator.php');
	
?>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert("Paramèttre non reconnue!!!");
		</script>
		<?php
		require('../pages/home.php');
	}

?>	



<?php

	$content= ob_get_clean();

	require '../pages/templates/default.php';

 ?>


 <?php 	

 	function createClass($nb){
 		$class = array();
 		for ($i=0; $i < $nb ; $i++) { 
 			$class[$i] = "";
 		}
 		return $class;
 	}

  ?>