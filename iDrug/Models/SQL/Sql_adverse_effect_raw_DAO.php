<?php
	require("Models/connections.php");
	
	class Sql_adverse_effect_raw_DAO 
	{
		public function get_effect()
		{
			$bdd = bdd();
	
			$sql = "SELECT * FROM adverse_effect_raw ";
			$query = $bdd->query($sql) or die('Erreur SQL !<br>'.mysql_error());
			return $query;
		}	
	}

	
?>