<?php 

// require 'Database.php';

class Node{
	function __construct(){

	}

	public $id_node;
	public $id;
	public $sketch_name;
	public $description;
	public $capteurs;

	public function get_capteur()
	{
		$this->capteurs = array();

		$db = new Database();
		$result = $db->query("SELECT * FROM nodeVariable WHERE id_node = $this->id_node");//TOKONY SPÉCIFIENA ILA ID_NODE
		$i = 0;

		foreach ($result as $row) {
			$this->capteurs[$i]['description'] = $row['description'];
			$this->capteurs[$i]['childId']     = $row['childId'];

			$infos = $db->query("SELECT * FROM variable WHERE id_variable = " . $row['id_variable']);
			$this->capteurs[$i]['valueType'] = $infos[0]['valueType'];
			$this->capteurs[$i]['type'] = $infos[0]['type'];
			$i++;
		}
		return $this->capteurs;
	}

	public function get_capteur_information()
	{
		$db = new Database();
		$result = $db->query("SELECT valueType FROM variable ");
		return $result;
	}
}

function getNodes(){
	$db = new Database();
	$result = $db->query("SELECT * FROM node");

    $nodes = array();

    $i = 0;
    foreach ($result as $row) {

    	$nodes[$i] = new Node();
		$nodes[$i]->id_node     = $row['id_node'];
		$nodes[$i]->description = $row['description'];
		$nodes[$i]->id          = $row['id'];
		$nodes[$i]->sketch_name = $row['sketch_name'];
		$nodes[$i]->capteur = $nodes[$i]->get_capteur();

		$i++;
    }

 //    echo "<pre>";
 //    var_dump($nodes);
	// echo "</pre>";

	return $nodes;
}

function getValCap($id_node, $childId)	
{

	$db = new Database();
	$result = $db->query("SELECT payload FROM message WHERE id_node=$id_node AND childId=$childId ORDER BY message.id_message DESC LIMIT 1");


	if (count($result > 0)){
		return (isset($result[0]) ? $result[0]['payload'] : "" );
	}


	// return json_encode($result);

}



function createPanel($node, $i){
	$classPanel = array('panel panel-default','panel panel-success','panel panel-info','panel panel-warning','panel panel-primary','panel panel-danger');
	$classButton = array('btn btn-default','btn btn-success','btn btn-info','btn btn-warning','btn btn-primary','btn btn-danger');
	$backgroundColor = array('grey','#449d44','#31b0d5','#f0ad4e','#286090','#c9302c')
?>
	<div class="cols-xs-6 col-sm-6 col-md-4 col-lg-3">
		<div class= <?php echo "\"node " . $classPanel[$i % 6]."\""; ?> id=<?php echo "\"node-". $node->id_node ."\""; ?>  > 
		    <div class="panel-heading">
		      <h3 class="panel-title"><?php echo "" . $node->description; ?>

		      	<span class="pull-right dropdown">
					<i class="glyphicon glyphicon-info-sign" data-toggle="dropdown"></i>
		      		<ul class="dropdown-menu" style="background-color: <?php echo $backgroundColor[$i % 6] ?> ">
		                <li><a href="#">Id node : <?php echo "" . $node->id_node; ?></a></li>
		                <li><a href="#">Id sur le r&eacute;seau : <?php echo "" . $node->id; ?></a></li>
		                <li><a href="#">Description : <?php echo "" . $node->description; ?></a></li>
		                <li><a href="#">Sketch name : <?php echo "" . $node->sketch_name; ?></a></li>
		                <li><a href="#">Count of capteur : <?php echo "" . count($node->capteurs); ?></a></li>
		                <li class="divider"></li>
		                <li><a href="#">End of information</a></li>
		            </ul>
		      	</span>
		 
			  </h3>
		      	

		    </div>
		    <div class="panel-body">
			  <?php 
			  	$capteurs = $node->capteurs ; 
			  	if (count($capteurs) > 0) {
			  		foreach ($capteurs as $item) {
			  			?>
			  			<div id=<?php echo '"child_'. $node->id_node . '_'. $item['childId'] . '"'; ?>>				
			  			<?php
				  		echo $item['description']; 
				  		?>

							<span class="dropdown">
								<i class="glyphicon glyphicon-info-sign" data-toggle="dropdown"></i>
					      		<ul class="dropdown-menu" style="background-color: <?php echo $backgroundColor[$i % 6] ?> ">
					                <li><a href="#">Description : <?php echo "" . $item['description']; ?></a></li>
					                <li><a href="#">Child Id : <?php echo "" . $item['childId']; ?></a></li>
					                <li><a href="#">End of information</a></li>
					            </ul>
					      	</span>

				  		<?php

				  		echo "<br>";
				  		$valeur = getValCap($node->id_node, $item['childId']);
				  		// echo " ---> <span class=". '"value"' ." > " . $valeur . "</span>";
				  		?>
						
						<?php 
							if ($item['type'] == 'ACTUATOR'){
								if ($item['valueType'] == 'ANALOG'){
									//input SLider et bouton ok
									?>
									<input type="text" style="text-align: center" class="form-control" value=<?php echo '"'. $valeur . '"' ?> id=<?php echo '"text_' . $node->id_node . '_' . $item['childId'] . '"'  ?> > 
									<input type="range" value=<?php echo '"'. $valeur . '"' ?> id=<?php echo '"range_' . $node->id_node . '_' . $item['childId'] . '"'; ?> >
									<button class=<?php echo '"' .$classButton[$i % 6] . ' actuator_btn btn-block"' ?> id=<?php echo '"btn_'. $node->id_node . '_'. $item['childId'] . '"'?>> OK </button>
									

									<?php
								}
								else if ($item['valueType'] == 'NUMERIC') {
									//Boutons on/off
									?>
									<div class="onoffswitch" style="width: 40%; margin: auto;">
										<?php $id = '"switch_'. $node->id_node . '_'. $item['childId'] . '"'?>
									    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox actuator_switch" id=<?php echo "$id"; ?> <?php echo "" . ($valeur == "1" ? "checked" : ""); ?>>
									    <label class="onoffswitch-label" for=<?php echo "$id"; ?>>
									        <span class="onoffswitch-inner"></span>
									        <span class="onoffswitch-switch"></span>
									    </label>
									</div>
									<?php
								}
							}
							else if ($item['type'] == 'SENSOR'){
								?>
								<input class="form-control value" type="text" value=<?php echo '"' . $valeur .'"'; ?> id=<?php echo '"text_' . $node->id_node . '_' . $item['childId'] . '"'  ?> style="text-align: center">
								<?php
							}

						?>
						</div>
						<?php

				  		;
				  		echo "<hr>";
				  		// echo "" . $node->get_capteur_information();
				  	}	
			  	}

			  	else echo "not defined";
			  	 
			  ?>
		      <!-- capteurs -->
		    </div>
		</div>
    </div><!-- /.col-sm-4 -->

<?php	
}

 ?> 
