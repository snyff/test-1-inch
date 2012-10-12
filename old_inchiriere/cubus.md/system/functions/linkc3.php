<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  06.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

// CORECT !!! // 	
	
	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function linkc3($compnay_id, $nr_characters, $languages_type) {
		
		global $CONF;
		
 		/* NR_CARACTERE CALC ...  */
		/* Controlam daca e companie  */
		if (
			 ( _fnc("user", $compnay_id, 'user_type')==1 || 
			   _fnc("user", $compnay_id, 'user_type')==2
			 ) && $compnay_id != '' 
		   ) 
		{
			
			/* Legatura care calculeaza exact pretul unui traduceri si nu cu minim 1800 caractere pe pagina. */
			$selectL = myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$compnay_id."' AND `link_type`='3'");
			$lArray=array();
			$default=1;
			while ($select = myF($selectL)) {
				$lArray[] = $select['languages_type'];
				if ($select['languages_type']==0) $default=0;
			}
			
 			if (!in_array($languages_type, $lArray) && $default==1 && $nr_characters < $CONF["NR_CHARACTERS_ON_PAGE_WITHOUT_SPACE"]) $nr_characters = $CONF["NR_CHARACTERS_ON_PAGE_WITHOUT_SPACE"];
						
			return $nr_characters;			
 
 		} else return $nr_characters; 
 	}

?>