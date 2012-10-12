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
$tpl -> Load("fileTypes");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}
	
  	
	if ( is_array($_POST['fileType']) ) {
		
		//print_r($_POST); die();
		
		foreach ($_POST['fileType'] as $key => $val ) {
		
			foreach ( $val as $keyval => $valval ) {		
			
				if ($valval!='')  myQ("UPDATE `[x]file_type` SET `".trim($keyval)."`='".$valval."' WHERE `id_file_type`='".$key."' LIMIT 1");					
			}
 		}
		
		
		if ( is_array($_POST['newfileType']) ) {
			
			foreach ($_POST['newfileType'] as $key => $val ) {
				
				$keyArray = array();
				$error=0;
				foreach ( $val as $keyval => $valval ) {		
					$keyArray[]    = "`".$keyval."`";
					$valvalArray[] = "'".$valval."'";
					if ( $valval!='' ) { $error++; } 
 				}
				if ($error>0) myQ("INSERT INTO `[x]file_type` (".implode(",", $keyArray).") VALUES (".implode(",", $valvalArray).")"); 

			}			
			
			_fnc("reload", 0, "?L=moderator.translations.fileTypes&insert_l=ok");
			die();
		} 
		
		_fnc("reload", 0, "?L=moderator.translations.fileTypes&update_l=ok");
		die();
	} 
	

	if ( me('id') ) {
	
	    /* Selectam din nou file pentru a le folosi aranja in LISTA */
		$selectL = myQ("
			SELECT *
			FROM `[x]file_type`
 			ORDER BY `id_file_type` DESC
		");
		
		/* Afisam lista cu documente */
		$i=0;
		$lArray = explode(",", $CONF["LOCALE_SITE_LANGUAGES"]);
		while ($select = myF($selectL)) {
 			
			$fileTypeList = '';
			foreach ( $lArray as $key => $val ) {
			
 				$fileTypeList .= "<tr><td>".$val.":</td><td>&nbsp;&nbsp; &radic; ---- <input type=\"text\" name=\"fileType[".$select['id_file_type']."][".$val."]\" value=\"".$select[$val]."\" /></td></tr>";
			}
 			
			$LList[$i]["id_file_type"]    = $select['id_file_type'];
 			$LList[$i]["value"]           = $select['default_name'];
 			$LList[$i]["file_type_trans"] = $fileTypeList;
  			$i++;
		}
 			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($LList) ) {
 			$tpl -> Loop("fileTypeList", $LList);
 		}  else $tpl -> Zone("fileTypeList", "empty");
		
		
		
		
		/* Afisam lista cu documente */
		$i=0;
		for ($s=0; $s<3; $s++) {
			
  			$fileTypeNewList = '';
			foreach ( $lArray as $key => $val ) {
			
 				$fileTypeNewList .= "<tr><td>".$val.":</td><td>&nbsp;&nbsp; &radic; ---- <input type=\"text\" name=\"newfileType[".$s."][".$val."]\" value=\"".$select[$val]."\" /></td></tr>";
			}
 			
			$LNewList[$i]["id_file_type"]        = $select['id_file_type'];
 			$LNewList[$i]["value"]               = $select['default_name'];
 			$LNewList[$i]["new_file_type_trans"] = $fileTypeNewList;
  			$i++;
		}
 			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($LNewList) ) {
 			$tpl -> Zone("fileTypeList",    "enabled");
			$tpl -> Loop("fileTypeListNewList", $LNewList);
		}   
	}
		
 	
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") ) $tpl -> Zone("islogin", "guest");


$tpl -> CleanZones();
$tpl -> Flush();
	
?>