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

	function linkc4($compnay_id, $languages_type) {
 		
		/* NR_CARACTERE CALC ...  */
		/* Controlam daca e companie  */
		if (
			 ( _fnc("user", $compnay_id, 'user_type')==1 || 
			   _fnc("user", $compnay_id, 'user_type')==2
			 ) && $compnay_id != '' 
		   ) 
		{

			/*  Legatura 4: Compania poate face traduceri si sa achite mai tirziu chiar daca nu are bani in avans */
  			$selectL = myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$compnay_id."' AND `link_type`='4'");
			$lArray=array();
			$default=1;
			while ($select = myF($selectL)) {
				$lArray[] = $select['languages_type'];
				if ($select['languages_type']==0) $default=0;
			}
  			
			if (!in_array($languages_type, $lArray) && $default==1) return false; 
			else                                                    return true; 
  			
 		} else return false; 
 	}

?>