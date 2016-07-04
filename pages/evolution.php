<div class="page-header">
    <h1>Data <span class="pull-right"><input class="btn btn-default" type="button" OnClick="javascript:window.location.reload()" value="Reload"></span></h1>
    <div id="show"></div>
</div>
<div class="container row">
	<div class="col-md-9" id="canv" style="height: 80%; width: 100%">
		<canvas id="myChart">
		</canvas>
	</div>
	<form class="form-inline" action="../app/action.php" method="post">
	  <div class="form-group">
	    <label for="id_node">Node : </label>
	    <select class="form-control" id="id_node" name="id_node" placeholder="" style="width: 150px">
    	<?php 
    		// require '../app/panel.php';
			$nodes = getNodes();

			for ($i = 0; $i < count($nodes); $i++){
			?>
				<option value = <?php echo "\"" . $nodes[$i]->id_node . "\""; ?> > <?php echo "" . $nodes[$i]->description; ?> </option>
			<?php
			}

    	 ?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="id_capteur">Capteur : </label>
	    <select class="form-control" id="id_capteur" name="id_capteur" placeholder="" style="width: 150px">
		<?php 
			$cible = 0 ;
			$capteurs = $nodes[$cible]->capteurs ; 
		  	if (count($capteurs) > 0) {
		  		foreach ($capteurs as $item) {
		  			?>
					<option value = <?php echo "\"" . $item['childId'] . "\""; ?> > <?php echo $item['description']; ?> </option>
					<?php

				}
			}
	 	?>

	    </select>
	  </div>
	  <button type="submit" class="btn btn-default">See Chart</button>
	</form>
</div>