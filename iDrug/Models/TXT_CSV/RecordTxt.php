<?php
	class RecordTxt
	{
		
		/*************
		* Properties *
		*************/
		
		private $NO;
		private $TI;
		private $TX;
		private $RF;
		private $CS;
		private $CN;
		private $CD;
		private $ED;
		
		
		/**************
		* Constructor *
		**************/
		
		public function __construct()
		{
			$this->NO = '';
			$this->TI = '';
			$this->TX = '';
			$this->RF = '';
			$this->CS = '';
			$this->CN = '';
			$this->CD = '';
			$this->ED = '';
		}
		
		
		/**********
		* Setters *
		**********/
		
		public function setNO($NOTmp)
		{
			$this->NO = $NOTmp;
		}
		
		public function setTI($TITmp)
		{
			$this->TI = $TITmp;
		}
		
		public function setTX($TXTmp)
		{
			$this->TX = $TXTmp;
		}
		
		public function setRF($RFTmp)
		{
			$this->RF = $RFTmp;
		}
		
		public function setCS($CSTmp)
		{
			$this->CS = $CSTmp;
		}
		
		public function setCN($CNTmp)
		{
			$this->CN = $CNTmp;
		}
		
		public function setCD($CDTmp)
		{
			$this->CD = $CDTmp;
		}
		
		public function setED($EDTmp)
		{
			$this->ED = $EDTmp;
		}
		
		
		/**********
		* Getters *
		**********/
		
		public function getNO()
		{
			return $this->NO;
		}
		
		public function getTI()
		{
			return $this->TI;
		}
		
		public function getTX()
		{
			return $this->TX;
		}
		
		public function getRF()
		{
			return $this->RF;
		}
		
		public function getCS()
		{
			return $this->CS;
		}
		
		public function getCN()
		{
			return $this->CN;
		}
		
		public function getCD()
		{
			return $this->CD;
		}
		
		public function getED()
		{
			return $this->ED;
		}
	}
?>