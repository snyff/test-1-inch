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
	if ( me('id') && $_GET['action']=='addDiscount' ) {	
		
		if ($_GET['c']!='' && $_GET['ft']!='' && $_POST['discount']!='' && $_POST['discount']!='0') {
			
   			/* Daca vine legatura cu toate datele indiferent => anulam toate legaturile anterioare */
			if ( $_GET['ft']==0 ) {			
				
				$linkCK = myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='5' AND `languages_type`<>'0'");
				if (myNum($linkCK)>0) {
				
					myQ("DELETE FROM `[x]links` WHERE `company_id` = '".$_GET['c']."' AND `link_type`='5'");
					myQ("INSERT INTO `[x]links` (`company_id`, `languages_type`, `link_type`, `discount`) 
						 VALUES ('".$_GET['c']."', '".$_GET['ft']."', '5', '".$_POST['discount']."')
					");
 					_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&type=all");
					die();
				}
			}
			
 			
			$checkLK = myF(myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='5' AND `languages_type`='0' LIMIT 1"));
  			if ( $checkLK['link_id']=='' ) {			
			
  				$checkLKDif = myF(myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='5' AND `languages_type`='".$_GET['ft']."' LIMIT 1"));
				if ( $checkLKDif['link_id']=='' && $_GET['ft']!='') {		
					/* INSERT IN DB */
					myQ("INSERT INTO `[x]links` (`company_id`, `languages_type`, `link_type`, `discount`) 
						 VALUES ('".$_GET['c']."', '".$_GET['ft']."', '5', '".$_POST['discount']."')
					");
 					_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink");
					die();
					
				} elseif ($checkLKDif['link_id']!='' && $_GET['ft']!='') { 
 					echo 'PHP -> Aici apare o eroare care spune ca asa LINK a fost deaj introdus pentrui compania respectiv <br>';
 					_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=clExist");
					die();
				}
			} elseif ($checkLK['link_id']!='' && $_GET['ft']!='') { 
				echo 'PHP -> Aici apare o eroare care spune ca asa LINK a fost deaj introdus pentrui compania respectiv <br>';
				_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=clAllExist");
				die();
			}

			
			
			/*
			
			// Daca vine legatura cu toate datele indiferent => anulam toate legaturile anterioare
			$checkLKDif = myF(myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$_GET['c']."' AND `link_type`='5' AND `languages_type`='".$_GET['ft']."' LIMIT 1"));
			
			if ( $checkLKDif['link_id']=='' && $_GET['ft']!='') {		
				// INSERT IN DB 
				myQ("INSERT INTO `[x]links` (`company_id`, `languages_type`, `link_type`, `discount`) 
					 VALUES ('".$_GET['c']."', '".$_GET['ft']."', '5', '".$_POST['discount']."')
				");
				_fnc("reload", 0, "?L=moderator.companies.list");
				die();
				
			} elseif ($checkLKDif['link_id']!='' && $_GET['ft']!='') { 
				
 				echo 'PHP -> Aici apare o eroare care spune ca asa LINK a fost deaj introdus pentrui compania respectiv <br>';
				_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=clExist");
				die();
			}
			*/			
		} elseif ( isset($_POST['discount']) && ($_POST['discount']=='' || $_POST['discount']=='0') ) {
		
			echo 'PHP -> Aici apare o eroare care spune ca asa LINK nu are discount selectat <br>';
			_fnc("reload", 0, "?L=moderator.companies.list&ld=1&c=".$_GET['c']."&action=addLink&error=noDiscount");
			die();
		}
 			
		
		$edit = myF(myQ("SELECT * FROM `[x]translation_languages` WHERE `id`='".$_GET['ft']."' LIMIT 1"));
	
		$tpl -> Zone("mCompaniesDiscount", "add");
		$tpl -> AssignArray(array(
			"from_language"    => ($_GET['ft']==0)?$GLOBALS["OBJ"]["allFiles"]:_fnc("languages", $edit['from_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"to_language"      => ($_GET['ft']==0)?$GLOBALS["OBJ"]["allFiles"]:_fnc("languages", $edit['to_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"file_type.name"   => ($_GET['ft']==0)?$GLOBALS["OBJ"]["allFiles"]:_fnc("file_type", $edit['file_type'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
 			"id"               => $edit['id']
		));
		
		/* Salariu */
		$i=0;
		$selectDiscount = myQ("SELECT * FROM `[x]company_discount` ORDER BY `company_discount` ASC");
		while ($selectD = myF($selectDiscount)) {
			
			$sDiscount[$i]["discount.id"] = $selectD['id_company_discount'];
			$sDiscount[$i]["discount"]    = $selectD['company_discount'];
			$i++;
		}
		if (isset($sDiscount)) $tpl -> Loop("loopDiscount", $sDiscount); 
		else {
		
			$sDiscount[0]["discount.id"] = 0;
			$sDiscount[0]["discount"]    = '-------------';
			$tpl -> Loop("loopDiscount", $sDiscount); 
		}
		
		
		$tpl -> AssignArray(array("company" => $_GET['c']));
		$tpl -> AssignArray(array("ft"      => $_GET['ft']));
 	} 
 	
?>