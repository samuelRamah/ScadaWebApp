<div class="container">
	<div class="row">
		<div class="col-md-9" id="canv" style="height: 80%; width: 100%">
			<canvas id="myChart">
			</canvas>
		</div>
	</div>
	<hr>
	<div class="row">
		<form class="form-inline" >
		  <fieldset>
		  	<legend>Chart Options</legend>
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
			    <select multiple autofocus class="form-control" id="id_capteur" name="id_capteur" placeholder="" style="width: 150px" size="3">
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
			  <div class="form-group">
					<label for="max_val">Min : </label>
					<input type="text" class="form-control"  id="min_val" width="10"></input>
			  </div> 

			  <div class="form-group">
					<label for="max_val">Max : </label>
					<input type="text" id="max_val" class="form-control " width="10" ></input>
			  </div> 
			  <button type="button" class="btn btn-primary" id="see_chart">See Chart</button>
		  </fieldset>
		</form>
	</div>
</div>