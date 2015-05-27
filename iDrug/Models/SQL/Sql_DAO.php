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
	
	public function get_indication($label) //medicament qui soigne 
	{
		$sql = "SELECT * FROM indications_raw WHERE i_name='$label' ";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;	
	}
	
		public function get_Adverse($label) // medicament qui provoque 
	{
	    $sql = "SELECT label,se_cui,se_name FROM adverse_effects_raw  WHERE se_name='$label'";
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
	
	
	public function getAll_Adverse() // medicament qui provoque 
	{
	    $sql = "SELECT label,se_cui,se_name FROM adverse_effects_raw  LIMIT 0, 10";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;	
	}
	
		
	public function getMedic_Ad($label)   // medicament qui provoque la maladie
	{	
		
		 $sql ="SELECT  DISTINCT  drug_name2 as 'Drug', se_name ,se_cui FROM adverse_effects_raw ar, label_mapping lm WHERE se_name ='$label' AND lm.label=ar.label ";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	
	
	public function getMedic_Indic($label) // medicament qui soigne la maladie
	{
	
		$sql ="SELECT DISTINCT  drug_name2 as 'Drug' , i_name,i_cui FROM indications_raw ir, label_mapping lm WHERE i_name='$label' AND lm.label=ir.label";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	public function getAdverse_Medic($label)
	{
		
		$sql="SELECT DISTINCT se_name as 'Name' FROM adverse_effects_raw ad, label_mapping lm WHERE lm.drug_name2 = '$label' AND lm.label=ad.label";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	public function getIndic_Medic($label)
	{
		
		$sql="SELECT DISTINCT i_name as 'Name' FROM indications_raw ir, label_mapping lm WHERE lm.drug_name2 = '$label' AND lm.label=ir.label";
		$requete = $this->connection->query($sql);
		$data = $requete->fetchAll();
		return $data ;
	}
	
}


?>