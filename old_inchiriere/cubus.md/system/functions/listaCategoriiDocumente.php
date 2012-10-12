<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  26.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function listaCategoriiDocumente($select, $disabled) {
	    
		/*
		    CREAM SELECTUL si datele din el. 		
		*/		
		$fileSelect = myQ("
			SELECT *
			FROM `[x]categorii_documente`
			WHERE `parent` = '0' AND `statut`='1'
			ORDER BY `id` ASC
		");
		

		while ( $lisCateg = myF($fileSelect) ) {
		
			$i++;
			
			
			if ( $lisCateg['id'] == $select ) { $data_select = 'selected'; } 
			else                              { $data_select = ''; } 
			
			if ( $lisCateg['statut'] == 1   ) { $statut_html = 'Dezactiveaza'; } 
			else                              { $statut_html = 'Activeaza'; } 
			
			
			$repCateg[$i]["categ.id"]           = $lisCateg["id"];
			$repCateg[$i]["categ.selected"]     = $data_select;
			$repCateg[$i]["categ.disabled"]     = $disabled;
			$repCateg[$i]["categ.language"]     = $lisCateg[$GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]];
			$repCateg[$i]["categ.statut"]       = ($lisCateg['statut']==1)?0:1;
			$repCateg[$i]["categ.statut.html"]  = $statut_html;
			
		    $fileSelect_sub = myQ("
			    SELECT *
			    FROM `[x]categorii_documente`
			    WHERE `parent` = '".$lisCateg["id"]."' AND `statut`='1'
			    ORDER BY `id` ASC
		    ");
			
		    while ( $lisCateg_sub = myF($fileSelect_sub) ) {
		
			    $i++;
				
			    echo $data_select.'====';
				
				echo  $lisCateg_sub['id']."<br>";
				
		    	if ( $lisCateg_sub['id'] == $select ) { $data_select = 'selected'; } 
			    else                                       { $data_select = ''; } 
				
		    	if ( $lisCateg['statut'] == 1   ) { $statut_html = 'Dezactiveaza'; } 
		    	else                              { $statut_html = 'Activeaza'; } 
			
			    $repCateg[$i]["categ.id"]           = $lisCateg_sub["id"];
			    $repCateg[$i]["categ.selected"]     = $data_select;
			    $repCateg[$i]["categ.disabled"]     = $disabled;
			    $repCateg[$i]["categ.language"]     = '----'.$lisCateg_sub[$GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]];
			    $repCateg[$i]["categ.statut"]       = ($lisCateg_sub['statut']==1)?0:1;
		     	$repCateg[$i]["categ.statut.html"]  = $statut_html;
			}			
 		}
		
		return $repCateg;
	}

?>