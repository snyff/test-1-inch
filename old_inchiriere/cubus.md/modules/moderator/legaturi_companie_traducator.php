<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  17.12.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("legaturi_companie_traducator");
	$tpl -> GetObjects();
	
		     
	//_fnc("userAcces", $_GET['L']);


########################################################
    /*
         Activam modulele stabile pentru pagina data
    */
########################################################

	if (me('id')) {	
		
		$tpl -> Zone("cubusSteps",             "enabled");
		$tpl -> Zone("contacteCubus",          "enabled");
		$tpl -> Zone("legaturi",               "enabled");
		$tpl -> Zone("contModerator",          "enabled");
	} 
	else {
	
	    $tpl -> Zone("categoriiDocumente",     "guest");
		_fnc("reload", 2, "?");
	}
	
	
########################################################
    /*
         Selectam legaturile din DB
		 
		 LISTA DE LAGATURI
		   1. Legaturi COMPANIE - CUBUS (presupune ca compania este de 
		      acord cu pretul si nu mai e nevoie de aprobare din partea lor)
		   2. LEGATURA COMPANIE - TRADUCATOR ( noi delegam un traducator 
		      care va face toate traducerile acelei companii pentru anumite limbi)
    */
########################################################

	if ( me('id') ) {	

		$legaturiCompanieCubus = myQ("
			SELECT *
			FROM `[x]leg_companie_traducator`
			ORDER BY `idcompanie`
		");
		
		
		/*
		    Punem pe ecran lista cu LEGATURI 
		*/
		$i=0;
		while ($legaturiCompanie = myF($legaturiCompanieCubus)) {
		
			$numeCompanie =  unpk(_fnc("user", $legaturiCompanie['idcompanie'], 'profile_data'));
		    $numePrenume = explode(".", _fnc("user", $legaturiCompanie['idtraducator'], 'username'));
			
			$legatura[$i]["nume.companie"]         = $numeCompanie['numele'].' '.$numeCompanie['prenumele'];
			$legatura[$i]["nume.traducator"]       = ucwords($numePrenume[0])." ".ucwords($numePrenume[1]); 
			$legatura[$i]["from.lang"]             = _fnc("lang_data", $legaturiCompanie['from_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$legatura[$i]["to.lang"]               = _fnc("lang_data", $legaturiCompanie['to_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$legatura[$i]["login.companie"]        = _fnc("user", $legaturiCompanie['idcompanie'], 'username');
		    $legatura[$i]["id.companie"]           = $legaturiCompanie['id'];
		    $legatura[$i]["tip.legatura"]          = $legaturiCompanie['tip_legatura'];
			
			$i++;
		}
		
		if ( count($legatura) > 0 ) { 
		    
			$tpl -> Zone("listafisieredocs", "enabled"); 
			$tpl -> Loop("listaLegaturi", $legatura);		
		}
		else { 
		    
			$tpl -> Zone("listafisieredocs", "empty");  
		}
	}
	
		
########################################################
    /*
         Procesul de selectare a companiilor, traducatorului limbilor ......
    */
########################################################
	
	if ( me('id') && ( $_GET['from_lang'] == '' || $_GET['from_lang'] == $_GET['to_lang'] )) {	
	
		$tpl -> Zone("listalimbitrad",          "enabled");
		$tpl -> Loop("langSelectFrom", _fnc("lang_select", ""));
		$tpl -> Loop("langSelectTo",   _fnc("lang_select", ""));
	}
	else if ( me('id') && $_GET['from_lang']!= '' && $_GET['to_lang']!= '' &&  $_GET['from_lang'] != $_GET['to_lang'] && $_GET['legaturaTraducator'] == '') {	

		$ListaCompanii = myQ("
			SELECT *
			FROM `[x]users`
			WHERE `is_administrator` = '0'
		");
		
		/*
		    Punem pe ecran lista cu LEGATURI 
		*/
		$i=0;
		while ($ListaCompaniiActive = myF($ListaCompanii)) {
		
			$numeCompanie = unpk($ListaCompaniiActive['profile_data']);
			
			$legatura[$i]["nume.companie"]         = $numeCompanie['numele'].' '.$numeCompanie['prenumele'];
			$legatura[$i]["nume.companie.login"]   = $ListaCompaniiActive['username'];
		    $legatura[$i]["id.companie"]           = $ListaCompaniiActive['id'];
		    $legatura[$i]["tip.legatura"]          = $ListaCompaniiActive['tipul_legaturii'];
			
			$i++;
		}


        /*
           Lista de traducatori
        */
        $fileSelectTrad = myQ("
			           SELECT *
			           FROM `[x]users`
			           WHERE `is_administrator` = '3' 
			           ORDER BY `id` DESC
        ");

        $dataTrad = $_GET['from_lang']."-".$_GET['to_lang']; 
			
        $datatraducator='';
		$i='';
	    while ($fisierListTrad = myF($fileSelectTrad)) {
			
	       $arrayAllTested = array();
			      
   	       //echo $fisierListTrad["username"];
					  
		   //print_r(unpk($fisierListTrad["trad_id_file"]));
					  
		   _fnc("abilitatiTraducator", unpk($fisierListTrad["trad_id_file"]));
					   
   	       //echo $fisierListTrad["username"];
		   //print_r($arrayAllTested);
				 
		   $numePrenume = explode(".", $fisierListTrad["username"]);
				  
           if ( in_array($dataTrad, $arrayAllTested) ) {
				       
		       $datatraducator[$i]['id.traducator'] = $fisierListTrad['id'];
		       $datatraducator[$i]['nume.traducator'] = ucwords($numePrenume[0])." ".ucwords($numePrenume[1]);
		   }
		   
		   $i++;
        }
		
		
		$tpl -> Zone("listalimbitrad", "enabled");
		$tpl -> Loop("langSelectFrom", _fnc("lang_select", $_GET['from_lang']));
		$tpl -> Loop("langSelectTo",   _fnc("lang_select", $_GET['to_lang']));
		
		$tpl -> Loop("listaCompanii", $legatura);
		
		$tpl -> Loop("listaTraducatorii", $datatraducator);
	}
	else if ( me('id') && $_GET['from_lang']!= '' && $_GET['to_lang']!= '' &&  $_GET['from_lang'] != $_GET['to_lang'] && $_GET['legaturaTraducator'] != '') {	
	
	    myQ("
		        INSERT INTO `[x]leg_companie_traducator` 
		        (
			        `idcompanie`,
			        `from_lang`,
			        `to_lang`,
			        `idtraducator`
		        )
		        VALUES
		        (
			        '".$_GET["legaturaCompanie"]."',
			        '".$_GET["from_lang"]."',
			        '".$_GET["to_lang"]."',
			        '".$_GET["legaturaTraducator"]."'
		        )
	    ");
			
	    setcookie("tabber", 1);
			
		_fnc("reload", 0, "?L=moderator.legaturi_companie_traducator&a=5#middle");	
	}	


########################################################
    /*
         Procesul de STERGERE a unei companii/legaturi ......
    */
########################################################
	
	if (me("id") != "" && $_GET['rm'] != '' ) {

	     myQ("
		     DELETE 
		     FROM `[x]leg_companie_traducator` 
		     WHERE `id` = '".$_GET['rm']."'
	     ");
	
	    setcookie("tabber", 1);
			
		_fnc("reload", 0, "?L=moderator.legaturi_companie_traducator&a=2#middle");	
	}	
	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>
