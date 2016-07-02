<?php

        // set up the connection variables
        $db_name  = 'Scada';
        $hostname = '192.168.0.20';
        $username = 'adodab';
        $password = 'droopy';

        // connect to the database
        $dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);

        // a query get all the records from the users table
        $sql = 'SELECT * FROM message';

        // use prepared statements, even if not strictly required is good practice
        $stmt = $dbh->prepare( $sql );

        // execute the query
        $stmt->execute();

        // fetch the results into an array
        $result = $stmt->fetchAll( PDO::FETCH_ASSOC ); 	

        // convert to json
        $json = json_encode( $result );

        // echo the json string
        echo $json;
?>