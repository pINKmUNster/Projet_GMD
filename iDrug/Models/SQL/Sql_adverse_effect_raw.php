<?php
require_once(dirname(__FILE__).'/Sql_DAO.php');


	class Sql_adverse_effect_raw extends DAO{
		
		var $label;
		var $se_cui;
		var $se_name;
		
		public function __construct() 
		{
			parent::__construct(null) ; 
		}
		
	}
	
	
  
 
 
?>