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
	
 	$tpl = new template;
	$tpl -> Load("tests");
	$tpl -> GetObjects(); 
		
  		/**/
 		if (me("id")) {
			 $tpl->Zone("islogin", "login"); 
			 $tpl->Zone("tRightBlock", "back"); 
		}
 		
 		/* Conturi de plata */
		if ( me('id') ) { 
		
			/* scoatem fisierele din DB si le analizam separat in dependenta de statut */
			$select = myQ("SELECT * FROM `[x]translators_translate`, `[x]translator_test_files`
				WHERE `[x]translators_translate`.`translator_id`='".me('id')."' AND `[x]translators_translate`.`test_status`='0' AND
				      `[x]translators_translate`.`translation_active`='0' AND `[x]translators_translate`.`translation_id`=`[x]translator_test_files`.`translation_languages_id`
			");		
			$i=0;
			while ($files = myF($select)) {
				
				/* fisier data */
				$filesArray[$i]["unic_id"]            = $files['id_ttf'];
				$filesArray[$i]["id"]                 = $files['id'];
				$filesArray[$i]["file.translateFrom"] = _fnc("languages", _fnc("translation", $files["translation_id"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.translateTo"]   = _fnc("languages", _fnc("translation", $files["translation_id"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.type"]          = _fnc("file_type", _fnc("translation", $files["translation_id"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.originalName"]  = $files['original_name'];
				$filesArray[$i]["file.originalFile"]  = $files['original_file'];
				
				$i++;
			}
			
 			if ($i>0) $tpl -> Zone("tabber", "active"); else $tpl -> Zone("tabber", "empty");
			if (isset($filesArray)) {
				$tpl -> Zone("testFiles", "enabled");
				$tpl -> Loop("testFilesList", $filesArray);
			} else $tpl -> Zone("testFiles", "empty");
		}
		
		// daca nu etse logat incarcam modulul care scoate alerta pentru logare
		if ( !me("id") ) $tpl -> Zone("islogin", "guest");
		
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>