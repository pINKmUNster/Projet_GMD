<?php
 require ("Models\SQL\Sql_adverse_effect_raw_DAO.php");
 
  class actionSql
 {
  public function actionSql()
  {
    $Sql_adverse_effect_raw_DAO = new Sql_adverse_effect_raw_DAO ();
    $data = $Sql_adverse_effect_raw_DAO->get_effect();
    require("Views/affichage.phtml");  
  }
}
 ?>