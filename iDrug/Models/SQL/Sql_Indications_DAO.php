<?php

	require("../connections.php");
	class Sql_Indication_DAO 
	{
		public function get_indication()
		{
			$sql = "SELECT * FROM Indication";
			$query = mysql_query($sql) or die('Erreur SQL !<br>'.mysql_error());
			$all =  mysql_fetch_all($query);
			return $all;
		}	
	}
	
	
?>