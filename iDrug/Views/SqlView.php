    <div class="container">
	<?php
		/*echo "coucou";echo "<br>";
			foreach ($dataadv AS $row )
		{
			echo "se_cui : " . $row["se_cui"] . " " ;
			echo "label : " . $row["label"] ." " ;
			echo "se_name : " . $row["se_name"]." " ;
			echo "<br>";
		}*/
		
		
		echo " affichage Medicament qui provoque la headache" ; echo "<br>";
		
		foreach($data_ad_1 as $row)		
		{
			
			echo  "drug_name2 : ".$row["drug_name2"]." " ;
			echo  "se_cui :".$row["se_cui"]." ";
			echo "<br>";
		}
		echo "<br>";

		echo "<br>";
			echo " affichage Medicament qui soigne la headache " ;

		foreach($data_ind_1 as $row)		
		{
			
			echo  "drug_name2 : ".$row["drug_name2"]." " ;
			echo  "i_cui :".$row["i_cui"]." ";
			echo "<br>";
		}
		echo "ok";
						
	?>
 </div>