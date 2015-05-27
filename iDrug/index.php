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
	
	
	/************
	* Main page *
	************/
	
	if(!isset($_GET['do'] )) 
	{
		require_once("Views\Main.php");
	}
	else
	{
		
		/***********
		* Research *
		***********/
		
		if($_GET['do']=="research")
		{
			require_once("Views\Research.php");
		}
		
		
		/************
		* Main page *
		************/
		
		elseif($_GET['do']=="main")
		{
			require_once("Views\Main.php");
		}
		
		
		/*************
		* Indexation *
		*************/
			
		elseif($_GET['do']=="index")
		{                    
			//Filre required
			require_once("Controllers\actionCSVTXT.php");
			
			//Create object && Init File
			$contenu_TXT_CSV = new actionCSVTXT();
			
			//Messsage
			echo 'Initialisation of index ... <br /><br />';
			ob_flush();
			flush();
			
			//Initialisation index
			$contenu_TXT_CSV->initIndex();
			
			//Save index
			$contenu_TXT_CSV->saveIndex();
			
			//$_SESSION
			$_SESSION['save'] = 1;
		}
		
		
		
		elseif($_GET['do']=="")
		{                    
			require_once("default.html");
		}
		elseif($_GET['do']=="about")
		{                    
			require_once("Views\about.php");
		}
		elseif($_GET['do']=="sql")
		{
			require_once("Controllers\actionSql.php");
			new actionSql();
		}
		elseif($_GET['do']=="xml")
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

