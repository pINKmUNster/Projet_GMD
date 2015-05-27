<?php
    require_once("Models\SQL\Sql_adverse_effect_raw.php");
	class actionSql
	{
		public function actionSql()
		{
			$DAO = new DAO(null);
			$dataadv = $DAO->get_Adverse("Headache");
			$dataind = $DAO -> getAll_indication();
			$datalbl = $DAO -> getAll_label();
		
			$data_ad_1 = $DAO -> getAdverse_param_1("headache");
			$data_ind_1 = $DAO -> getIndication_param_1("headache");
			
			require_once("Views/SqlView.php");  	
			
		}
	}
 ?>