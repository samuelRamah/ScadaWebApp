<?php 
    // $id_node = $_POST['id_node'];
    require 'Database.php';

    $id_node = $_POST['id_node'];
    $childId = $_POST['childId'];

    $sql = 'SELECT payload,receivedAt FROM message WHERE id_node=' . $id_node .' AND childId=' . $childId. ' AND NOT payload = \'nan\'  AND NOT payload LIKE \'%\\x%\' ORDER BY message.id_message DESC LIMIT 60';

    $db = new Database();
    
    $result = $db->query($sql);

    $ret_val = array();
    $ret_val['messages'] = $result;


    /*$result = $db->query("SELECT MIN(message.payload) AS min, MAX(message.payload) AS max FROM message WHERE id_node=$id_node AND childId=$childId AND NOT payload = 'nan' AND NOT payload LIKE '%\x%' ORDER BY message.id_message DESC");*/
    $result = $db->query("SELECT MIN(message.payload) AS min, MAX(message.payload) AS max FROM message INNER JOIN (SELECT id_message,payload,receivedAt FROM message WHERE id_node=$id_node AND childId=$childId AND NOT payload = 'nan' AND NOT payload LIKE '%\x%' ORDER BY message.id_message DESC LIMIT 60) AS m ON message.id_message = m.id_message WHERE message.id_node=$id_node AND message.childId=$childId AND NOT message.payload = 'nan' AND NOT message.payload LIKE '%\x%'");
    $ret_val['infos'] = $result;

    $json = json_encode( $ret_val );

    // echo the json string
    

    echo $json;

?>