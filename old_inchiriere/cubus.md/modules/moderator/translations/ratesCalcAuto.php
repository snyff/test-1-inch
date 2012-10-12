<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  18.02.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("ratesCalcAuto");
$tpl -> GetObjects(); 

	
	
	//die();
	
	/* Selectam din nou file pentru a le folosi aranja in LISTA */
	$selectRates = myQ("SELECT * FROM `[x]translation_languages`");
	
	/* Afisam lista cu documente */
	$i=0;
	while ($rates = myF($selectRates)) {
		
		$ratesArr[$rates['id']]['from_language'] = $rates['from_language'];		
		$ratesArr[$rates['id']]['to_language']   = $rates['to_language'];		
		$ratesArr[$rates['id']]['file_type']     = $rates['file_type'];		
		
		$i++;
	}
	
	
	//print_r($ratesArr);	
	//die();
	
	foreach ( $ratesArr as $key => $val ) {
	
			if ( $ratesArr[$key]['file_type'] == 1 ) { $file_type = 'normal_text'; } 
		elseif ( $ratesArr[$key]['file_type'] == 2 ) { $file_type = 'literal_text'; } 
		elseif ( $ratesArr[$key]['file_type'] == 3 ) { $file_type = 'technical_text'; } 
		
		//echo $file_type.'----';
		
		if ($ratesArr[$key]['from_language']==1 || $ratesArr[$key]['to_language']==1 || 
			$ratesArr[$key]['from_language']==2 || $ratesArr[$key]['to_language']==2 ) 			
		{				
			if ($ratesArr[$key]['from_language']==1 && $ratesArr[$key]['to_language']==2 || 
				$ratesArr[$key]['from_language']==2 && $ratesArr[$key]['to_language']==1 ) 			
			{							
				$ratesCalc = myF(myQ("SELECT * FROM `[x]languages` WHERE `language_id`='1' LIMIT 1"));			
				$ratesCalcArr[$key] = $ratesCalc[$file_type];

			} else {
				
				if ($ratesArr[$key]['from_language']==1 || $ratesArr[$key]['from_language']==2) $language_id = $ratesArr[$key]['to_language'];
				else $language_id = $ratesArr[$key]['from_language'];

				$ratesCalc = myF(myQ("SELECT * FROM `[x]languages` WHERE `language_id`='".$language_id."' LIMIT 1"));			
				$ratesCalcArr[$key] = $ratesCalc[$file_type];
			}

		} else {
		
			$ratesCalcOne = myF(myQ("SELECT * FROM `[x]languages` WHERE `language_id`='".$ratesArr[$key]['from_language']."' LIMIT 1"));			
			$ratesCalcTwo = myF(myQ("SELECT * FROM `[x]languages` WHERE `language_id`='".$ratesArr[$key]['to_language']."' LIMIT 1"));			
			$ratesCalcArr[$key] = $ratesCalcOne[$file_type] + $ratesCalcTwo[$file_type];
		}
	}
	
	foreach ($ratesCalcArr as $key => $val ) {
	
		myQ("UPDATE `[x]translation_languages` SET `price`='".$val."' WHERE `id`='".$key."' LIMIT 1");					
	}
	
	
	print_r($ratesCalcArr);
	
	

$tpl -> CleanZones();
$tpl -> Flush();
	
?>