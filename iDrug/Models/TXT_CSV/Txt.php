<?php
	//Include other files
	require_once('RecordTxt.php');
	
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
				$this->cursorPosition = -1;
			}
			else
			{
				echo 'TXT file already open';
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
				echo 'TXT file not open';
			}
		}
		
		//To save index TXT
		public function saveIndexTXT()
		{
			$_SESSION['txt'] = $this->indexTxt;
		}
		
		//To take the save index TXT
		public function takeIndexTXT()
		{
			$this->indexTxt = $_SESSION['txt'];
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
				echo 'TXT file not open';
			}
			
			return $line;
		}
		
		//To go to a position
		public function seek($position)
		{
			if ($this->boolOpen == TRUE)
			{
				fseek($this->handle, $position);
				$this->cursorPosition = $position;
				$this->EOF = FALSE;
			}
			else
			{
				echo 'TXT file not open';
			}
		}
		
		//Create index
		public function createIndex()
		{
			if ($this->boolOpen == TRUE)
			{
				//2'22'48
				//23952 RECORD
				
				//Cursor at 0
				$this->seek(0);
				
				//Column & Stack
				$col = 0;
				$lineTmp = '';
				
				//for($z = 0 ; $z < 160 ; $z++)
				while($this->EOF == FALSE)
				{
					//Read a new line
					$line = $this->readLineTxt();
					
					//New Record
					if ($line == '*RECORD*')
					{
						//Cursor position
						$cursor = $this->cursorPosition;
					}
					
					//Split $line
					if(substr($line, 0, 7) == '*FIELD*')
					{
						if($lineTmp != '' && $col != 0)
						{
							//Store into indexTxt
							if($col == 1)
							{
								//TI
								
								//First character : maybe not a number
								if(!is_numeric(substr($lineTmp, 0, 1)))
									$lineTmp = substr($lineTmp, 1);
								
								//First word : id number : 6 characters
								$id = substr($lineTmp, 0, 6);
								$lineTmp = substr($lineTmp, 7);
								
								//Array with sentence
								//Sentence are split by ;
								$word = explode(';', $lineTmp);
								
								//Index for id
								$this->indexTxt[$id] = $cursor;
								
								//For each word
								foreach($word as $label)
								{
									$label = trim($label);
									
									if($label != '')
									{
										$this->indexTxt[$label] = $cursor;
									}
								}
								
								//Restart
								$lineTmp = '';
							}
						}
						//[*FIELD* ]
						if($line != '*FIELD* TI')
							$col = 0;
					}
					
					//To stack
					if($col != 0)
					{
						$lineTmp = $lineTmp.$line;
					}
					
					//[*FIELD* ]
					if($line == '*FIELD* TI')
						$col = 1;
					
					//EOF
					if ($line == '*THEEND*')
						break;
				}
			}
			else
			{
				echo 'TXT file not open';
			}
			
			//var_dump($this->indexTxt);
		}
		
		public function searchIndex($index)
		{
			if ($this->boolOpen == TRUE)
			{
				$this->seek($this->indexTxt[$index]);
			}
			else
			{
				echo 'TXT file not open';
			}
		}
		
		public function readNextRecord()
		{
			$line = '';
			$nameCol = '';
			$varRecord = '';
			
			while($line != '*RECORD*')
			{
				//Next line
				$line = $this->readLineTxt();
				
				$line = trim($line);
				
				if($line != '')
				{
					if(substr($line, 0, 7) == '*FIELD*' || $line == '*RECORD*')
					{
						switch ($nameCol)
						{
							case 'NO':
								$this->recordTxt->setNO($varRecord);
								break;
							case 'TI':
								$this->recordTxt->setTI($varRecord);
								break;
							case 'TX':
								$this->recordTxt->setTX($varRecord);
								break;
							case 'RF':
								$this->recordTxt->setRF($varRecord);
								break;
							case 'CS':
								$this->recordTxt->setCS($varRecord);
								break;
							case 'CN':
								$this->recordTxt->setCN($varRecord);
								break;
							case 'CD':
								$this->recordTxt->setCD($varRecord);
								break;
							case 'ED':
								$this->recordTxt->setED($varRecord);
								break;
							case '';
								break;
						}
						
						$varRecord = '';
						$nameCol = substr($line, 8);
					}
					else
					{
						$varRecord = $varRecord.'|'.$line;
					}
				}
			}
		}
	}
?>