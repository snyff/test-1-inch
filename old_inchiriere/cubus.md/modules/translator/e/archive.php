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
 		
 		/* Conturi de plata */
		if ( me('id') ) { 
		
			/* scoatem fisierele din DB si le analizam separat in dependenta de statut */
			$select = myQ("SELECT * FROM `[x]files_to_translator` 
			               WHERE `status_file`>='40' AND `editor_id`='".me('id')."' 
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
				$filesArray[$i]["file.data"]          = date("d-m-Y", $files['edit_deadline']);
 				$filesArray[$i]["file.e.price"]       = $files['salary_editor'];

				
 				$eSalaryArray = array(
					"{file.paymentStatus}" => $files['salary_editor_paid'],
					"{file.unic_id}"       => $files['unic_id']
				);
					if ($_SESSION['swap_id']!='' && $files['salary_editor_paid']==0) $filesArray[$i]["file.e.paySalary"] = strtr($GLOBALS["OBJ"]["eSalaryPay"], $eSalaryArray); 
				elseif ($_SESSION['swap_id']!='' && $files['salary_editor_paid']==1) $filesArray[$i]["file.e.paySalary"] = strtr($GLOBALS["OBJ"]["eSalaryPaid"], $eSalaryArray); 
				else $filesArray[$i]["file.e.paySalary"] = '';
				
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