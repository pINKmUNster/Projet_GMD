<?php

class connection extends PDO	{

	
	private static $_instance ; 
	
	public function __construct( ) 
	{

	}
	
	
	public static function getInstance()
	{
		$servername = "neptune.telecomnancy.univ-lorraine.fr";
		$username = "gmd-read";
		$password = "esial";
		$name="gmd";
		
		if (!isset(self::$_instance)) 
		{
 
			try {
			 
				self::$_instance = new PDO("mysql:host=$servername;dbname=$name" , "$username" , "$password",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			
			 } catch (PDOException $e) {
			 
			 echo $e;
			 
			 die ('SQL Error');
			 
			 }
		}
		return self::$_instance;
		
	}
	
	/*public static function bdd()
	{
	
	

		
		try {
			$PDOInstance  = new PDO("mysql:host=$servername;dbname=$name", $username, $password);
			// set the PDO error mode to exception
			$PDOInstance ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully";
			}
		catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
			
			
	}
	
	function mysql_fetch_all($query, $kind = 'assoc') {
		$result = array();
		$kind = $kind === 'assoc' ? $kind : 'row';
		eval('while(@$r = mysql_fetch_'.$kind.'($query)) array_push($result, $r);');
		return $result;
	}*/
	
}
	?> 
