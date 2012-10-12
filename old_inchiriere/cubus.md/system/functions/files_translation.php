<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  02.03.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

 	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function files_translation($unic_id, $action) {
 		global $arrLoop;
		
		/* Am scos datele despre traducere */
		$selectF  = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$unic_id."' LIMIT 1"));
  		if ($selectF['file_id']!='') {
		
			$arr = array();
			$arr = $selectF;
 			
			if ($action!='addNewFile') $selectFT = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='".$selectF['file_id']."' AND `parent_file_to_translator_id`='0' LIMIT 1"));
	 		if ($selectFT['file_id']!='') {
 				
 				$arr = array();
				$arr = $selectFT;
				$arr['translation_status'] = $selectF['translation_status'];
				$arr['price_discount']     = $selectF['price_discount'];
				$arr['price']              = $selectF['price'];
				
 				files_translation_loop($selectFT['file_id'], $selectF);
				if (is_array($arrLoop)) {
					
					$arr = array();
					$arr = $arrLoop;
				}
			}  
 		} 
  		return $arr;
  	}
	
	
	function files_translation_loop($file_id, $selectF) {
 		global $arrLoop;
		
		$select = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `file_id`='".$file_id."' LIMIT 1"));		
		
		if ($select['file_id']!='' && $select['parent_file_to_translator_id']!=0 ) {
			
			$arrLoop = array();
			$arrLoop = $select;
			$arrLoop['translation_status'] = $selectF['translation_status'];
			$arrLoop['price_discount']     = $selectF['price_discount'];
			$arrLoop['price']              = $selectF['price'];
 
			$selectP = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_to_translator_id`='".$file_id."' LIMIT 1"));		
 			if ($selectP['file_id']) files_translation_loop($selectP['file_id'], $selectF);
 			
  		} elseif ($select['file_id']!='' && $_GET['parent_file_to_translator_id']==0) {
		
			$selectP = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_to_translator_id`='".$file_id."' LIMIT 1"));		
 			if ($selectP['file_id']) files_translation_loop($selectP['file_id'], $selectF);
		}
 	}

?>