<?php
require("..\Models\XML\DrugBank.php");
$desease = $_POST['desease'];
$drug = $_POST['drug'];
$data = new DrugBank($desease,$drug);
$data->getDataByDrug();
$data->getDataByDesease();
echo "indication : ".$data->get_drugIndication();
echo "<br>";
echo "toxicity : ".$data->get_drugToxicity();
echo "<br>";
foreach ($data->get_indication() as $indi)
{
	echo $indi ."<br>";
}

?>