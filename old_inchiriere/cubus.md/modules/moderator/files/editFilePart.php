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
 		
 	if (me('id') && $_GET['unic_id']!='' && $_GET['action']=='editFilePart' && $_GET['filePartUnicID']!='') {
 
		$filePart = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `unic_id`='".$_GET['filePartUnicID']."' LIMIT 1"));
 		
		if ( $_POST['translator']>0 && isset($_POST['translator']) ) {
			
  			$characters_nr       = $_POST['characters_nr'];			
			
			if ($characters_nr > 0 && $characters_nr != '' ) {
			
				$file_price          = _fnc("file_price", (int)($characters_nr), $filePart["languages_type"], $filePart['company_id'], ''); 
				$file_price_discount = _fnc("file_price", (int)($characters_nr), $filePart["languages_type"], $filePart['company_id'], 'discount');
				$words_nr            = 0; 
				
				/* CREEM Status File */
					if ($filePart['parent_file_to_translator_id']>0)  $status_file = 10;
				elseif ($filePart['parent_file_to_translator_id']==0) $status_file = 20;
				
 				/* facem Update la DB */
				$u_set = "
					 ,
					 `characters_nr`='".(int)($characters_nr)."',
					 `words_nr`='".(int)($words_nr)."',
					 `status_file`='".$status_file."', 
					 `ft_price`='".$file_price."', 
					 `ft_price_discount`='".$file_price_discount."' 
				";
				
			} elseif ($filePart['ft_price']>0) {
			
				$file_price = $filePart['ft_price']; 
				$u_set = '';

			} else {
			
				$file_price = _fnc("file_price", $filePart['characters_nr'], $filePart["languages_type"], $filePart['company_id'], ''); 
				$u_set = '';
 			}
		
			$translation_deadline = strtotime($_POST['deadline']);
			
			/* Facem update la files in cazul in care fisierul e calculat pret */
 			myQ("UPDATE `[x]files_to_translator` 
				SET  
					 `translator_id`='".$_POST['translator']."',
					 `translation_deadline`='".$translation_deadline."', 
					 `salary_translator`='"._fnc("translator_salary", $file_price, $_POST['translator'], $filePart["languages_type"])."'
 					 ".$u_set."
  				WHERE `unic_id`='".$_GET['filePartUnicID']."'
				LIMIT 1
			");
			
			myQ("UPDATE `[x]files` SET `translator_id`='".$_POST['translator']."' WHERE `unic_id`='".$_GET['unic_id']."' LIMIT 1");
			
			/* Analizam daca sunt fisiere care trebuie de calculat pret sau alte criterii */
			$selectPartFiles = myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='"._fnc("files", '', $_GET['unic_id'], 'file_id')."' AND `status_file`='0'");
			if (myNum($selectPartFiles)==0) myQ("UPDATE `[x]files` SET `translation_status`='1' WHERE `unic_id`='".$_GET['unic_id']."' LIMIT 1");
			
			/* RELOAD PAGE */			
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&update_ftt=ok");
			die;
		 
		} elseif ( isset($_POST['translator']) ) { 
		
			/* RELOAD PAGE */			
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noTranslator");
			die;
		}
		
		
		$tpl -> Zone("editFilePartData", "edit");
 		if ($filePart['translation_type']==1) $tpl -> Zone("editFilePartNrCar", "nrcaracters");
		
		$tpl -> AssignArray(array(
			"partFile.name"        => $filePart['original_name'],
			"partFile.name"        => $filePart['original_name'],
			"fromLanguage.name"    => _fnc("languages", _fnc("translation", $filePart["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"toLanguage.name"      => _fnc("languages", _fnc("translation", $filePart["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"unic_id"              => $_GET['unic_id'],
			"filePartUnicID"       => $_GET['filePartUnicID'],
			"deadline"             => ($filePart['translation_deadline']=='')?date("Y/m/d H:i"):date("Y/m/d H:i", $filePart['translation_deadline']),
  		));

		
 		$i=1;
		$selectTranslator = myQ("
			SELECT * FROM `[x]translators_translate`, `[x]translators`
			WHERE `[x]translators_translate`.`translation_id`='".$filePart['languages_type']."' AND `[x]translators_translate`.`translation_active`='0' AND
			      `[x]translators_translate`.`translator_id`=`[x]translators`.`id` AND `[x]translators_translate`.`test_status`='2'
		");
		while ($selectT = myF($selectTranslator)) {
			
			$sTranslator[$i]["translator.id"] = $selectT['translator_id'];
			$sTranslator[$i]["translator"]    = $selectT['name'];			
			$sTranslator[$i]["selected"]      = ($filePart['translator_id']!='' && $filePart['translator_id']==$selectT['translator_id'])?' selected="selected" ':'';
			$i++;
		}
		if (isset($sTranslator)) $tpl -> Loop("loopFTranslator", $sTranslator); 
		else {
		
			/* Traducator */
			$sTranslator[0]["translator.id"] = 0;
			$sTranslator[0]["translator"]    = '------------------';
			$sTranslator[0]["selected"]      = '';
			
			$tpl -> Loop("loopFTranslator", $sTranslator); 
		}
 	} 
?>