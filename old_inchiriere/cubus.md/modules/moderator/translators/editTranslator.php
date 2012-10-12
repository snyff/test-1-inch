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


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("editTranslator");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
		
		$tpl -> AssignArray(array(
			"translator" => _fnc("translator_editor_data", $_GET['id'], "name")
 		));
	}
	
 	
	/* Facem insert in DB */
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"]  ) {
	
 		/* Daca nu poate fi gasit traducatorul se duce la pagina cu trraducatori */
		if ( $_GET['id']=='' ) {
			//_fnc("reload", 0, "?L=moderator.translators.translatorsList");
			//die();
		}
	}


 	
	
	
	/* Afiseaza lista de abilitati pe care le putem adauga unui traducator*/
	if ( me('id') ) {
	
		/* Selectam datele default care ne spun ce trebuie sa apara din start*/
	    if ( $CONF["DEFAULT_FROM_TO_LANGUAGE"]!='' && is_numeric($CONF["DEFAULT_FROM_TO_LANGUAGE"]) ) {
			$selectDefault = myF(myQ("SELECT * FROM `[x]translation_languages` WHERE `id` = '".$CONF["DEFAULT_FROM_TO_LANGUAGE"]."'"));			
 		} else { 
 			_fnc("reload", 0, "?L=moderator.translations.rates&error=noDefaultTranslate");
			die();
		}
		
		 
		
		
		
		/* Creem arborele cu toate limbile existente */
		$selectT = myQ("SELECT * FROM `[x]translation_languages` ORDER BY `id` ASC");
		while ($select = myF($selectT)) $arrayL[$select['from_language']][$select['to_language']][$select['file_type']] = $select['id'];
		
		/* Afisam datele pentru cazul cind este DEFAULT */
		foreach ($arrayL as $key => $val) {
			
			if (1==2) $fromList[$i]["selected"] = ' selected="selected" ';

			$fromList[$i]["id"]   = $key;
 			$fromList[$i]["name"] = _fnc("languages", $key, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			$i++;
		}
		if (isset($fromList)) $tpl -> Loop("loopFromLanguages", $fromList); 
	}
	
	
	
	   
	// Selectam din nou file pentru a le folosi aranja in LISTA 
	if ( 1==1 /*$_GET['from_language']!=''*/ ) {

 		
		foreach ( $arrayL as $key => $val ) {
			
 			$loopFrom[$i]["default"] = 'languages';
 			$loopFrom[$i]["id"]      = $key;
 			$loopFrom[$i]["name"]    = _fnc("languages", $key, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			
			$skills = array(
				"{default}" => 'languages',
				"{id}"      => 'languages'.$key,
				"{name}"    => _fnc("languages", $key, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])
			);
			$tList[$i]["skills"] = strtr($GLOBALS["OBJ"]["addList"], $skills);
			$i++;
			
			foreach ( $val as $keyval => $valval ) {
			
				$skills = array(
					"{default}" => 'languages'.$key,
					"{id}"      => 'filetype'.$key.$keyval,
					"{name}"    => _fnc("languages", $keyval, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])
				);
				$tList[$i]["skills"] = strtr($GLOBALS["OBJ"]["addList"], $skills);
				$i++;
		
				foreach ( $valval as $keyvalval => $valvalval ) {
				
					$skills = array(
						"{default}" => 'filetype'.$key.$keyval,
						"{id}"      => $valvalval,
						"{name}"    => _fnc("file_type", $keyvalval, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])
					);
					$tList[$i]["skills"] = strtr($GLOBALS["OBJ"]["addOption"], $skills);
 					$i++;
				}
 			}
   		}
		
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($tList) ) $tpl -> Loop("loopSkills", $tList); 
	}
	 	


	
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") && !$GLOBALS["CHROMELESS_MODE"]  ) $tpl -> Zone("islogin", "guest");


$tpl -> CleanZones();
$tpl -> Flush();
	
?>