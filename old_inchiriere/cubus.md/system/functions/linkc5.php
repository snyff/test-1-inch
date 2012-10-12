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

	function linkc5($compnay_id, $price, $languages_type) {
		
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
			$selectL = myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$compnay_id."' AND `link_type`='5'");
			$lArray=array();
 			while ($select = myF($selectL)) {
				
				if ($select['languages_type']==$languages_type || $select['languages_type']==0) $discount_id = $select['discount'];
  			}
			
 			if ($discount_id!='') {
				$discount = _fnc("discount", $discount_id, 'company_discount');
				$price = ($price*(100-$discount))/100;
			}
						
			return $price;			
 
 		} else return $price; 
 	}

?>