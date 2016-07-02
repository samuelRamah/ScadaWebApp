<?php 

require 'connectionBase.php';

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
?>
	<div class="col-sm-4 col-md-4 col-lg-3">
		<div class= <?php echo "\"node " . $classPanel[$i % 6]."\""; ?> id=<?php echo "\"node-". $node->id_node ."\""; ?>  > 
		    <div class="panel-heading">
		      <h3 class="panel-title"><?php echo "" . $node->description; ?></h3>
		    </div>
		    <div class="panel-body">
			  <?php 
			  	$capteurs = $node->capteurs ; 
			  	if (count($capteurs) > 0) {
			  		foreach ($capteurs as $item) {
				  		echo $item['description'] . "<br>";
				  		echo getValCap($node->id_node, $item['childId']) . "<br>";
				  		// echo "" . $node->get_capteur_information();
				  	}	
			  	}
			  	 
			  ?>
		      <!-- capteurs -->
		    </div>
		</div>
    </div><!-- /.col-sm-4 -->

<?php	
}

 ?>