<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  18.02.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("rates");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}


	/* Activeaza sau dezactiveaza */
	if ( me('id') && isset($_GET['default']) && $_GET['default']!='' && is_numeric($_GET['default']) ) {
	
		_fnc("saveConfig", "DEFAULT_FROM_TO_LANGUAGE", (int)($_GET['default']));			
 		_fnc("reload", 0, "?L=moderator.translations.rates&update_d=ok");
		die();
	}
	
	
	/* Activeaza sau dezactiveaza */
	if ( me('id') && isset($_GET['status']) && $_GET['status']!='' ) {
	
		myQ("UPDATE `[x]translation_languages` SET `status`='".$_GET['status']."' WHERE `id`='".$_GET['id']."' LIMIT 1");					
 		_fnc("reload", 0, "?L=moderator.translations.rates&update_tl=ok");
		die();
	}
	
	
	/* face update dupa EDIT */
	if ( me('id') && $_POST['edit']!='' ) {
	
		if ( is_numeric($_POST['fileTypePrice']) && $_POST['fileTypePrice']!='') { 
			myQ("UPDATE `[x]translation_languages` SET `price`='".$_POST['fileTypePrice']."' WHERE `id`='".$_POST['edit']."' LIMIT 1");					
		}		
		_fnc("reload", 0, "?L=moderator.translations.rates&update_l=ok");
		die();
	}
	
	
	/* INSERT in DB */
	if ( me('id') && is_array($_POST['fileType']) && $_POST['from_language']!=$_POST['to_language'] ) {
		
		foreach ($_POST['fileType'] as $key => $val ) {

			$checkData = myF(myQ("
				SELECT * FROM `[x]translation_languages` 
				WHERE `from_language`='".$_POST['from_language']."' AND `to_language`='".$_POST['to_language']."' AND `file_type`='".$key."'
				LIMIT 1
			"));
			
			if ( $val!='' && $checkData['id']=='' && is_numeric($val) ) {
				myQ("INSERT INTO `[x]translation_languages` (`from_language`, `to_language`, `file_type`, `price` ) 
				      VALUES ('".$_POST['from_language']."', '".$_POST['to_language']."', '".$key."', '".$val."')"); 			
			
				if ( $CONF["DEFAULT_FROM_TO_LANGUAGE"]==0 ) {
					_fnc("saveConfig", "DEFAULT_FROM_TO_LANGUAGE", mysql_insert_id());
				}
				
			} elseif ( $checkData['id']!='' && $val!='' ) {
			
				// aici trebuie sa apara o greseala care zica ca deja sa facut asa insert
				_fnc("reload", 0, "?L=moderator.translations.rates&error=alreadyExist");
				die();
			}
		}			
 		_fnc("reload", 0, "?L=moderator.translations.rates&insert_l=ok");
		die();
 	
	} elseif ($_POST['from_language']==$_POST['to_language'] && $_POST['to_language']!='') {
			
		// aici trebuie sa apara o greseala care zica ca deja sa facut asa insert
		_fnc("reload", 0, "?L=moderator.translations.rates&error=sDifLang");
		die();
 	}
 		
	
	if ( me('id') ) {
 		
	    /* Selectam din nou file pentru a le folosi aranja in LISTA */
		$selectL = myQ("SELECT * FROM `[x]translation_languages` ORDER BY `from_language` ASC, `to_language` ASC");
		
		/* Afisam lista cu documente */
		$i=0;
		while ($select = myF($selectL)) {
 			
 			if ($select['id']==$_GET['edit']) $LList[$i]["bgcolor"] = "#f5f5f5"; 
			else  $LList[$i]["bgcolor"] = "#ffffff"; 
			
 			$defaultData = array("{id}" => $select['id']);
			
			$LList[$i]["id"]             = $select['id'];
			$LList[$i]["status"]         = ($select['status']==0)?1:0;
			$LList[$i]["activ.notactiv"] = ($select['id']==$CONF["DEFAULT_FROM_TO_LANGUAGE"])?$GLOBALS["OBJ"]["defaultActive"]:(($select['status']==1)?$GLOBALS["OBJ"]["statusActive"]:$GLOBALS["OBJ"]["statusDeActive"]);
			$LList[$i]["default"]        = ($select['id']==$CONF["DEFAULT_FROM_TO_LANGUAGE"] || $select['status']==1)?$GLOBALS["OBJ"]["defaultActive"]:strtr($GLOBALS["OBJ"]["defaultNone"], $defaultData);
 			$LList[$i]["from_languages"] = _fnc("languages", $select['from_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			$LList[$i]["to_languages"]   = _fnc("languages", $select['to_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			$LList[$i]["file_type"]      = _fnc("file_type", $select['file_type'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			$LList[$i]["price"]          = $select['price'];
   			$i++;
		}
 			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($LList) ) {
 			$tpl -> Zone("priceList", "enabled");
			$tpl -> Loop("priceList", $LList);
 		}  else $tpl -> Zone("priceList", "empty");
		
		if ($_GET['edit']=='') { 
		
		 	$tpl -> Zone("mTranslationsRates", "newPrice");
		                    
 			/* Facem LOOP la Lista cu LIMBI */
			$tpl -> Loop("selectLanguagesFrom", _fnc("select_languages", $CONF["DEFAULT_FROM_LANGUAGE"]));
			$tpl -> Loop("selectLanguagesTo",   _fnc("select_languages", $CONF["DEFAULT_TO_LANGUAGE"]));
			
			/* Facem LOOP la Lista cu Tipul Fisierului */
			$tpl -> Loop("selectFileType", _fnc("select_file_type", $CONF["DEFAULT_FILE_TYPE"]));

		} else {
			
			$edit = myF(myQ("
				SELECT * FROM `[x]translation_languages` 
				WHERE `id`='".$_GET['edit']."'
				LIMIT 1
			"));
		
			$tpl -> Zone("mTranslationsRates", "editPrice");
			$tpl -> AssignArray(array(
				"from_language"    => _fnc("languages", $edit['from_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"to_language"      => _fnc("languages", $edit['to_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"file_type.name"   => _fnc("file_type", $edit['file_type'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"price"            => $edit['price'],
				"id"               => $edit['id']
			));
		}
 	}
 
 
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") ) $tpl -> Zone("islogin", "guest");

$tpl -> CleanZones();
$tpl -> Flush();
	
?>