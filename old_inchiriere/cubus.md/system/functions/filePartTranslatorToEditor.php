<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  09.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

 
 	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function filePartTranslatorToEditor($parent_file_id) {
		
		myQ("UPDATE `[x]files` SET `status_file`='70' WHERE `file_id`='".$parent_file_id."' LIMIT 1");									
		$status_file = 40;
		
		return $status_file;
   	}

?>
