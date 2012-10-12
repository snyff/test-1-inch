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
	$tpl -> Load("legaturi_companie_cubus");
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
			FROM `[x]leg_companie_cubus`
			ORDER BY `idcompanie`
		");
		
		
		/*
		    Punem pe ecran lista cu LEGATURI 
		*/
		$i=0;
		while ($legaturiCompanie = myF($legaturiCompanieCubus)) {
		
			$numeCompanie =  unpk(_fnc("user", $legaturiCompanie['idcompanie'], 'profile_data'));
			
			$legatura[$i]["nume.companie"]         = $numeCompanie['numele'].' '.$numeCompanie['prenumele'];
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
         Procesul de selectare a companiilor ......
    */
########################################################
	
	if ( me('id') ) {	

		$ListaCompanii = myQ("
			SELECT *
			FROM `[x]users`
			WHERE `is_administrator` = '0'
			ORDER BY `username` ASC
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
		
		$tpl -> Loop("listaCompanii", $legatura);
	}
	


			
########################################################
    /*
         Procesul de INSEERT a unei companii/legaturi ......
    */
########################################################
	
	if (me("id") != "" ) {

		if ( $_POST['legaturaCompanie'] != '' && $_POST['tip_legatura'] != '' ) {
		
		    //dddd
		    myQ("
		        INSERT INTO `[x]leg_companie_cubus` 
		        (
			        `idcompanie`,
			        `tip_legatura`
		        )
		        VALUES
		        (
			        '".$_POST["legaturaCompanie"]."',
			        '".$_POST['tip_legatura']."'
		        )
		    ");
			
		    setcookie("tabber", 1);
			
			_fnc("reload", 0, "?L=moderator.legaturi_companie_cubus&a=1#middle");	
		
		} 
	}	
	

			
########################################################
    /*
         Procesul de INSEERT a unei companii/legaturi ......
    */
########################################################
	
	if (me("id") != "" && $_GET['rm'] != '' ) {

	     myQ("
		     DELETE 
		     FROM `[x]leg_companie_cubus` 
		     WHERE `id` = '".$_GET['rm']."'
	     ");
	
	    setcookie("tabber", 1);
			
		_fnc("reload", 0, "?L=moderator.legaturi_companie_cubus&a=2#middle");	
	}	
	


	$tpl -> CleanZones();
	$tpl -> Flush();
?>
