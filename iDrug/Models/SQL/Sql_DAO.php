<?php
require_once(dirname(__FILE__).'/connections.php');

class DAO
{
	protected $connection;

	public function __construct($cnx) 
	{
 
		 if($cnx == null){
			$this->connection = connection::getInstance();	
		 }
		 else
		 { 
			$this->connection = $cnx;	
		} 
	}
	
	
	public function getTable_Name()
	{
		$sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='label_mapping'";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data; 
	
	}
	public function getAll_indication() //medicament qui soigne 
	{
		$sql = "SELECT * FROM indications_raw LIMIT 0, 10";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;	
	
	}
	
	public function getAll_label() // faut utiliser cette table pour voir les medicaments
	{
		$sql = "SELECT * FROM label_mapping  LIMIT 0, 10";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	
	
	public function getAdverse() // medicament qui provoque 
	{
	    $sql = "SELECT label,se_cui,se_name FROM adverse_effects_raw  LIMIT 0, 10";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;	
	}
	
		
	public function getAdverse_param_1($label)   // medicament qui provoque la maladie
	{
		 $sql ="SELECT  DISTINCT drug_name1, drug_name2, se_name FROM adverse_effects_raw ar, label_mapping lm WHERE se_name ='$label' AND lm.label=ar.label ";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}

	
	public function getIndication_param_1($label) // medicament qui soigne la maladie
	{
		$sql ="SELECT DISTINCT drug_name1, drug_name2, i_name FROM indications_raw ir, label_mapping lm WHERE i_name='$label' AND lm.label=ir.label";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	
	public function getIndication_param_2($label) // medicament qui soigne
	{
		 $sql ="SELECT drug_name1, drug_name2,i_name FROM indications_raw ir, label_mapping lm WHERE lm.label='$label' AND lm.label=ir.label LIMIT 0, 10";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	
	public function getAdverse_param_2($label) // medicament qui provoque 
	{
		 $sql ="SELECT drug_name1, drug_name2, se_name FROM adverse_effects_raw ar, label_mapping lm WHERE lm.label='$label' AND lm.label=ar.label LIMIT 0, 10";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	
	
}


?>