<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  03.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

 	// lucram cu abilitatile traducatorului si editorului 
	if ( me('id') && $_GET['action']=='addBonus' ) {	
		
  		if ($_GET['t']!='' && $_GET['bonus']!='') {
			
			$bonusNewArray = _fnc("tbonus", $_GET['bonus'], '');	
 			$error = 0;
			$selectAllBonus = myQ("SELECT * FROM `[x]translators_bonus` WHERE `translator_id`='".$_GET['t']."' ");
			while ($selectAllB = myF($selectAllBonus)) {
			
 				$bonusArray = _fnc("tbonus", $selectAllB['bonus_id'], '');	
  				
				if ($bonusNewArray['min_value'] < $bonusArray['min_value']) $startPoint = $bonusNewArray['min_value'];
				else                                                        $startPoint = $bonusArray['min_value'];
 				
  				$min_val     = $bonusArray['min_value'] - $startPoint; 
				$max_val     = $bonusArray['max_value'] - $startPoint; 
				$min_val_new = $bonusNewArray['min_value'] - $startPoint; 
				$max_val_new = $bonusNewArray['max_value'] - $startPoint; 
				

				    if ( $min_val==0 && $max_val<$min_val_new) {}
				elseif ( $min_val_new==0 && $max_val_new<$min_val) {}
				else $error=1;
			}
				
			
			if ($error==0) {
			
				/* INSERT IN DB */
				myQ("INSERT INTO `[x]translators_bonus` ( `translator_id`, `bonus_id` ) 
					 VALUES ( '".$_GET['t']."', '".$_GET['bonus']."' )
				");
				
				_fnc("reload", 0, "?L=moderator.translators.translatorPage&t=".$_GET['t']."&action=addBonus");
				die();
					
			} else {
			
				_fnc("reload", 0, "?L=moderator.translators.translatorPage&t=".$_GET['t']."&action=addBonus&error=tbAlgError");
				die();
			}
			
		} elseif ($_GET['e']!='' && $_GET['bonus']!='') {
			
			$bonusNewArray = _fnc("ebonus", $_GET['bonus'], '');	
 			$error = 0;
			$selectAllBonus = myQ("SELECT * FROM `[x]editors_bonus` WHERE `editor_id`='".$_GET['e']."' ");
			while ($selectAllB = myF($selectAllBonus)) {
			
 				$bonusArray = _fnc("ebonus", $selectAllB['bonus_id'], '');	
  				
				if ($bonusNewArray['min_value'] < $bonusArray['min_value']) $startPoint = $bonusNewArray['min_value'];
				else                                                        $startPoint = $bonusArray['min_value'];
 				
  				$min_val     = $bonusArray['min_value'] - $startPoint; 
				$max_val     = $bonusArray['max_value'] - $startPoint; 
				$min_val_new = $bonusNewArray['min_value'] - $startPoint; 
				$max_val_new = $bonusNewArray['max_value'] - $startPoint; 
				

				    if ( $min_val==0 && $max_val<$min_val_new) {}
				elseif ( $min_val_new==0 && $max_val_new<$min_val) {}
				else $error=1;
			}
				
			
			if ($error==0) {
			
				/* INSERT IN DB */
				myQ("INSERT INTO `[x]editors_bonus` ( `editor_id`, `bonus_id` ) 
					 VALUES ( '".$_GET['e']."', '".$_GET['bonus']."' )
				");
				
				_fnc("reload", 0, "?L=moderator.translators.translatorPage&e=".$_GET['e']."&action=addBonus");
				die();
					
			} else {
			
				_fnc("reload", 0, "?L=moderator.translators.translatorPage&e=".$_GET['e']."&action=addBonus&error=tbAlgError");
				die();
			}
		}
		
		
 		
 		if ($_GET['t']!='') {

			$tpl -> Zone("mTranslatorsList", "taddbonus");
			$tpl -> AssignArray(array("translator" => $_GET['t']));
		
			/* Salariu */
			$selectBonus = myQ("SELECT * FROM `[x]translator_bonus` ORDER BY `id_bonus` ASC");
			while ($selectB = myF($selectBonus)) {
				
				$sBonus[$i]["id"]    = $selectB['id_bonus'];
				$sBonus[$i]["bonus"] = $selectB['translator_bonus']." % ( min: ".$selectB['min_value']." - max: ".$selectB['max_value'].")";
				$i++;
			}
			if (isset($sBonus)) $tpl -> Loop("loopBonus", $sBonus); 
		
		} elseif ($_GET['e']!='') {
		
			$tpl -> Zone("mTranslatorsList", "eaddbonus");
			$tpl -> AssignArray(array("editor" => $_GET['e']));
		
			/* Salariu */
			$selectBonus = myQ("SELECT * FROM `[x]editor_bonus` ORDER BY `id_bonus` ASC");
			while ($selectB = myF($selectBonus)) {
				
				$sBonus[$i]["id"]    = $selectB['id_bonus'];
				$sBonus[$i]["bonus"] = $selectB['editor_bonus']." % ( min: ".$selectB['min_value']." - max: ".$selectB['max_value'].")";
				$i++;
			}
			if (isset($sBonus)) $tpl -> Loop("loopBonus", $sBonus); 
		}
 	} 
 	
?>