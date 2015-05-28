<?php
require("..\Models\XML\DrugBank.php");
require("..\Models\SQL\Sql_DAO.php");
require("..\Models\COUCH\CouchDB.php");

$disease = $_POST['disease'];
$drug = $_POST['drug'];

//Instance variable;
$data = new DrugBank($disease,$drug);
$dao = new DAO(null);
$couch = new CouchDB();


//query
if(!empty($drug))
{
	$data->getDataByDrug();
	echo "XML"."<br>";
	$sqlAdverseMedic=$dao->getAdverse_Medic($drug);
	$sqlIndicMedic=$dao->getIndic_Medic($drug);
	echo "SQL"."<br>";
}
if(!empty($disease))
{
	$data->getDataByDisease();

	echo "XML"."<br>";
	$sqlAdverseDisease = $dao -> getMedic_Ad($disease);
	$sqlIndicDisease = $dao-> getMedic_Indic($disease);
	echo "SQL"."<br>";
	}
//Query


/*
>>>>>>> Stashed changes
echo "indication : ".$data->get_drugIndication();
echo "<br>";
echo "toxicity : ".$data->get_drugToxicity();
echo "<br>";
*/
$sqlIndicDisease=array_values($sqlIndicDisease);
$tab=$data->get_toxicity();
echo count($tab)."<br>";
echo count($sqlIndicDisease)."<br>";
$tab=merge_tab($sqlIndicDisease,$tab,'Drug');
echo count($tab)."<br>";

foreach ($sqlIndicDisease as $indi)
{
	echo $indi['Drug'] ."<br>";
}

//Function to merge 2 array
function merge_tab($t1,$t2,$type)
{	
	
	//initialize the counter at size of t1
	$i = 0;
	//add in t3 all cells of t2 not in t1
	foreach($t2 as $t[$type])
	{
		if (!(in_array($t, $t1))) 
		{
			$temp[$i] = $t;
			$i++;
		}
	}
	return array_merge($temp,$t1);
}

/*CODE GAUTHIER*/

//Filre required
require_once("Controllers\actionCSVTXT.php");

//Create object && Init File
$contenu_TXT_CSV = new actionCSVTXT();

if(!isset($_SESSION['save']))
{
	echo 'Run INDEX !';
}
else
{
	//Take index
	$contenu_TXT_CSV->takeIndex();
	
	//Search
	$dataTXTCSV = $contenu_TXT_CSV->infoSickName($disease);
	
	/*Contains
	array (size=5)
	'Preferred_Label' => string
	'Synonyms' => string
	'CUI' => string
	'TX' => string
	'CS' => string
	*/
	var_dump($dataTXTCSV);

}

/*END CODE GAUTHIER*/

?>