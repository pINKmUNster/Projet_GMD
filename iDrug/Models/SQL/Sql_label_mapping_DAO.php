<?php


	require("../connections.php");
	class Sql_label_mapping_DAO 
	{
		public function get_label()
		{
			$sql = "SELECT * FROM label_mapping";
			$query = mysql_query($sql) or die('Erreur SQL !<br>'.mysql_error());
			$all =  mysql_fetch_all($query);
			return $all;
		}	
	}
?>