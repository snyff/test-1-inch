<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  11.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("editorsTests");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}
 
 	if ( me('id') ) {	
	   
	    /* Selectam din nou file pentru a le folosi aranja in LISTA */
		$selectL = myQ("SELECT * FROM `[x]translation_languages` WHERE `status`='0' ORDER BY `from_language` ASC, `to_language` ASC");
		
		/* Afisam lista cu documente */
		$i=0;
		while ($select = myF($selectL)) {
 			
			$testData = myF(myQ("SELECT * FROM `[x]editor_test_files` WHERE `translation_languages_id`='".$select['id']."' LIMIT 1"));
			
			$add_file  = array("{translation.languages.id}" => $select['id']);
			$file_data = array(
				"{file.name}" => $testData['original_name'],
				"{file.id}"   => $testData['id_etf']
			);
			
			$LList[$i]["file"]           = ($testData['id_etf']=='')?strtr($GLOBALS["OBJ"]["fileNone"], $add_file):strtr($GLOBALS["OBJ"]["fileIs"], $file_data);
  			$LList[$i]["from_languages"] = _fnc("languages", $select['from_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			$LList[$i]["to_languages"]   = _fnc("languages", $select['to_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			$LList[$i]["file_type"]      = _fnc("file_type", $select['file_type'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
   			$i++;
		}
 			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($LList) ) {
 			$tpl -> Zone("testList", "enabled");
			$tpl -> Loop("testList", $LList);
 		}  else $tpl -> Zone("testList", "empty");
 	}
 
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") ) $tpl -> Zone("islogin", "guest");

$tpl -> CleanZones();
$tpl -> Flush();
	
?>