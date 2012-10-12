<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  17.03.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

 	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function files($file_id='', $unic_id='', $value='', $type='') {
		
 		if ($file_id!='') $select = myF(myQ("SELECT * FROM `[x]files` WHERE `file_id`='".$file_id."' LIMIT 1"));
 		if ($unic_id!='') $select = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$unic_id."' LIMIT 1"));
		
 		if ($type=='html' && $value=='') { 			
			foreach ($select as $key => $val) { 				
				$select_html["{".$key."}"] = $val;
			}			
			$select = $select_html;
		}		
				
		if ($value!='') return $select[$value];
		else            return $select;
	}

?>