<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  24.12.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2008  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

// CORECT !!! //

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
########################################################
    /*
         SELECTAM TOATE FISIERELE DIN db SI LE REPARTIZAM 
		 CA "aprobate" SI "neaprobate"
    */
########################################################

	$select = myF(myQ("SELECT * FROM `[x]files` WHERE `status_file` = '0' ORDER BY `file_id` DESC LIMIT 1 "));
	
	/* tipul fisierului */
	if ( $select["original_file"] != '' ) {
	 
		$type_file = _fnc("file_extension", $CONF["files_folder"].$CONF["new_files"]."/".$select["original_file"]);
	}
	
	$COUNTED_EXTENTIONS = explode(",", $CONF["FILES_COUNTED_EXTENTIONS"]);
	
	/* pun on screen type file or calc price */
	if ( $select['original_file'] == '' )  {
		echo 0; 		
	} elseif ( in_array($type_file, $COUNTED_EXTENTIONS) && $select['original_file'] != '' ) {
		echo trim($select['original_file']);		
	} else {
		echo '1 '.trim($select['original_file']);
	}
	
?>
