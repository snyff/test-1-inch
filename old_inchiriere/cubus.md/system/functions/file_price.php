<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  16.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

// CORECT !!! //

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function file_price($nr_characters, $languages_type, $company_id, $discount='') {
		
		/* numarul de caractere */
		$nr_characters = _fnc("linkc3", $company_id, $nr_characters, $languages_type);			
	   
		/* Calculam pretul in dependenta de tipul traducerii */
		$priceTranslation = _fnc("translation", $languages_type, 'price');
		
		/* Calculam numarul de pagini */
		$pages_nr = _fnc("pages_nr", $nr_characters);
		
		/* Arata pretul */
		$price = bcdiv(($priceTranslation * $pages_nr), 1, 2);
		
		/* reducere */
 		if ($discount=='discount') $price = bcdiv(_fnc("linkc5", $company_id, $price, $languages_type), 1, 2); 

 		return $price;
	}

?>