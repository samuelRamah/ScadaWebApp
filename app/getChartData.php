<?php 
    // $id_node = $_POST['id_node'];
    require 'Database.php';

    $id_node = $_POST['id_node'];
    $childId = $_POST['childId'];

    $sql = 'SELECT payload,receivedAt FROM message WHERE id_node=' . $id_node .' AND childId=' . $childId. ' AND NOT payload = \'nan\'  ORDER BY message.id_message DESC LIMIT 60';

    $db = new Database();
    
    $result = $db->query($sql);

    $ret_val = array();
    $ret_val['messages'] = $result;


    $result = $db->query("SELECT MIN(message.payload) AS min, MAX(message.payload) AS max FROM message WHERE id_node=$id_node AND childId=$childId AND NOT payload = 'nan'ORDER BY message.id_message DESC LIMIT 60");
    $ret_val['infos'] = $result;

    $json = json_encode( $ret_val );

    // echo the json string
    

    echo $json;

?>