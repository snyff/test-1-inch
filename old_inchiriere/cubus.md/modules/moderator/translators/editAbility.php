<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  02.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

 	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && $_GET['action']=='editAbility' ) {	
		
		if ($_GET['t']!='') {
		
			$tpl -> Zone("mTranslatorsList", "teditability");
			
			if ( $_GET['salary']!='' ) {		
				/* update IN DB */
				myQ("UPDATE `[x]translators_translate` SET `translator_salary` = ".$_GET['salary'].", `translation_active`='".$_GET['activ']."' WHERE `id`='".$_GET['a']."' LIMIT 1");			
				
				_fnc("reload", 0, "?L=moderator.translators.translatorPage&t=".$_GET['t']."&update_t=ok");
				die();
			}
			
		} elseif ($_GET['e']!='') {
		
			$tpl -> Zone("mTranslatorsList", "eeditability");
			
			if ( $_GET['salary']!='' ) {		
				/* update IN DB */
				myQ("UPDATE `[x]editors_translate` SET `editor_salary` = ".$_GET['salary'].", `translation_active`='".$_GET['activ']."' WHERE `id_et`='".$_GET['a']."' LIMIT 1");			
				
				_fnc("reload", 0, "?L=moderator.translators.translatorPage&e=".$_GET['e']."&update_t=ok");
				die();
			}
		}
 		
		
   
 		if ($_GET['t']!='') {

			$tData = myF(myQ("SELECT * FROM `[x]translators_translate` WHERE `id`='".$_GET['a']."' LIMIT 1"));
			/* ||| */
			$tpl->AssignArray(array(
				"from_language"    => _fnc("languages", _fnc("translation", $tData['translation_id'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"to_language"      => _fnc("languages", _fnc("translation", $tData['translation_id'], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"file_type"        => _fnc("file_type", _fnc("translation", $tData['translation_id'], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"translator"       => $_GET['t'],
				"a.abil"           => $_GET['a'],
				"selected.activ"   => ($tData['translation_active']==0)?' selected ':'',
				"selected.inactiv" => ($tData['translation_active']==0)?'':' selected ',
			));
			
 		
			/* Salariu */
			$selectSalary = myQ("SELECT * FROM `[x]translator_percent` ORDER BY `translator_percent` ASC");
			$i=0;
			while ($selectS = myF($selectSalary)) {
				
				if ( $selectS['id_translator_percent']==$tData['translator_salary'] ) $sSalary[$i]["selected"] = ' selected="selected" ';			
				else                                                                  $sSalary[$i]["selected"] = '';
				
				$sSalary[$i]["id"]       = $selectS['id_translator_percent'];
				$sSalary[$i]["percent"]  = $selectS['translator_percent'];
				$i++;
			}
			if (isset($sSalary)) $tpl -> Loop("loopSalary", $sSalary); 
 		
		} elseif ($_GET['e']!='') {
		
			$eData = myF(myQ("SELECT * FROM `[x]editors_translate` WHERE `id_et`='".$_GET['a']."' LIMIT 1"));
			/* ||| */
			$tpl->AssignArray(array(
				"from_language"    => _fnc("languages", _fnc("translation", $eData['translation_id'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"to_language"      => _fnc("languages", _fnc("translation", $eData['translation_id'], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"file_type"        => _fnc("file_type", _fnc("translation", $eData['translation_id'], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"editor"           => $_GET['e'],
				"a.abil"           => $_GET['a'],
				"selected.activ"   => ($eData['translation_active']==0)?' selected ':'',
				"selected.inactiv" => ($eData['translation_active']==0)?'':' selected ',
			));
			
 			
			/* Salariu */
			$selectSalary = myQ("SELECT * FROM `[x]editor_percent` ORDER BY `editor_percent` ASC");
			$i=0;
			while ($selectS = myF($selectSalary)) {
				
				if ( $selectS['id_editor_percent']==$eData['editor_salary'] ) $sSalary[$i]["selected"] = ' selected="selected" ';			
				else                                                          $sSalary[$i]["selected"] = '';
				
				$sSalary[$i]["id"]      = $selectS['id_editor_percent'];
				$sSalary[$i]["percent"] = $selectS['editor_percent'];
				$i++;
			}
			if (isset($sSalary)) $tpl -> Loop("loopSalary", $sSalary); 
		}
 	} 
 	
?>