<?php
if  ($_GET['do']=="")
{                    
  require ("default.html");
}
else
{
  if($_GET['do']=="affichage")
  {
    require("Controllers\actionSQL.php");
    new actionSql();
  }
}
?>