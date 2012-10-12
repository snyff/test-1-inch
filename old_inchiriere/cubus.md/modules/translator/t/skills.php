<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  12.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
 	$tpl = new template;
	$tpl -> Load("skills");
	$tpl -> GetObjects(); 
		
  		/**/
 		if (me("id")) {
			 $tpl->Zone("islogin", "login"); 
			 $tpl->Zone("tRightBlock", "back"); 
		}
 		
 		/* Conturi de plata */
		if ( me('id') ) { 
		
			/* scoatem fisierele din DB si le analizam separat in dependenta de statut */
			$select = myQ("SELECT * FROM `[x]translators_translate`
				WHERE `[x]translators_translate`.`translator_id`='".me('id')."' AND
				      `[x]translators_translate`.`translation_active`='0' 
			");		
			$i=0;
			while ($files = myF($select)) {
				
				if ($files['test_status']==0) $status = $GLOBALS["OBJ"]["testing"];
				if ($files['test_status']==1) $status = $GLOBALS["OBJ"]["pending"];
				if ($files['test_status']==2) $status = $GLOBALS["OBJ"]["rejected"]; 
				if ($files['test_status']==3) $status = $GLOBALS["OBJ"]["active"];
				
				/* fisier data */
 				$filesArray[$i]["skills.status"]      = $status;
				$filesArray[$i]["file.translateFrom"] = _fnc("languages", _fnc("translation", $files["translation_id"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.translateTo"]   = _fnc("languages", _fnc("translation", $files["translation_id"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.type"]          = _fnc("file_type", _fnc("translation", $files["translation_id"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				
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