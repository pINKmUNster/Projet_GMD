<?php
require("..\Models\XML\DrugBank.php");
$disease = $_POST['disease'];
$drug = $_POST['drug'];
$data = new DrugBank($disease,$drug);

if(!empty($drug))
{
	$data->getDataByDrug();
}
if(!empty($disease))
{
	$data->getDataByDisease();
}

echo "indication : ".$data->get_drugIndication();
echo "<br>";
echo "toxicity : ".$data->get_drugToxicity();
echo "<br>";
foreach ($data->get_indication() as $indi)
{
	echo $indi ."<br>";
}

?>