<?php
require("..\Models\XML\DrugBank.php");
require("..\Models\SQL\Sql_DAO.php");

$disease = $_POST['disease'];
$drug = $_POST['drug'];

//Instance variable;
$data = new DrugBank($disease,$drug);
$dao = new DAO(null);

//query
if(!empty($drug))
{
	$data->getDataByDrug();
	$sqlAdverseMedic=$dao->getAdverse_Medic($drug);
	$sqlIndicMedic=$dao->getIndic_Medic($drug);
}
if(!empty($disease))
{
	$data->getDataByDisease();
	$sqlAdverseDisease = $DAO -> getMedic_Ad($disease);
	$sqlIndicDisease = $DAO -> getMedic_Indic($disease);
	
}
//Query
var_dump($sqlIndicMedic);

echo "indication : ".$data->get_drugIndication();
echo "<br>";
echo "toxicity : ".$data->get_drugToxicity();
echo "<br>";
foreach ($data->get_indication() as $indi)
{
	echo $indi ."<br>";
}

//Function to merge 2 array
function merge_tab($t1,$t2)
{	
	//initialize the counter at size of t1
	$i = count($t1);
	foreach($t2 as $t)
	{
		if (!(in_array($t, $t2))) 
		{
			$t2[i]=$t;
			$i++;
		}
	}
	return $t1;
}

?>