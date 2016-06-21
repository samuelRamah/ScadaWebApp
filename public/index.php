<?php 

	require '../app/Autoloader.php';
	App\Autoloader::register();

	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = 'home';
	}

	ob_start();

	$class = array();
	if ($p === 'home') {
		$titre = "|HOME|";
		$class[0] = "active";
		require('../pages/home.php');
	}
	elseif ($p=== 'evolution') {
		$titre = "|EVOLUTION|";
		$class[1] = "active";
		require('../pages/evolution.php');
	}
	elseif ($p=== 'debug') {
		$titre = "|DEBUG|";
		$class[2] = "active";
		require('../pages/debug.php');
	}
	else{
		?>
		<script type="text/javascript">
			alert("Paramèttre non reconnue!!!");
		</script>
		<?php
		require('../pages/home.php');
	}

	$content= ob_get_clean();

	require '../pages/templates/default.php';

 ?>