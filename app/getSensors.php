<?php 
	require 'Database.php';

	$id_node = $_POST['id_node'];

	$db = new Database();
	$result = $db->query("SELECT description, childId FROM nodeVariable WHERE id_node = $id_node");

	echo json_encode($result);
?>