<?php

class connections extends PDO	{

	
	
	public function __construct( ) {
	
}
	private $conn ="";
	
	 private $PDOInstance = null;
	public static function bdd()
	{
	
	$servername = "neptune.telecomnancy.univ-lorraine.fr";
	$username = "gmd-read";
	$password = "esial";
	$name="gmd";

		
		try {
			this->$PDOInstance  = new PDO("mysql:host=$servername;dbname=$name", $username, $password);
			// set the PDO error mode to exception
			this->$PDOInstance ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
	}
	
}
	?> 
