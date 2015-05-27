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
		public function initFile($pathTxt, $rightTxt, $pathCsv, $rightCsv)
		{
			$this->txt = new Txt($pathTxt, $rightTxt);
			$this->txt->openTxt();
			
			$this->csv = new Csv($pathCsv, $rightCsv);
			$this->csv->openCsv();
		}
		
		//To initialise CSV
		public function initIndex()
		{
			$this->txt->createIndex();
			$this->csv->createIndex();
		}
		
		//To save index
		public function saveIndex()
		{
			$this->csv->saveIndexCSV();
			$this->txt->saveIndexTXT();
		}
		
		//To take the save index
		public function takeIndex()
		{
			$this->csv->takeIndexCSV();
			$this->txt->takeIndexTXT();
		}
		
		//To obtain informations with sick name
		public function infoSickName($sickName)
		{
			//DATA for informations
			$data = array();
			
			//Index on CSV
			$this->csv->searchIndex($sickName);
			
			//Read line
			$this->csv->nextLine();
			
			//CSV Line
			$lineCsv = $this->csv->getLineCSV();
			
			//Index on TXT
			$this->txt->searchIndex($lineCsv->getPreferred_Label());
			
			//Read record
			$this->txt->readNextRecord();
			
			//TXT Record
			$recordTxt = $this->txt->getRecordTxt();
			
			//DATA for informations
			$data = array();
			$data['Preferred_Label'] = $lineCsv->getPreferred_Label();
			$data['Synonyms'] = $lineCsv->getSynonyms();
			$data['CUI'] = $lineCsv->getCUI();
			
			$data['TX'] = $recordTxt->getTX();
			$data['CS'] = $recordTxt->getCS();
			
			//Return
			return $data;
		}
	}
 ?>