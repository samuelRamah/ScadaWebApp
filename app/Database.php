<?php 
/**
* 		
*/
class Database
{
	private static $db;
	
	function __construct()
	{
		
	}

	static function getInstance(){
		$db_name  = 'Scada';
	    $hostname = '192.168.0.20'; 
	    $username = 'adodab';
	    $password = 'droopy';

	    if (is_null(self::$db)){
	    	self::$db = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
	    }
	    return self::$db;
	}

	function query($sql){
		$db = self::getInstance();
		
		$statement = $db->prepare($sql);

		$statement->execute();

		$result = $statement->fetchAll( PDO::FETCH_ASSOC);

		return $result;
	}


}
 ?>