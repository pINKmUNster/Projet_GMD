<?php
    require_once("Models\SQL\Sql_adverse_effect_raw.php");
	class actionSql
	{
		public function actionSql()
		{
			$DAO = new DAO(null);
			//$dataadv = $DAO->get_Adverse("Headache");
			//$dataind = $DAO -> getAll_indication();
			//$datalbl = $DAO -> getAll_label();
		
			//$data_ad_1 = $DAO -> getMedic_Ad("headache");
			//$data_ind_1 = $DAO -> getMedic_Indic("headache");
			
			$data_adv_med = $DAO->getAdverse_Medic("ibupro");
			$data_ind_med = $DAO->getIndic_Medic("ibupro");
			
			require_once("Views/SqlView.php");  	
			
		}
	}
 ?>