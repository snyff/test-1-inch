<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  23.03.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");
	
	/* Stergem fisierul din DB */
	if ( $_GET['delete'] != '' && isset($_GET['delete']) ) {

		 $filesArray = explode(",", $_GET['delete']);
		 foreach ( $filesArray as $key => $val ) {
		 
			/*
				Posibil ca e gresit trebuie de vazul pina unde se permise sa se stearga FISIERE  
				AICI E GRESEALA --- `status_file` < 50 
			*/
			$select = myF(myQ("SELECT * FROM  `[x]files` WHERE `unic_id` = '".$val."' AND `status_file`<=10 LIMIT 1"));
 		
			if ( $select['file_id'] != '' ) {
			
				myQ("DELETE FROM `[x]files` WHERE `file_id` = '".$select['file_id']."' LIMIT 1");
 				@unlink($CONF["files_folder"].$CONF["new_files"].'/'.$select['original_file']);				  
 			} 
		 } 
		 
		 _fnc("reload", 0, "?delete_f=ok");
		 die;
	
	} elseif ( $_GET['delete'] == '' && isset($_GET['delete']) ) {
	
 		_fnc("reload", 0, "?");
		die;
	}		


?>