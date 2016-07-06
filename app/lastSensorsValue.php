<?php 
	require 'Database.php';

	$db = new Database();
	$result = $db->query(
		"SELECT message.id_node, message.childId, message.payload, variable.type, variable.valueType FROM message ".
		"INNER JOIN ( ".
		    "SELECT message.id_node, message.childId, MAX(message.id_message) AS max_id FROM message ".
		    "GROUP BY message.id_node, message.childId ".
		") AS m ".
		"ON message.id_node = m.id_node ".

		"INNER JOIN nodeVariable ".
		"ON (nodeVariable.childId = message.childId AND nodeVariable.id_node = message.id_node) ".

		"INNER JOIN variable ".
		"ON variable.id_variable = nodeVariable.id_variable ".

		"WHERE message.id_message = m.max_id "
	);

	echo json_encode($result);

 ?>