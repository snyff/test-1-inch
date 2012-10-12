<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  13.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

 	// lucram cu abilitatile traducatorului si editorului 
	if ( me('id') && $_GET['action']=='addLink' ) {	
		
 		if ($_GET['link']==5) {
 			_fnc("reload", 0, "?L=moderator.companies.list&ft=".$_GET['file_types']."&c=".$_GET['c']."&action=addDiscount");
			die();
 		} 
		
 		if ($_GET['link']==6 && $_GET['file_types']!=0) {
 			_fnc("reload", 0, "?L=moderator.companies.list&ft=".$_GET['file_types']."&c=".$_GET['c']."&action=addTranslator");
			die();
 		} elseif ($_GET['link']==6 && $_GET['file_types']==0) {
 			_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=NoFileType");
			die();
		}	
		
		if ($_GET['c']!='' && $_GET['file_types']!='') {
			
  			/* Daca vine legatura cu toate datele indiferent => anulam toate legaturile anterioare */
			if ( $_GET['file_types']==0) {			
				$linkCK = myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='".$_GET['link']."' AND `languages_type`<>'0'");
				if (myNum($linkCK)>0) {
					myQ("DELETE FROM `[x]links` WHERE `company_id` = '".$_GET['c']."' AND `link_type`='".$_GET['link']."'");
					myQ("INSERT INTO `[x]links` (`company_id`, `languages_type`, `link_type`) 
						 VALUES ('".$_GET['c']."', '".$_GET['file_types']."', '".$_GET['link']."')
					");
 					_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink");
					die();
				}
			}
 			
			$checkLK = myF(myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='".$_GET['link']."' AND `languages_type`='0' LIMIT 1"));
 			if ( $checkLK['link_id']=='' ) {			
			
  				$checkLKDif = myF(myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='".$_GET['link']."' AND `languages_type`='".$_GET['file_types']."' LIMIT 1"));
				if ( $checkLKDif['link_id']=='' && $_GET['file_types']!='') {		
					/* INSERT IN DB */
					myQ("INSERT INTO `[x]links` (`company_id`, `languages_type`, `link_type`) 
						 VALUES ('".$_GET['c']."', '".$_GET['file_types']."', '".$_GET['link']."')
					");
 					_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink");
					die();
					
				} elseif ($checkLK['link_id']!='' && $_GET['file_types']!='') { 
 					echo 'PHP -> Aici apare o eroare care spune ca asa LINK a fost deaj introdus pentrui compania respectiv <br>';
 					_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=clExist");
					die();
				}
			} elseif ($checkLK['link_id']!='' && $_GET['file_types']!='') { 
 					echo 'PHP -> Aici apare o eroare care spune ca asa LINK a fost deaj introdus pentrui compania respectiv <br>';
 					_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=clAllExist");
					die();
			}
		}
		
	
		$tpl -> AssignArray(array("company" => $_GET['c']));
 
		$tpl -> Zone("abilList", "translation");
		$tpl -> Zone("linkList", "companies");
 		
		$ttList = _fnc("select_type_translation", '', true);
		/* AFISAM Lista cu posibilitatile de traduceri existente */
		if (isset($ttList) ) $tpl -> Loop("loopSkills", $ttList); 
 	} 
 	
?>