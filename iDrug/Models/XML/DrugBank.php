<?php
 
  class DrugBank
 {
 
	private $m_desease;
	private $m_drug;
	private $m_TabIndication;
	private $m_TabToxicity;
	private $m_drugIndication;
	private $m_drugToxicity;
	private $XML = "..\Data\drugbank.xml";
	
	public function __construct($desease,$drug)
	{
		$this->m_desease = $desease;
		$this->m_drug = $drug;
		$this->m_TabIndication = array();
		$this->m_TabToxicity = array();

	}
	
	//GETTERS-SETTERS

	public function get_indication()
	{
		return $this->m_TabIndication;
	}
	
	public function set_indication($indic)
	{
		$this->m_TabIndication = $indic;
	}
	
	public function get_drugIndication()
	{
		return $this->m_drugIndication;
	}
	
	public function set_drugIndication($indic)
	{
		$this->m_drugIndication = $indic;
	}
	
	public function get_toxicity()
	{
		return $this->m_TabToxicity;
	}	

	public function set_toxicity($tox)
	{
		$this->m_TabToxicity = $tox;
	}
	
	public function get_drugToxicity()
	{
		return $this->m_drugToxicity;
	}	

	public function set_drugToxicity($tox)
	{
		$this->m_drugToxicity = $tox;
	}
	
	//FUNCTIONS

	public function getDataByDesease()
	{
		$xml = simplexml_load_file($this->XML) or die("Error: Cannot create object");
		$i=0;
		$indice=0;

		$size = count($xml->drug);
		//Run into the xml
		while($i<$size)
		{		
			$drug = ($xml->drug[$i]->name);
			$indication = ($xml->drug[$i]->indication);
			$toxicity = ($xml->drug[$i]->toxicity);
			//search coorespundance with the desease
			if (strpos($indication,$this->m_desease) !== false) 
			{
				$this->m_TabIndication[$i] = $drug;
			}
			
			if (strpos($toxicity,$this->m_desease) !== false) 
			{
				$this->m_TabToxicity[$i] = $drug;
			}
			$i++;
		} 
	}
	
	public function getDataByDrug()
	{
		$xml = simplexml_load_file($this->XML) or die("Error: Cannot create object");
		$i=0;
		$end = false;
		$size = count($xml->drug);
		//Stop when it finds the good drug
		while(($i<$size)&&!($end))
		{		
			$drug = ($xml->drug[$i]->name);
			if(strtoupper($drug) == strtoupper($this->m_drug))
			{
				$end = true;
				$this->set_drugIndication($xml->drug[$i]->indication);
				$this->set_drugToxicity($xml->drug[$i]->toxicity);
			}
			$i++;
		}
	}
}
 ?>