<?php 
    // $id_node = $_POST['id_node'];
    require 'Database.php';

    $sql = 'SELECT payload,receivedAt FROM message WHERE id_node=6 AND childId=0 ORDER BY message.id_message DESC LIMIT 10';

    $db = new Database();
        
    $result = $db->query($sql);
    $json = json_encode( $result );

    // echo the json string
    

    echo $json;

?>