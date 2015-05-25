<?php
	//Include other files
	require('RecordTxt.php');
	
	class Txt
	{
		
		/***********
		* File TXT *
		***********/
		
		private $handle;
		private $recordTxt;
		private $EOF;
		private $boolOpen;
		private $path;
		private $right;
		private $cursorPosition;
		private $indexTxt;
		
		
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
			$this->indexTxt = array();
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
		
		public function setHandle($handleTmp)
		{
			$this->handle = $handleTmp;
		}
		
		public function setCursorPosition($cursorPositionTmp)
		{
			$this->cursorPosition = $cursorPositionTmp;
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
		
		public function getHandle()
		{
			return $this->handle;
		}
		
		public function getCursorPosition()
		{
			return $this->cursorPosition;
		}
		
		
		/***********
		* Function *
		***********/
		
		//To open a TXT file
		public function openTxt()
		{
			if ($this->boolOpen == FALSE)
			{
				$this->handle = fopen($this->path, $this->right);
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
				fclose($this->handle);
			}
			else
			{
				echo "TXT file not open";
			}
		}
		
		//To read a new line
		public function readLineTxt()
		{
			$line = 'ERROR_NOT_OPEN';
			
			if ($this->boolOpen == TRUE && $this->EOF == FALSE)
			{
				//Read line
				$line = fgets($this->handle);
				
				//Cursor position
				$this->cursorPosition = ftell($this->handle);
				
				//Reading error && EOF
				if($line == FALSE || feof($this->handle) == TRUE)
					$this->EOF = TRUE;
				
				//Without the LF character
				if (strlen($line) > 0)
					$line = substr($line, 0, strlen($line) - 1);
			}
			else
			{
				echo "TXT file not open";
			}
			
			return $line;
		}
		
		//To go to a position
		public function seek($position)
		{
			if ($this->boolOpen == TRUE)
			{
				fseek($this->handle, $position);
			}
			else
			{
				echo "TXT file not open";
			}
		}
		
		//Create index
		public function createIndex()
		{
			if ($this->boolOpen == TRUE)
			{
				$bool = FALSE;
				//2'22'48
				//23952 RECORD
				
				//Cursor at 0
				$this->seek(0);
				
				while($this->EOF == FALSE)
				{
					//Read a new line
					$line = $this->readLineTxt();
					
					//Store the key
					if ($bool == TRUE)
					{
						$bool = FALSE;
						
						$this->indexTxt[$line] = $this->cursorPosition;
					}
					
					//New Key of RECORD
					if ($line == '*FIELD* NO')
					{
						$bool = TRUE;
					}
					
					//EOF
					if ($line == '*THEEND*')
						break;
				}
			}
			else
			{
				echo "TXT file not open";
			}
		}
		
		public function searchIndex($index)
		{
			if ($this->boolOpen == TRUE)
			{
				$this->seek($this->indexTxt[$index]);
			}
			else
			{
				echo "TXT file not open";
			}
		}
	}
?>