<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  11.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
 	if ($_GET['action']=='print') $tpl_html = "archivePrint"; 
	else                          $tpl_html = "archive";
	
	
	$tpl = new template;
	$tpl -> Load($tpl_html);
	$tpl -> GetObjects(); 
		
  		/**/
 		if (me("id")) {
			 $tpl->Zone("islogin", "login"); 
			 $tpl->Zone("tRightBlock", "back"); 
		} 		
 		
		//print_r($_SESSION);		
		
		/* Conturi de plata */
		if ( me('id') ) { 
		
			/* scoatem fisierele din DB si le analizam separat in dependenta de statut */
			$select = myQ("SELECT * FROM `[x]files_to_translator` 
						   WHERE `status_file`>='30' AND `translator_id`='".me('id')."' 
						   ORDER BY `translation_deadline` DESC");		
			$i=0;
			while ($files = myF($select)) {
				
				/* fisier data */
				$filesArray[$i]["unic_id"]            = $files['unic_id'];
				$filesArray[$i]["id"]                 = $files['file_id'];
				$filesArray[$i]["file.translateFrom"] = _fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.translateTo"]   = _fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.type"]          = _fnc("file_type", _fnc("translation", $files["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.originalName"]  = $files['original_name'];
				$filesArray[$i]["file.originalFile"]  = $files['original_file'];
				$filesArray[$i]["file.data"]          = date("d-m-Y", $files['translation_deadline']);
				$filesArray[$i]["file.t.price"]       = $files['salary_translator'];
				
				$filesArray[$i]["file.translationName"] = urlencode($files['translation_name']);
				$filesArray[$i]["file.translationFile"] = urlencode($files['translation_file']);
				$filesArray[$i]["file.translation"]     = urlencode($CONF["translated_files"]);
				
				if ($files['edited_name']!='') {
				
					$editedFile = array(
						"{file.editedName}" => urlencode($files['edited_name']),
						"{file.editedFile}" => urlencode($files['edited_file']),
						"{file.edited}"     => urlencode($CONF["edited_files"])
					);
					$filesArray[$i]["file.downloadEdited"] = strtr($GLOBALS["OBJ"]["downloadEdited"], $editedFile); 

				} else $filesArray[$i]["file.downloadEdited"] = '';
 				
				$tSalaryArray = array(
					"{file.paymentStatus}" => $files['salary_translator_paid'],
					"{file.unic_id}"       => $files['unic_id']
				);
					if ($_SESSION['swap_id']!='' && $files['salary_translator_paid']==0) $filesArray[$i]["file.t.paySalary"] = strtr($GLOBALS["OBJ"]["tSalaryPay"], $tSalaryArray); 
				elseif ($_SESSION['swap_id']!='' && $files['salary_translator_paid']==1) $filesArray[$i]["file.t.paySalary"] = strtr($GLOBALS["OBJ"]["tSalaryPaid"], $tSalaryArray); 
				else $filesArray[$i]["file.t.paySalary"] = '';
				
				$i++;
			}
			
 			if ($i>0) $tpl -> Zone("tabber", "active"); else $tpl -> Zone("tabber", "empty");
			if (isset($filesArray)) {
				$tpl -> Zone("archiveFiles", "enabled");
				$tpl -> Loop("archiveFilesList", $filesArray);
			} else $tpl -> Zone("archiveFiles", "empty");
		}
		
		// daca nu etse logat incarcam modulul care scoate alerta pentru logare
		if ( !me("id") ) $tpl -> Zone("islogin", "guest");
		
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>