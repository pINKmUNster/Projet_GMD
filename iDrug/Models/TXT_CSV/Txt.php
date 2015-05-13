<?php
	//Include other files
	require('RecordTxt.php');
	
	class Txt
	{
		
		/***********
		* File TXT *
		***********/
		
		private $recordTxt;
		private $EOF;
		
		
		/**************
		* Constructor *
		**************/
		
		public function __construct()
		{
			$this->recordTxt = new RecordTxt();
			$this->setEOF(FALSE);
		}
		
		
		/**********
		* Setters *
		**********/
		
		public function setEOF($EOFTmp)
		{
			$this->EOF = $EOFTmp;
		}
		
		public function setRecordTxt($recordTxtTmp)
		{
			$this->recordTxt = $recordTxtTmp;
		}
		
		
		/**********
		* Getters *
		**********/
		
		public function getEOF()
		{
			return $this->EOF;
		}
		
		public function getRecordTxt()
		{
			return $this->recordTxt;
		}
		
	}
?>