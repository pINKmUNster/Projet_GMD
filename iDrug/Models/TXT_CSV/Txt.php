<?php
	//Include other files
	require('RecordTxt.php');
	
	class Txt
	{
		
		/***********
		* File TXT *
		***********/
		
		private $txtFile;
		private $recordTxt;
		private $EOF;
		private $boolOpen;
		private $path;
		private $right;
		
		
		/**************
		* Constructor *
		**************/
		
		public function __construct($path, $right)
		{
			$this->recordTxt = new RecordTxt();
			$this->EOF = FALSE;
			$this->boolOpen = FALSE;
			$this->path = $path;
			$this->right = $right;
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
		
		public function setBoolOpen($boolOpenTmp)
		{
			$this->boolOpen = $boolOpenTmp;
		}
		
		public function setPath($pathTmp)
		{
			$this->path = $pathTmp;
		}
		
		public function setRight($rightTmp)
		{
			$this->right = $rightTmp;
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
		
		public function getBoolOpen()
		{
			return $this->boolOpen;
		}
		
		public function getPath()
		{
			return $this->path;
		}
		
		public function getRight()
		{
			return $this->right;
		}
		
		
		/***********
		* Function *
		***********/
		
		//To open a TXT file
		public function openTxt()
		{
			if ($this->boolOpen == FALSE)
			{
				$this->txtFile = fopen($this->path, $this->right);
				$this->setBoolOpen(TRUE);
			}
			else
			{
				echo "TXT file already open";
			}
			
		}
		
		//To close a TXT file
		public function closeTxt()
		{
			if ($this->boolOpen == TRUE)
			{
				$this->setBoolOpen(FALSE);
				fclose($this->txtFile);
			}
			else
			{
				echo "TXT file not open";
			}
		}
		
	}
?>