<html xmlns="http://www.w3.org/1999/xhtml" lang="fr_FR" xml:lang="fr_FR">
  <head>
    <title>
      EXEMPLE SQL
    </title>
  </head>
  <body>

    <?php
	
		
		echo " affichage table adverse <br>" ;
		
		foreach ($dataadv AS $row )
		{
			echo "se_cui : " . $row["se_cui"] . " " ;
			echo "label : " . $row["label"] ." " ;
			echo "se_name : " . $row["se_name"]." " ;
			echo "<br>";
		}
		
		
		
		
		echo " affichage table indication <br>" ;
		
		foreach ($dataind AS $row )
		{
			echo "i_cui : " . $row["i_cui"] . " " ;
			echo "label : " . $row["label"] ." " ;
			echo "i_name : " . $row["i_name"]." " ;
			echo "<br>";
		}
			
		
		echo " affichage table datalabel <br>" ;
		
		foreach ($datalbl AS $row )
		{
			echo  "drug_name1 : ".$row["drug_name1"] ." " ;
			echo  "drug_name2 : ".$row["drug_name2"]." " ;
			echo "marker : ".$row["marker"]." " ;
			echo "flat : ".$row["flat_compound_id"]." " ;
			echo "stereo : ".$row["stereo-specific_compound_id"]." " ;
			echo "url to label : ".$row["url_to_label"]." " ;
			echo " label : ".$row["label"]." " ;
			echo "<br>";
		}
		
		echo " affichage Medicament qui provoque" ; echo "<br>";
		
		foreach($data_ad_1 as $row)		
		{
			echo  "drug_name1 : ".$row["drug_name1"] ." " ;
			echo  "drug_name2 : ".$row["drug_name2"]." " ;
			echo "<br>";
		}
		echo "<br>";
			
		echo "<br>";
			echo " affichage Medicament qui soigne" ; 
			foreach($data_ind_1 as $row)		
		{
			echo  "drug_name1 : ".$row["drug_name1"] ." " ;
			echo  "drug_name2 : ".$row["drug_name2"]." " ;
			echo "<br>";
		}
				
		
			
	?>
  </body>
</html>