<div class="row" id="nodes">	
<?php 
	// require '../app/panel.php';
	$nodes = getNodes();

	for ($i = 0; $i < count($nodes) ; $i++){
		createPanel($nodes[$i], $i);
	}
 ?>

</div>