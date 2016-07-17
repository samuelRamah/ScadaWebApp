<?php 
	require 'Database.php';

	$db = new Database();
	$result = $db->query("SELECT * FROM log ORDER BY id_log DESC LIMIT 1");



	echo json_encode($result[0]);		

?>