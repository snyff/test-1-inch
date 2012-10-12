<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  17.03.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

########################################################
    /*****/
########################################################
 		
 	if (me('id') && $_GET['filePartUnicID']!='' && $_GET['action']=='selectEditor' ) {
  
 		$editorFile = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `unic_id`='".$_GET['filePartUnicID']."' LIMIT 1"));
 		
		if ( $_POST['editor']>0 && isset($_POST['editor']) ) {
 			
			$file_price = $editorFile["ft_price_discount"]; 
 			
			$translation_deadline = strtotime($_POST['deadline']);
 			
			/* Facem update la files in cazul in care fisierul e calculat pret */
 			myQ("UPDATE `[x]files_to_translator` 
				SET  
					 `editor_id`='".$_POST['editor']."',
					 `salary_editor`='"._fnc("editor_salary", $file_price, $_POST['editor'], $editorFile["languages_type"])."',
					 `edit_deadline`='".$translation_deadline."'
  				WHERE `unic_id`='".$_GET['filePartUnicID']."'
				LIMIT 1
			");	
 			
 			
			/* RELOAD PAGE */			
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&update_fet=ok");
			die;
		 
		} elseif ( isset($_POST['translator']) ) { 
		
			/* RELOAD PAGE */			
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noEditor");
			die;
		}
		
		
		$tpl -> Zone("selectEditor", "activateEditor");
 		
		$tpl -> AssignArray(array(
 			"editFile.name"        => $editorFile['original_name'],
			"fromLanguage.name"    => _fnc("languages", _fnc("translation", $editorFile["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"toLanguage.name"      => _fnc("languages", _fnc("translation", $editorFile["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"unic_id"              => $_GET['unic_id'],
			"filePartUnicID"       => $_GET['filePartUnicID'],
 			"deadline"             => ($editorFile['edit_deadline']=='')?date("Y/m/d H:i"):date("Y/m/d H:i", $editorFile['edit_deadline']),
  		));
 		
 		$i=1;
		$selectEditor = myQ("
			SELECT * FROM `[x]editors_translate`, `[x]translators`
			WHERE `[x]editors_translate`.`translation_id`='".$editorFile['languages_type']."' AND `[x]editors_translate`.`translation_active`='0' AND
			      `[x]editors_translate`.`editor_id`=`[x]translators`.`id` AND `[x]editors_translate`.`test_status`='2'
		");
		while ($selectE = myF($selectEditor)) {
			
			$sEditor[$i]["editor.id"] = $selectE['editor_id'];
			$sEditor[$i]["editor"]    = $selectE['name'];			
			$sEditor[$i]["selected"]  = ($editorFile['editor_id']!='' && $editorFile['editor_id']==$selectE['editor_id'])?' selected="selected" ':'';
			$i++;
		}
		if (isset($sEditor)) $tpl -> Loop("loopFEditor", $sEditor); 
		else {
		
			/* Traducator */
			$sEditor[0]["editor.id"] = 0;
			$sEditor[0]["editor"]    = '------------------';
			$sEditor[0]["selected"]      = '';
			
			$tpl -> Loop("loopFEditor", $sEditor); 
		}
 	} 
?>