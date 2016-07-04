<div class="page-header">
    <h1>Data <span class="pull-right"><input class="btn btn-default" type="button" OnClick="javascript:window.location.reload()" value="Reload"></span></h1>
    <div id="show"></div>
</div>
<div class="row" id="nodes">	
<?php 
	// require '../app/panel.php';
	$nodes = getNodes();

	for ($i = 0; $i < count($nodes) ; $i++){
		createPanel($nodes[$i], $i);
	}
 ?>

</div>