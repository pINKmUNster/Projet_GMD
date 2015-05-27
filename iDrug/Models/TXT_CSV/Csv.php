<?php
	//Include other files
	require_once('LineCsv.php');
	
	class Csv
	{
		
		/***********
		* File CSV *
		***********/
		
		private $SplFileObject;
		private $lineNumber;
		private $boolOpen;
		private $path;
		private $right;
		private $lineCsv;
		private $EOF;
		private $indexCsv;
		
		
		/**************
		* Constructor *
		**************/
		
		public function __construct($path, $right)
		{
			$this->lineCsv = new LineCsv();
			$this->setPath($path);
			$this->setRight($right);
			$this->setBoolOpen(FALSE);
			$this->setLineNumber(0);
			$this->setEOF(FALSE);
			$this->indexCsv = array();
		}
		
		
		/**********
		* Setters *
		**********/
		
		public function setPath($pathTmp)
		{
			$this->path = $pathTmp;
		}
		
		public function setRight($rightTmp)
		{
			$this->right = $rightTmp;
		}
		
		public function setBoolOpen($boolOpenTmp)
		{
			$this->boolOpen = $boolOpenTmp;
		}
		
		public function setLineNumber($lineNumberTmp)
		{
			$this->lineNumber = $lineNumberTmp;
		}
		
		public function setLineCsv($lineCsvTmp)
		{
			$this->lineCsv = $lineCsvTmp;
		}
		
		public function setEOF($EOFTmp)
		{
			$this->EOF = $EOFTmp;
		}
		
		
		/**********
		* Getters *
		**********/
		
		public function getPath()
		{
			return $this->path;
		}
		
		public function getRight()
		{
			return $this->right;
		}
		
		public function getBoolOpen()
		{
			return $this->boolOpen;
		}
		
		public function getLineNumber()
		{
			return $this->lineNumber;
		}
		
		public function getLineCsv()
		{
			return $this->lineCsv;
		}
		
		public function getEOF()
		{
			return $this->EOF;
		}
		
		
		/***********
		* Function *
		***********/
		
		//To open a CSV file
		public function openCsv()
		{
			if ($this->boolOpen == FALSE)
			{
				$this->SplFileObject = new SplFileObject($this->path, $this->right);
				$this->SplFileObject->setFlags(SplFileObject::READ_CSV);
				$this->setBoolOpen(TRUE);
				$this->setLineNumber(-1);
			}
			else
			{
				echo "CSV file already open";
			}
			
		}
		
		//To close a CSV file
		public function closeCsv()
		{
			if ($this->boolOpen == TRUE)
			{
				$this->setBoolOpen(FALSE);
			}
			else
			{
				echo "CSV file not open";
			}
		}
		
		//To recover the next line
		public function nextLine()
		{
			if ($this->boolOpen == TRUE && $this->EOF == FALSE)
			{
				// $this->SplFileObject->fgetcsv() contains
				// array (size=8)
				// 0 => string 'Class_ID'
				// 1 => string 'Preferred_Label'
				// 2 => string 'Synonyms'
				// 3 => string 'Definitions'
				// 4 => string 'Obsolete'
				// 5 => string 'CUI'
				// 6 => string 'Semantic_Types'
				// 7 => string 'Parents'
				
				//Data
				$this->storeLine($this->SplFileObject->fgetcsv());
				
				//LineNumber
				$this->lineNumber = $this->SplFileObject->key();
			}
			else
			{
				echo "CSV file not open";
			}
		}
		
		//To store a line
		public function storeLine($data)
		{
			if ($this->SplFileObject->eof() == TRUE || $data[0] == NULL)
				$this->EOF = TRUE;
			else
			{
				//Load in LineCsv
				$this->lineCsv->setClass_ID($data[0]);
				$this->lineCsv->setPreferred_Label($data[1]);
				$this->lineCsv->setSynonyms($data[2]);
				$this->lineCsv->setDefinitions($data[3]);
				$this->lineCsv->setObsolete($data[4]);
				$this->lineCsv->setCUI($data[5]);
				$this->lineCsv->setSemantic_Types($data[6]);
				$this->lineCsv->setParents($data[7]);
			}
		}
		
		//To display a CSV line
		public function displayLine()
		{
			echo $this->lineCsv->getClass_ID().'<br />';
			echo $this->lineCsv->getPreferred_Label().'<br />';
			echo $this->lineCsv->getSynonyms().'<br />';
			echo $this->lineCsv->getDefinitions().'<br />';
			echo $this->lineCsv->getObsolete().'<br />';
			echo $this->lineCsv->getCUI().'<br />';
			echo $this->lineCsv->getSemantic_Types().'<br />';
			echo $this->lineCsv->getParents().'<br />';
		}
		
		//To search a specific line
		public function seek($numLine)
		{
			if ($this->boolOpen == TRUE)
			{
				$this->SplFileObject->seek($numLine);
				$this->lineNumber = $this->SplFileObject->key();
				$this->storeLine($this->SplFileObject->current());
			}
			else
			{
				echo 'CSV file not open';
			}
		}
		
		//To search a line
		public function searchIndex($index)
		{
			if ($this->boolOpen == TRUE)
			{
				$this->seek($this->indexCsv[$index]);
			}
			else
			{
				echo 'CSV file not open';
			}
		}
		
		//To create index
		public function createIndex()
		{
			if ($this->boolOpen == TRUE)
			{
				//2'22'48
				//23952 RECORD
				
				//Cursor at 0
				$this->seek(0);
				
				while($this->EOF == FALSE)
				{
					$this->nextLine();
					$this->indexCsv[$this->lineCsv->getPreferred_Label()] = $this->lineNumber;
					$this->indexCsv[$this->lineCsv->getSynonyms()] = $this->lineNumber;
				}
			}
			else
			{
				echo 'CSV file not open';
			}
		}
	}
?>