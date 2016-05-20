<?php 

	


	$base = new PDO('mysql:host=localhost;dbname=Scada', 'adodab', 'droopy');
	
	$repNodes = $base->query("SELECT id_node, id, description FROM node");

	$i = 0;
	$retour = "";
	$tmp = "";

	while ($nodes = $repNodes->fetch()){
		$id_node = $nodes['id_node'];
		$id = $nodes['id'];
		$descNode = $nodes['description'];

		$repNodeVar = $base->query("SELECT childId, description FROM nodeVariable WHERE id_node=$id_node");
		
		$nb = 0;
		

		$retour = "";
		$tmp = "";

		while($nodeVar = $repNodeVar->fetch()){
			if ($nb != 0) {
				$tmp .= "<tr>";
			}
			$nb+= 1;
			$childId = $nodeVar['childId'];
			$description = $nodeVar['description'];

			$repMessage = $base->query("SELECT payload, receivedAt FROM message WHERE childId=$childId ORDER BY receivedAt DESC");

			$payload = $repMessage->fetch();
			$payload = $payload['payload'];
			
			

			$tmp .= "<td>$description</td><td>$payload</td><td>Stand</td><td>OK</td></tr>";

						


		}			
	
		
		$retour .= "<tr ><td rowspan=\"$nb\">$id_node - $descNode</td>";
		$retour .= $tmp;
	}

	echo $retour;
	






	//echo "<tr><td>Je suis récuperé depuis la BDD.</td></tr>";
	/*$messages = array();

	$recup_messages = $base->query("SELECT * FROM nom_base ORDER BY id");

	while ($all = $recup_messages->apc_fetch()) {
		/**-- IL FAUT ENCORE GERER LA MISE EN PAGE (<td></td><tr></tr>) --/
		/*
			if((recup_messages.length)%4 == 0)
			{$messages[]="<tr><td>".$all."</td>" ;}
			else if((recup_messages.length)%4 == 3)
			{$messages[]="<td>".$all."</tr></tr>" ;}
			else {$messages[]="<td>".$all."</tr>" ;}
			
		*/
		/*$messages[] = $all;
	}

	foreach ($messages as $message) {
		?>
			<h4></h4>
		<?php
	}
	*/
 ?>
