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
  if($_GET['do']=="csv")
  {
    require("Models\TXT_CSV\Csv.php");
	
	
	
	$csv = new Csv("Data\omim_onto.csv", "r");
	
	
	
	
	
	echo $csv->getPath()."<br />".$csv->getRight()."<br />";
	if ($csv->getBoolOpen() == TRUE)
		echo "TRUE";
	else
		echo "FALSE";
	
	
	
	
	
	$csv->openCsv();
	
	echo "<br /> after openCsv : ";
	
	if ($csv->getBoolOpen() == TRUE)
		echo "TRUE";
	else
		echo "FALSE";
	
	
	
	
	
	echo '<br /><br />Line csv<br /><br />';
	$csv->nextLine();
	$csv->nextLine();
	$csv->displayLine();
	echo '<br /><br />End line<br /><br />';
	
	
	
	
	
	
	$csv->closeCsv();
	
	echo "<br /><br />after closeCsv : ";
	
	if ($csv->getBoolOpen() == TRUE)
		echo "TRUE";
	else
		echo "FALSE";
  }
  if($_GET['do']=="txt")
  {
    require("Models\TXT_CSV\Txt.php");
  }
}
?>