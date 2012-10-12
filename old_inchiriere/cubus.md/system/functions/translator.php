<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  04.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function translator($translatorID, $value='', $type='') {
		
 		if ($translatorID>0) {
			$select = myF(myQ("SELECT * FROM `[x]translators` WHERE `id`='".$translatorID."' LIMIT 1"));
			
			if ($type=='html' && $value=='') { 			
				foreach ($select as $key => $val) { 				
					$select_html["{".$key."}"] = $val;
				}			
				$select = $select_html;
			}				
			if ($value=='') return $select; 
			else            return $select[$value]; 
		
		} else {
			$select = array();
			return $select; 
		}
  	}
	
?>