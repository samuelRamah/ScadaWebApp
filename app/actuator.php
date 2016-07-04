<?php 
	var_dump($_POST);
	
	require 'Database.php';
	$db = new Database();


	$id_node = $_POST['id_node'];
	$childId = $_POST['childId'];
	$value = (isset($_POST['value']) ? $_POST['value'] : "0");
	if ($value == "checked"){
		$value = "1";
	}

	$now = date("Y-m-d H:i:s"); 

	$subType = $db->query("SELECT variable.id_variableType FROM variable INNER JOIN nodeVariable ON variable.id_variable = nodeVariable.id_variable WHERE nodeVariable.childId = $childId AND nodeVariable.id_node = $id_node");
	$subType = $subType[0]['id_variableType'];
	
	$sql = "INSERT INTO message (id_node, childId, id_messageType, ack, sub_type, payload, receivedAt, exptype) VALUES ($id_node, $childId, 2, 0, $subType, $value, '$now', 'WEB')";
	$db->query($sql);

 ?>