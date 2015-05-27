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
		
}
	?> 
