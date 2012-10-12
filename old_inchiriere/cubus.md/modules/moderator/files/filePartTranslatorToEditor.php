<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  18.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

########################################################
    /*
         CORECTAM DATELE DESPRE FISIER 
		 CALCULAM PRETUL 
     */
########################################################
 		
 	if (me('id') && $_GET['parent_file_id']!='' && $_GET['filePartUnicID']!='') {
		
		/* Trecem fisierul la editor de la traducator automat */
		$status_file = _fnc("filePartTranslatorToEditor", $_GET['parent_file_id']);
		
		/* Save to database */
		myQ("UPDATE `[x]files_to_translator` SET `status_file`='".$status_file."' WHERE `unic_id`='".$_GET['filePartUnicID']."' LIMIT 1");
		
		/*  */
		_fnc("reload", 0, "?L=moderator.files.accountsPayment&data=filePartTranslatorToEditor");
		die;
	} 

?>