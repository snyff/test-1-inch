<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  17.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

 	// lucram cu abilitatile traducatorului si editorului 
	if ( me('id') && $_GET['action']=='addTranslator' ) {	
		 
		if ($_GET['c']!='' && $_GET['ft']!='' && $_POST['translator']!='0' && $_POST['translator']!='') {
			
 			/* Daca vine legatura cu toate datele indiferent => anulam toate legaturile anterioare */
			$checkLKDif = myF(myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='6' AND `languages_type`='".$_GET['ft']."' LIMIT 1"));
			
			if ( $checkLKDif['link_id']=='' && $_GET['ft']!='') {		
				/* INSERT IN DB */
				
				$sms   = ($_POST['sms']  ==1)?1:0;
				$email = ($_POST['email']==1)?1:0;
				
				myQ("INSERT INTO `[x]links` (`company_id`, `languages_type`, `link_type`, `translator_id`, `sms_alert`, `email_alert`) 
					 VALUES ('".$_GET['c']."', '".$_GET['ft']."', '6', '".$_POST['translator']."', '".$sms."', '".$email."')
				");
				_fnc("reload", 0, "?L=moderator.companies.list");
				die();
				
			} elseif ($checkLKDif['link_id']!='' && $_GET['ft']!='') { 
				
 				echo 'PHP -> Aici apare o eroare care spune ca asa LINK a fost deaj introdus pentrui compania respectiv <br>';
				_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=clExist");
				die();
			}
		} elseif ($_GET['c']!='' && $_GET['ft']!='' && $_POST['translator']=='0' && isset($_POST['translator'])) {
			
			echo 'PHP -> Aici apare o eroare care spune ca asa LINK a fost deaj introdus pentrui compania respectiv <br>';
			_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=noTranslator");
			die();
		}
 			
		
		$edit = myF(myQ("SELECT * FROM `[x]translation_languages` WHERE `id`='".$_GET['ft']."' LIMIT 1"));
	
		$tpl -> Zone("mCompaniesTranslator", "add");
		$tpl -> AssignArray(array(
			"from_language"    => _fnc("languages", $edit['from_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"to_language"      => _fnc("languages", $edit['to_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"file_type.name"   => _fnc("file_type", $edit['file_type'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
 			"id"               => $edit['id']
		));
		
		/* Traducator */
		$i=0;
		$selectTranslator = myQ("
			SELECT * FROM `[x]translators_translate`, `[x]translators`
			WHERE `[x]translators_translate`.`translation_id`='".$_GET['ft']."' AND `[x]translators_translate`.`translation_active`='0' AND
			      `[x]translators_translate`.`translator_id`=`[x]translators`.`id` AND `[x]translators_translate`.`test_status`='2'
		");
		while ($selectT = myF($selectTranslator)) {
			
			$sTranslator[$i]["translator.id"] = $selectT['translator_id'];
			$sTranslator[$i]["translator"]    = $selectT['name'];
			$i++;
		}
		if (isset($sTranslator)) $tpl -> Loop("loopTranslator", $sTranslator); 
		else {
		
			$sTranslator[0]["translator.id"] = 0;
			$sTranslator[0]["translator"]    = '------------------';
			$tpl -> Loop("loopTranslator", $sTranslator); 
		}
		
		
		$tpl -> AssignArray(array("company" => $_GET['c']));
		$tpl -> AssignArray(array("ft"      => $_GET['ft']));
 	} 
 	
?>