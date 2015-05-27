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
		<div class="navbar-header">
            <a class="navbar-brand" href="index.php?do=index">Index</a>
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

	/*************
	* Parameters *
	*************/
	
	session_start();
	set_time_limit(300);
	

	
	
	


	if(!isset($_GET['do'] )) 
	{
			/************
			* Main page *
			************/
		require_once("Views\Main.php");
	}
	else
	{

			
		if($_GET['do']=="research")
		{
			require_once("Views\Research.php");
		}
		
		if($_GET['do']=="main")
		{
			require_once("Views\Main.php");
		}
			/*************
			* Indexation *
			*************/
			
		if  ($_GET['do']=="index")
		{                    
			//Filre required
			require_once("Controllers\actionCSVTXT.php");
			
			//Create object
			$contenu_TXT_CSV = new actionCSVTXT();
			
			//Messsage
			echo 'Initialisation of CSV index ... <br /><br />';
			ob_flush();
			flush();
			
			//Init CSV
			$contenu_TXT_CSV->initCSV("Data\omim_onto.csv", "r");
			
			//Messsage
			echo 'Initialisation of TXT index ... <br /><br />';
			ob_flush();
			flush();
			
			//Init TXT
			$contenu_TXT_CSV->initTXT("Data\omim.txt", "r");
			
			//Fill the object
			/*if(!isset($_SESSION['txtFile']))
			{
				$contenu_TXT_CSV->initTXT("Data\omim.txt", "r");
				$_SESSION['txtFile'] = $contenu_TXT_CSV->getTXT();
			}
			else
			{
				$contenu_TXT_CSV->setTXT($_SESSION['txtFile']);
			}*/
			
			//To send to other page
			$_POST['test'] = $contenu_TXT_CSV;
			

			//Message
			echo 'Finished !';
		}
		else if  ($_GET['do']=="")
		{                    
			require_once("default.html");
		}
		else if  ($_GET['do']=="about")
		{                    
			require_once("Views\about.php");
		}
		elseif($_GET['do']=="sql")
		{
			require_once("Controllers\actionSql.php");
			new actionSql();
		}

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
	
	
	  if($_GET['do']=="index")
	  {
	  
		require("Models\TXT_CSV\Txt.php");
		
		set_time_limit(240);
		
		echo 'Création des index ...';
		
		echo '<br /><br /><br /><br />';
		
		
		$txt = new Txt("Data\omim.txt", "r");
		$txt->openTxt();
		
		$txt->createIndex();
		
		
		$txt->searchIndex('BBS4 GENE');
		$line = $txt->readLineTxt();
		echo $line;
		$line = $txt->readLineTxt();
		echo $line;
		
		$txt->searchIndex('100300');
		$line = $txt->readLineTxt();
		echo $line;
		$line = $txt->readLineTxt();
		echo $line;
		
		$txt->searchIndex('ADAMS-OLIVER SYNDROME 1');
		$line = $txt->readLineTxt();
		echo $line;
		$line = $txt->readLineTxt();
		echo $line;
		
		
		$txt->closeTxt();
		
	  }
	  
	   if($_GET['do']=="xml")
		{
		require("Models\XML\DrugBank.php");
		$drug = new DrugBank("headache");
		echo "DATA**********************<br>";
		var_dump($drug);
		
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
	

	
</body>
</html>

