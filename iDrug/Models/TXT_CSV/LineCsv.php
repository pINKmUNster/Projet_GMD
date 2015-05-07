<?php
	class LineCsv
	{
		
		/*************
		* Properties *
		*************/
		
		private $Class_ID;
		private $Preferred_Label;
		private $Synonyms;
		private $Definitions;
		private $Obsolete;
		private $CUI;
		private $Semantic_Types;
		private $Parents;
		
		
		/**************
		* Constructor *
		**************/
		
		public function __construct()
		{
			$this->Class_ID = "";
			$this->Preferred_Label = "";
			$this->Synonyms = "";
			$this->Definitions = "";
			$this->Obsolete = FALSE;
			$this->CUI = "";
			$this->Semantic_Types = "";
			$this->Parents = "";
		}
		
		
		/**********
		* Setters *
		**********/
		
		public function setClass_ID($Class_IDTmp)
		{
			$this->Class_ID = $Class_IDTmp;
		}
		
		public function setPreferred_Label($Preferred_LabelTmp)
		{
			$this->Preferred_Label = $Preferred_LabelTmp;
		}
		
		public function setSynonyms($SynonymsTmp)
		{
			$this->Synonyms = $SynonymsTmp;
		}
		
		public function setDefinitions($DefinitionsTmp)
		{
			$this->Definitions = $DefinitionsTmp;
		}
		
		public function setObsolete($ObsoleteTmp)
		{
			$this->Obsolete = $ObsoleteTmp;
		}
		
		public function setCUI($CUITmp)
		{
			$this->CUI = $CUITmp;
		}
		
		public function setSemantic_Types($Semantic_TypesTmp)
		{
			$this->Semantic_Types = $Semantic_TypesTmp;
		}
		
		public function setParents($ParentsTmp)
		{
			$this->Parents = $ParentsTmp;
		}
		
		
		/**********
		* Getters *
		**********/
		
		public function getClass_ID()
		{
			return $this->Class_ID;
		}
		
		public function getPreferred_Label()
		{
			return $this->Preferred_Label;
		}
		
		public function getSynonyms()
		{
			return $this->Synonyms;
		}
		
		public function getDefinitions()
		{
			return $this->Definitions;
		}
		
		public function getObsolete()
		{
			return $this->Obsolete;
		}
		
		public function getCUI()
		{
			return $this->CUI;
		}
		
		public function getSemantic_Types()
		{
			return $this->Semantic_Types;
		}
		
		public function getParents()
		{
			return $this->Parents;
		}
	}
?>