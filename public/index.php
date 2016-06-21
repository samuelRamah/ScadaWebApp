<?php 

	require '../app/Autoloader.php';
	App\Autoloader::register();

	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = 'home';
	}

	ob_start();

	if ($p === 'home') {
		require('../pages/home.php');
	}
	elseif ($p=== 'evolution') {
		require('../pages/evolution.php');
	}
	elseif ($p=== 'debug') {
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