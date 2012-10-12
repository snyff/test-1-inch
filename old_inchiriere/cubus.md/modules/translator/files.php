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
	$tpl -> Load("files");
	$tpl -> GetObjects(); 
		
  		/* Activam zonele din start */
 		if (me("id")) {
			 // ca este LOGAT 
			 $tpl->Zone("islogin", "login"); 
			 // Activam blocul din dreapta 
			 $tpl->Zone("translatorRightBlock", "enabled"); 
		}
		
		/* Daca este online ... */
		if (me("id")) {
			
			/* analizam cite fisiere sunt la testare pentrru traducator */
			$tcount = myQ("SELECT * 
				FROM `[x]translators_translate`, `[x]translator_test_files`
				WHERE `[x]translators_translate`.`translator_id`='".me('id')."' AND `[x]translators_translate`.`test_status`='0' AND
				      `[x]translators_translate`.`translation_active`='0' AND `[x]translators_translate`.`translation_id`=`[x]translator_test_files`.`translation_languages_id`
			");
			$ttests = myNum($tcount);
			
			/* analizam cite fisiere sunt la testare pentrru editor */			
			$ecount = myQ("SELECT * 
				FROM `[x]editors_translate`, `[x]editor_test_files`
				WHERE `[x]editors_translate`.`editor_id`='".me('id')."' AND `[x]editors_translate`.`test_status`='0' AND
				      `[x]editors_translate`.`translation_active`='0' AND `[x]editors_translate`.`translation_id`=`[x]editor_test_files`.`translation_languages_id`
			");
			$etests = myNum($ecount);
			
			/* Analizam daca sunt active sau nu modulele pentru trafducator si editor */
			$tactive = _fnc("translator_editor_data", me("id"), 'translator_active');
			$eactive = _fnc("translator_editor_data", me("id"), 'editor_active');

			/* Activam zone sau dezactizam in dependenta de ce drepturi au anumiti traducatori */
			if ($tactive==0 && $eactive==0) $tpl->Zone("tabber", "empty");
			else                            $tpl->Zone("tabber", "active");
			
			if ( $tactive==1 )              $tpl->Zone("translator", "files"); 
			if ( $eactive==1 )              $tpl->Zone("editor", "files"); 
			if ( $ttests>0 && $tactive==1 ) $tpl->Zone("tfiles", "tests"); 			
			if ( $etests>0 && $eactive==1 ) $tpl->Zone("efiles", "tests"); 			
			if ( $tactive==1 )              $tpl->Zone("fToTranslate", "new"); 			
			if ( $eactive==1 )              $tpl->Zone("fToEdit", "new");  			
			
			
			
			/* analizam cite fisiere sunt la testare pentrru editor */			
			$selectTranslation = myQ("SELECT * FROM `[x]files_to_translator` WHERE `translator_id`='".me('id')."' AND `status_file`='20'");
			$i=0;
			while ($filesTranslation = myF($selectTranslation)) {
				
				/* fisier data */
				$filesArray[$i]["unic_id"]            = $filesTranslation['unic_id'];
				$filesArray[$i]["id"]                 = $filesTranslation['unic_id'];
				$filesArray[$i]["file.translateFrom"] = _fnc("languages", _fnc("translation", $filesTranslation["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.translateTo"]   = _fnc("languages", _fnc("translation", $filesTranslation["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.type"]          = _fnc("file_type", _fnc("translation", $filesTranslation["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.originalNameH"] = $filesTranslation['original_name'];
				$filesArray[$i]["file.originalName"]  = urlencode($filesTranslation['original_name']);
				$filesArray[$i]["file.originalFile"]  = urlencode($filesTranslation['original_file']);
				$filesArray[$i]["file.path"]          = urlencode($CONF["new_files"]);
				$filesArray[$i]["translator.salary"]  = $filesTranslation['salary_translator'];
				//$filesArray[$i]["file.description"]   = $filesTranslation['description'];
				//$filesArray[$i]["file.characters"]    = $filesTranslation['characters_nr'];
				//$filesArray[$i]["file.pages"]         = _fnc("pages_nr", $filesTranslation['characters_nr']);
 
				$i++;
			}
			
 			if (isset($filesArray)) {
				$tpl -> Zone("translationFiles", "enabled");
				$tpl -> Loop("translationFilesList", $filesArray);
			} else $tpl -> Zone("translationFiles", "empty");
			
 			$countTranslation = myNum($selectTranslation);
 			
			
			
			/* analizam cite fisiere sunt la testare pentrru editor */			
			$selectEdit = myQ("SELECT * FROM `[x]files_to_translator` WHERE `editor_id`='".me('id')."' AND `status_file`='30'");
			$i=0;
			$filesArray = '';
			while ($filesEdit = myF($selectEdit)) {
				
				/* fisier data */
				$filesArray[$i]["unic_id"]            = $filesEdit['unic_id'];
				$filesArray[$i]["id"]                 = $filesEdit['unic_id'];
				$filesArray[$i]["file.translateFrom"] = _fnc("languages", _fnc("translation", $filesEdit["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.translateTo"]   = _fnc("languages", _fnc("translation", $filesEdit["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.type"]          = _fnc("file_type", _fnc("translation", $filesEdit["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesArray[$i]["file.originalNameTranslationH"] = $filesEdit['translation_name'];
				$filesArray[$i]["file.originalNameTranslation"]  = urlencode($filesEdit['translation_name']);
				$filesArray[$i]["file.originalFileTranslation"]  = urlencode($filesEdit['translation_file']);
				$filesArray[$i]["file.pathTranslation"]          = urlencode($CONF["translated_files"]);
 
				$filesArray[$i]["file.originalName"]  = urlencode($filesEdit['original_name']);
				$filesArray[$i]["file.originalFile"]  = urlencode($filesEdit['original_file']);
				$filesArray[$i]["file.path"]          = urlencode($CONF["new_files"]);
 
				$i++;
			}
			
 			if (is_array($filesArray)) {
				
				$tpl -> Zone("editFiles", "enabled");
				$tpl -> Loop("editFilesList", $filesArray);
			} else $tpl -> Zone("editFiles", "empty");
			
 			$countEdit = myNum($selectEdit);
 			
   			
			/* Aratam cite fisiere sunt pentru categoria traducere si editare */
			$tpl -> AssignArray(array(
				"new.ttests"         => $ttests,
				"new.etests"         => $etests,
				"new.for.translate"  => $countTranslation,
				"new.for.edit"       => $countEdit,
			));
		}


 		// daca nu etse logat incarcam modulul care scoate alerta pentru logare
		if ( !me("id") ) $tpl -> Zone("islogin", "guest");
		
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>