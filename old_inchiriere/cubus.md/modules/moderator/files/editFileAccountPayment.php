<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  19.02.2009                                               //
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
 		
 	if (me('id') && $_GET['unic_id']!='' && $_GET['action']=='editFileAccountPayment') {
				
		$selectFT = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$_GET['unic_id']."' LIMIT 1"));
		
		if ($_POST['translator']!='' && is_numeric($_POST['translator']) ) {
			
			$translation_deadline = strtotime($_POST['deadline']);
			
			myQ("UPDATE `[x]files` 
				 SET 
				 	`translator_id`='".$_POST['translator']."', 
					`translation_deadline`='".$translation_deadline."',
					`salary_translator` = '"._fnc("translator_salary", $selectFT['price'], $_POST['translator'], $selectFT["languages_type"])."'
			     WHERE `unic_id`='".$_GET['unic_id']."' LIMIT 1");	
 			
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&update_t=ok");
			die();

		} elseif (isset($_POST['translator'])) {
		
			echo 'PHP -> Aici apare o eroare care spune ca asa traducator nu poate fi adaugat <br>';
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noTranslator");
			die();
		}
		
		$tpl -> Zone("fileDataRightBlock", "enabled");		
		
		/* Traducator */
		$sTranslator[0]["translator.id"] = 0;
		$sTranslator[0]["translator"]    = '------------------';
		$sTranslator[0]["selected"]      = '';
 		 
		$i=1;
		$selectTranslator = myQ("
			SELECT * FROM `[x]translators_translate`, `[x]translators`
			WHERE `[x]translators_translate`.`translation_id`='".$selectFT['languages_type']."' AND `[x]translators_translate`.`translation_active`='0' AND
			      `[x]translators_translate`.`translator_id`=`[x]translators`.`id` AND `[x]translators_translate`.`test_status`='2'
		");
		while ($selectT = myF($selectTranslator)) {
			
			$sTranslator[$i]["translator.id"] = $selectT['translator_id'];
			$sTranslator[$i]["translator"]    = $selectT['name'];			
			$sTranslator[$i]["selected"]      = ($selectFT['translator_id']!='' && $selectFT['translator_id']==$selectT['translator_id'])?' selected="selected" ':'';
			$i++;
		}
		if (isset($sTranslator)) $tpl -> Loop("loopFTranslator", $sTranslator); 
		
		$tpl -> AssignArray(array(
			"unic_id"  => $_GET['unic_id'],
			"deadline" => ($selectFT['translation_deadline']=='')?date("Y/m/d H:i"):date("Y/m/d H:i", $selectFT['translation_deadline']),
 		));
	} 

?>