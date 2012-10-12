<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  26.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("translatorsSalary");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock",     "enabled");
		$tpl -> Zone("mTranslatorsSalary",      "salary");
		$tpl -> Zone("mTranslatorsSalaryBonus", "bonus");
	}
	
	
	if ( me('id') ) {
	
 		// HANDLE POSTED LANGUAGE ////////////////////////////////////////////
		if (isset($_POST["bonus"]) && is_numeric($_POST["bonus"]) && $_POST["bonus"]>0  && $_POST["bonus"]<100 && is_numeric($_POST["min"]) && is_numeric($_POST["max"]) && $_POST["min"]<$_POST["max"] ) {
		
		    $select = myF(myQ("
				SELECT * FROM `[x]translator_bonus` 
			    WHERE `translator_bonus`='".$_POST["bonus"]."' AND `min_value`='".$_POST["min"]."' AND `max_value`='".$_POST["max"]."' 
			"));
			
			if ($select['id_bonus']=='') {			
			
				myQ("INSERT INTO `[x]translator_bonus` (
						`translator_bonus`,
						`min_value`,
						`max_value`
						
					) VALUES (
						'".$_POST["bonus"]."',
						'".$_POST['min']."',
						'".$_POST['max']."'
					)
				");
				
				_fnc("reload", 0, "?L=moderator.translators.translatorsSalary&insert_b=ok");
				die();

			} else {
			
				/* aici trebuie sa apara o eroare care sa anunte ca deja este in DB */
				
				_fnc("reload", 0, "?L=moderator.translators.translatorsSalary&insert_b=error1");
				die();
			}
	
		} elseif ( isset($_POST["bonus"])  ) {
		
			/* aici trebuie sa apara o eroare care sa anunte de ce nu a merg bine*/
			
			_fnc("reload", 0, "?L=moderator.translators.translatorsSalary&insert_b=error2");
			die();
 		}
	

		
		// Adauga salariu tarducator %  ////////////////////////////////////////////
		if (isset($_POST["percent"]) && is_numeric($_POST["percent"]) && $_POST["percent"]>0  && $_POST["percent"]<100  ) {
 			
		    $select = myF(myQ("SELECT * FROM `[x]translator_percent` WHERE `translator_percent`='".$_POST["percent"]."'"));
			
			if ($select['id_translator_percent']=='') {			
			
 				myQ("INSERT INTO `[x]translator_percent` (`translator_percent`)
					 VALUES                              ('".$_POST['percent']."')
				");
				
				_fnc("reload", 0, "?L=moderator.translators.translatorsSalary&insert_p=ok");
				die();
				
			} else {
			
				/* aici trebuie sa apara o eroare care sa anunte ca deja este in DB */
				
				_fnc("reload", 0, "?L=moderator.translators.translatorsSalary&insert_p=error1");
				die();
			}
 		
		} elseif ( isset($_POST["percent"]) ) {
		
			/* aici trebuie sa apara o eroare care sa anunte de ce nu a merg bine*/
			
			_fnc("reload", 0, "?L=moderator.translators.translatorsSalary&insert_p=error2");
			die();
 		}
	
	
	
	
		/* selctam bonusuri traducatori */
		$selectB = myQ("SELECT * FROM `[x]translator_bonus`");
		
		while ($select = myF($selectB)) {
		
			$bonus[] = array(
				"bonus.name" => $select['translator_bonus'],
				"bonus.min"  => $select['min_value'],
				"bonus.max"  => $select['max_value']		
			);
		}
	
		if (isset($bonus)) {
			$tpl -> Zone("bonus", "enabled");
			$tpl -> Loop("loopBonus", $bonus);
		} else $tpl -> Zone("bonus", "empty");
	 
	
	
	
		/* selctam procent traducatori */
		$selectT = myQ("SELECT * FROM `[x]translator_percent` ORDER BY `translator_percent`");
		
		while ($select = myF($selectT)) $list[] = array("salary" => $select['translator_percent']);
	
		if (isset($list)) {
			$tpl -> Zone("percent", "enabled");
			$tpl -> Loop("loopPercent", $list);
		} else $tpl -> Zone("percent", "empty");
	}
	  
	  
	
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") ) $tpl -> Zone("islogin", "guest");



$tpl -> CleanZones();
$tpl -> Flush();
	
?>