<?php
	//Include other files
	require('LineTxt.php');
	
	class Txt
	{
		
		/***********
		* File TXT *
		***********/
		
		private $lineTxt;
		private $EOF;
		
		
		/**************
		* Constructor *
		**************/
		
		public function __construct()
		{
			$this->lineTxt = new LineTxt();
			$this->setEOF(FALSE);
		}
		
		
		/**********
		* Setters *
		**********/
		
		public function setEOF($EOFTmp)
		{
			$this->EOF = $EOFTmp;
		}
		
		
		/**********
		* Getters *
		**********/
		
		public function getEOF()
		{
			return $this->EOF;
		}
		
	}
?>