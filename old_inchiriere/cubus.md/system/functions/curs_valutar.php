<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  23.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	function curs_valutar($pret_traducere, $type_valuta) {

		$selectValutaEuro = myF(myQ("
			SELECT *
			FROM `[x]cursvalutar`
			WHERE `CharCode` = 'EUR'
			LIMIT 1
		"));
		
		$selectValutaRate = myF(myQ("
			SELECT *
			FROM `[x]cursvalutar`
			WHERE `CharCode` = '".$type_valuta."'
			LIMIT 1
		"));
		
		 $coeficient_euro_curentValuta = $selectValutaEuro['Value']	/ $selectValutaRate['Value']; 		 
		
		 return bcdiv(( $pret_traducere * $coeficient_euro_curentValuta ), 1, 2);
	}
	
	

?>

