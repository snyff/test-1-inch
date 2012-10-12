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
 		
 	if (me('id') && $_GET['unic_id']!='' && $_GET['action']=='editFile') {
		
		$selectEF = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$_GET['unic_id']."' LIMIT 1"));
		
		if ($_GET['file_types']!='') {
		
			myQ("UPDATE `[x]files` SET `languages_type`='".$_GET['file_types']."' WHERE `unic_id`='".$selectEF['unic_id']."' LIMIT 1");			
			
			if ($selectEF['status_file']==0) _fnc("reload", 0, "?L=moderator.files.filesList"); 
			elseif ($selectEF['status_file']==10) _fnc("reload", 0, "?L=moderator.files.countPriceFile&file_unic_id=".$selectEF['unic_id']."&characters_nr=calculated&chromeless=1");  
 			die;
		}
  		
		$tpl -> AssignArray(array("unic_id" => $selectEF['unic_id']));
		
		$tpl -> Zone("abilList", "translation");
		$tpl -> Zone("mFilesEdit", "edit");
		$ttList = _fnc("select_type_translation", $selectEF['languages_type'], '');
 		if (isset($ttList) ) $tpl -> Loop("loopSkills", $ttList); 
	} 

?>