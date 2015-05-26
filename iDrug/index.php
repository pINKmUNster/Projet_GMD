<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8"></meta>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>
          <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
		<title>iDrug</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	</head>



<body>
<nav class="nav navbar-inverse ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?do=main">iDrug</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?do=about">About</a></li>
            </ul>
        </div>

    </div>
</nav>

<?php

	if($_GET['do']=="main")
	{
		require_once("Views\Main.php");
	}
	if  ($_GET['do']=="")
	{                    
	  require_once("default.html");
	}
	if  ($_GET['do']=="about")
	{                    
	  require_once("Views\about.php");
	}
	else
	{
	  if($_GET['do']=="sql")
	  {
		require_once("Controllers\actionSQL.php");
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
	<!--<footer   class="footer " >
		<nav class="nav navbar-inverse  navbar-fixed-bottom ">
			<div class="container">
				Designed by <a href="https://www.facebook.com/anthony.fioravanti.9?fref=ts" target="_blank">Anthony Fioravanti</a> ,<a href="" target="_blank">Gauthier Freund</a> et <a href="https://www.facebook.com/FlorianSieradzki?fref=ts" target="_blank">Florian Sieradzki</a>.
				<div class="pull-right" >2015 all copyrigth reserved &copy; Nancy</div>
			</div>
		</nav>
	</footer>-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	
<body>