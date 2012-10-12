<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  16.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("translatorsList");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
 		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}
	
 
########################################################
	/* Afisam lista de traducatori  */ 
########################################################
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
	  
	    /* Selectam din nou file pentru a le folosi aranja in LISTA */
		$selectT = myQ("SELECT * FROM `[x]translators` ORDER BY `id` DESC");
		
		/* Afisam lista cu documente */
		$i=0;
		while ($select = myF($selectT)) {
					
			/* Datele care sunt introduse in HTML */
			$name = _fnc("translator_editor_data", $select['id'], "name");
 			
 			$tList[$i]["id"]            = $select['id'];
 			$tList[$i]["t.id"]          = $select['id'];
			$tList[$i]["name"]          = $name;
			$tList[$i]["tstatus.name"]  = ($select['translator_active']==0)?$GLOBALS["OBJ"]["activate"]:$GLOBALS["OBJ"]["deactivate"];
			$tList[$i]["estatus.name"]  = ($select['editor_active']==0)?$GLOBALS["OBJ"]["activate"]:$GLOBALS["OBJ"]["deactivate"];
			$tList[$i]["t.status"]      = ($select['translator_active']==0)?1:0;
			$tList[$i]["e.status"]      = ($select['editor_active']==0)?1:0;
			$i++;
		}
			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($tList) ) {
			$tpl -> Zone("translatorsList", "enabled");
			$tpl -> Loop("translatorsList", $tList);
		}  else $tpl -> Zone("translatorsList", "empty");
  	}
 
	
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") && !$GLOBALS["CHROMELESS_MODE"] ) $tpl -> Zone("islogin", "guest");


$tpl -> CleanZones();
$tpl -> Flush();
	
?>