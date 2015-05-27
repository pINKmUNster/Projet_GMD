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
	session_start();
	
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
			$csv->openCsv();
			$csv->createIndex();
			$csv->searchIndex('BBS4 GENE');
			var_dump($csv);
			$csv->closeCsv();
			
			/*if(!isset($_SESSION['csv']))
			{
				$csv = new Csv("Data\omim_onto.csv", "r");
				$csv->openCsv();
				$csv->createIndex();
				$csv->closeCsv();
				
				$_SESSION['csv'] = $csv;
			}
			else
			{
				$csv = $_SESSION['csv'];
				
				$csv->openCsv();
				
				$csv->searchIndex('BBS4 GENE');
				
				var_dump($csv);
				
				$csv->closeCsv();
			}*/
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
			
			if(!isset($_SESSION['txt']))
			{
				$txt = new Txt("Data\omim.txt", "r");
				$txt->openTxt();
				$txt->createIndex();
				$txt->closeTxt();
				
				$_SESSION['txt'] = $txt;
			}
			else
			{
				$txt = $_SESSION['txt'];
				
				$txt->openTxt();
				
				$txt->searchIndex('100070');
				
				$txt->readNextRecord();
				
				var_dump($txt);
				
				$txt->closeTxt();
			}
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