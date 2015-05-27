<?php
	//File required
    require_once("Models\TXT_CSV\Txt.php");
    require_once("Models\TXT_CSV\Csv.php");
	
	class actionCSVTXT
	{
		
		/*******************
		* Action CSV & TXT *
		*******************/
		
		private $txt;
		private $csv;
		
		
		/**************
		* Constructor *
		**************/
		
		public function __construct()
		{
			
		}
		
		
		/**********
		* Getters *
		**********/
		
		public function getTXT()
		{
			return $this->txt;
		}
		
		public function getCSV()
		{
			return $this->csv;
		}
		
		
		/**********
		* Setters *
		**********/
		
		public function setTXT($txt)
		{
			$this->txt = $txt;
		}
		
		public function setCSV($csv)
		{
			$this->csv = $csv;
		}
		
		
		/***********
		* Function *
		***********/
		
		//To initialise TXT
		public function initTXT($path, $right)
		{
			$this->txt = new Txt($path, $right);
			$this->txt->openTxt();
			$this->txt->createIndex();
		}
		
		//To initialise CSV
		public function initCSV($path, $right)
		{
			$this->csv = new Csv($path, $right);
			$this->csv->openCsv();
			$this->csv->createIndex();
		}
		
		//To obtain informations with sick name
		public function infoSickName($sickName)
		{
			//Index on CSV
			$this->csv->searchIndex($sickName);
			
			//CSV Line
			$lineCsv = $this->csv->getLineCSV();
			
			//Index on TXT
			$this->txt->searchIndex($lineCsv->getPreferred_Label());
			
			//Read record
			$this->txt->readNextRecord();
			
			//DATA for informations
			$data = array();
			$data['Preferred_Label'] = $lineCsv->getPreferred_Label();
			$data['Synonyms'] = $lineCsv->getSynonyms();
			$data['CUI'] = $lineCsv->getCUI();
			
			//Return
			return $data;
		}
	}
 ?>