<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  27.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("languages");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}
	
	
	if ( is_array($_POST['languages']) ) {
		
		//print_r($_POST); die();
		
		foreach ($_POST['languages'] as $key => $val ) {
		
			foreach ( $val as $keyval => $valval ) {		
			
				if ($valval!='')  myQ("UPDATE `[x]languages` SET `".trim($keyval)."`='".$valval."' WHERE `language_id`='".$key."' LIMIT 1");					
			}
 		}
		
		if ( is_array($_POST['newlanguages']) ) {
			
			foreach ($_POST['newlanguages'] as $key => $val ) {

				$keyArray = array();
				$error=0;
				foreach ( $val as $keyval => $valval ) {		
					$keyArray[]    = "`".$keyval."`";
					$valvalArray[] = "'".$valval."'";
					if ( $valval!='' ) { $error++; } 
 				}
				if ($error>0) myQ("INSERT INTO `[x]languages` (".implode(",", $keyArray).") VALUES (".implode(",", $valvalArray).")"); 
			}			
			
			_fnc("reload", 0, "?L=moderator.translations.languages&insert_l=ok");
			die();
		} 
		
		_fnc("reload", 0, "?L=moderator.translations.languages&update_l=ok");
		die();
	} 
	

	if ( me('id') ) {
	
	    /* Selectam din nou file pentru a le folosi aranja in LISTA */
		$selectL = myQ("
			SELECT *
			FROM `[x]languages`
 			ORDER BY `language_id` DESC
		");
		
		/* Afisam lista cu documente */
		$i=0;
		$lArray = explode(",", $CONF["LOCALE_SITE_LANGUAGES"]);
		while ($select = myF($selectL)) {
 			
			$languagesList = '';
			foreach ( $lArray as $key => $val ) {
			
 				$languagesList .= "<tr><td>".$val.":</td><td>&nbsp;&nbsp; &radic; ---- <input type=\"text\" name=\"languages[".$select['language_id']."][".$val."]\" value=\"".$select[$val]."\" /></td></tr>";
			}
 			
			$LList[$i]["languages_id"]    = $select['language_id'];
 			$LList[$i]["value"]           = $select['default_name'];
 			$LList[$i]["languages_trans"] = $languagesList;
  			$i++;
		}
 			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($LList) ) {
 			$tpl -> Loop("languagesList", $LList);
 		}  else $tpl -> Zone("languagesList", "empty");
		
		
		
		
		/* Afisam lista cu documente */
		$i=0;
		for ($s=0; $s<3; $s++) {
			
  			$languagesNewList = '';
			foreach ( $lArray as $key => $val ) {
			
 				$languagesNewList .= "<tr><td>".$val.":</td><td>&nbsp;&nbsp; &radic; ---- <input type=\"text\" name=\"newlanguages[".$s."][".$val."]\" value=\"\" /></td></tr>";
			}
 			
			$LNewList[$i]["languages_id"]        = $select['language_id'];
 			$LNewList[$i]["value"]               = $select['default_name'];
 			$LNewList[$i]["new_languages_trans"] = $languagesNewList;
  			$i++;
		}
 			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($LNewList) ) {
 			$tpl -> Zone("languagesList",    "enabled");
			$tpl -> Loop("languagesNewList", $LNewList);
		}   
	}
		
 	
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") ) $tpl -> Zone("islogin", "guest");


$tpl -> CleanZones();
$tpl -> Flush();
	
?>