<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  16.03.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

########################################################
    /*****/
########################################################
 		
 	if (me('id') && $_GET['unic_id']!='' && $_GET['filePartUnicID']!='') {
 
		 $filePart = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `unic_id`='".$_GET['filePartUnicID']."' LIMIT 1"));
		
 		 myQ("DELETE FROM `[x]files_to_translator` WHERE `unic_id` = '".$filePart['unic_id']."' LIMIT 1");
		 
		 @unlink($CONF["files_folder"].$CONF["new_files"]."/".$filePart['original_file']);
		
		  
	 	 /* Controlam daca sunt fisiere cu pret necalculat */
		 $selectPartFilesNoCalc = myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='"._fnc("files", '', $_GET['unic_id'], 'file_id')."' AND `status_file`=0");
		 $selectPartFilesCalc   = myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='"._fnc("files", '', $_GET['unic_id'], 'file_id')."' AND `status_file`>0");
		 if (	myNum($selectPartFilesNoCalc)>0 || 
				myNum($selectPartFilesCalc)==0  ||
				$filePart['translation_method']==2
			) myQ("UPDATE `[x]files` SET `translation_status`='0' WHERE `unic_id`='".$_GET['unic_id']."' LIMIT 1");			

		
		 _fnc("reload", 0, "?L=moderator.files.accountsPayment");
		 die;
	
	} elseif ( !me('id') ) {
		
		 _fnc("reload", 0, "?L");
		 die;
	}
?>