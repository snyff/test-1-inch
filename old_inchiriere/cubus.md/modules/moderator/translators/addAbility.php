<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  10.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

 	// lucram cu abilitatile traducatorului si editorului 
	if ( me('id') && $_GET['action']=='addAbility' ) {	
		
		$tpl -> Zone("abilList", "translation");
		
 		if ($_GET['t']!='') {
			
			$tpl -> Zone("mTranslatorsList", "taddabil");

 			if (isset($_GET['file_types'])) {
				
				foreach ($_GET['file_types'] as $key => $val ) { 
				
 					$checkTT = myF(myQ("SELECT * FROM `[x]translators_translate` 
						WHERE `translator_id`='".$_GET['t']."' AND `translation_id`='".$val."' 
					"));			
					
					if ( $checkTT['translator_id']=='' && $val!='') {		
						/* INSERT IN DB */
						myQ("INSERT INTO `[x]translators_translate` (`translator_id`, `translation_id`, `translator_salary`) 
							 VALUES ('".$_GET['t']."', '".$val."', '".$_GET['salary']."')
						");
						
					} elseif ($checkTT['translator_id']!='' && $val!='') { 
					
						echo 'PHP -> Aici apare o eroare care spune ca asa salariu a fost deaj introdus pentrui traducatorul respectiv <br>';
						$terror++;
					}
				}
				
				/* Se controleaza daca sunt erori si se face reloar la pagina */
				if ( $terror > 0 ) {
					_fnc("reload", 0, "?L=moderator.translators.translatorPage&t=".$_GET['t']."&ld=2&action=addAbility&error=ttExist");
					die();
				} else {
					_fnc("reload", 0, "?L=moderator.translators.translatorPage&t=".$_GET['t']."&ld=2&action=addAbility");
					die();
				}
			}
			
		} elseif ($_GET['e']!='') {
			
			$tpl -> Zone("mTranslatorsList", "eaddabil");
			
 			if (isset($_GET['file_types'])) {
				
				foreach ($_GET['file_types'] as $key => $val ) { 
				
					$checkTT = myF(myQ("SELECT * FROM `[x]editors_translate` 
						WHERE `editor_id`='".$_GET['e']."' AND `translation_id`='".$val."' 
					"));			
					
					if ( $checkTT['editor_id']=='' && $val!='') {		
						/* INSERT IN DB */
						myQ("INSERT INTO `[x]editors_translate` (`editor_id`, `translation_id`, `editor_salary`) 
							 VALUES ('".$_GET['e']."', '".$val."', '".$_GET['salary']."')
						");
						
 					} elseif ($checkTT['editor_id']!='' && $val!='') { 
					
						echo 'PHP -> Aici apare o eroare care spune ca asa salariu a fost deaj introdus pentrui traducatorul respectiv <br>';
						$eerror++;
					}
				}
			
 				/* Se controleaza daca sunt erori si se face reloar la pagina */
				if ( $eerror > 0 ) {
					_fnc("reload", 0, "?L=moderator.translators.translatorPage&e=".$_GET['e']."&ld=2&action=addAbility");
					die();
				} else {
					_fnc("reload", 0, "?L=moderator.translators.translatorPage&e=".$_GET['e']."&ld=2&action=addAbility&error=etExist");
					die();
				}
			}
		}
		
	
		$tpl -> AssignArray(array("translator" => $_GET['t']));
		$tpl -> AssignArray(array("editor"     => $_GET['e']));

        
		$ttList = _fnc("select_type_translation", '');
		/* AFISAM Lista cu posibilitatile de traduceri existente */
		if (isset($ttList) ) $tpl -> Loop("loopSkills", $ttList); 

 		
		if ($_GET['t']!='') {

			/* Salariu */
			$selectSalary = myQ("SELECT * FROM `[x]translator_percent` ORDER BY `translator_percent` ASC");
			while ($selectS = myF($selectSalary)) {
				
				$sSalary[$i]["id"]      = $selectS['id_translator_percent'];
				$sSalary[$i]["percent"] = $selectS['translator_percent'];
				$i++;
			}
			if (isset($sSalary)) $tpl -> Loop("loopSalary", $sSalary); 
		
		} elseif ($_GET['e']!='') {
		
			/* Salariu */
			$selectSalary = myQ("SELECT * FROM `[x]editor_percent` ORDER BY `editor_percent` ASC");
			while ($selectS = myF($selectSalary)) {
				
				$sSalary[$i]["id"]      = $selectS['id_editor_percent'];
				$sSalary[$i]["percent"] = $selectS['editor_percent'];
				$i++;
			}
			if (isset($sSalary)) $tpl -> Loop("loopSalary", $sSalary); 
		}
 	} 
 	
?>