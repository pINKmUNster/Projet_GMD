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
  
  
  if($_GET['do']=="curl")
  {
    $ch = curl_init("http://www.google.fr/");
	var_dump($ch);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	
  }
  
  
  if($_GET['do']=="index")
  {
	require("Models\TXT_CSV\Txt.php");
	
	set_time_limit(240);
	
    echo 'Création des index ...';
	
	echo '<br /><br /><br /><br />';
	
	
	$txt = new Txt("Data\omim.txt", "r");
	$txt->openTxt();
	
	$txt->createIndex();
	
	$txt->searchIndex('100070');
	$line = $txt->readLineTxt();
	echo $line;
	$line = $txt->readLineTxt();
	echo $line;
	
	$txt->closeTxt();
	
  }
}
?>