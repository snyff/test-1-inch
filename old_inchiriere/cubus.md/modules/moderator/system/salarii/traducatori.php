<?php
///////////////////////////////////////////////////////////////////////////////////////
// PHPizabi 0.848b C1 [ALICIA]                               http://www.phpizabi.net //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         Claude Desjardins, R - feedback@realitymedias.com        //
// Last modification date:  August 13th 2006                                         //
// Version:                 PHPizabi 0.848b C1                                       //
//                                                                                   //
// (C) 2005, 2006 Real!ty Medias / PHPizabi - All rights reserved                    //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");


	$tpl = new template;
	$tpl -> Load("traducatori");
	
 	$tpl -> Zone("contModerator",         "enabled");
	$tpl -> Zone("contacteCubus",         "enabled");
	
	
 	// HANDLE POSTED LANGUAGE ////////////////////////////////////////////
	if (isset($_POST["Submit"], $_POST["bonus_marime"])) {
	
		myQ("
			INSERT INTO `[x]traducatori_bonusuri` 
			(
				`bonus_traducator`,
				`suma_minim`,
				`suma_maxim`
			)
			VALUES
			(
				'".$_POST["bonus_marime"]."',
				'".$_POST['sumaminim']."',
				'".$_POST['sumamaxim']."'
			)
		");
		
		_fnc("reload", 0, "?L=moderator.system.salarii.traducatori&$t=41");
		die();
	}


 	// HANDLE POSTED LANGUAGE ////////////////////////////////////////////
	if (isset($_POST["Submit"], $_POST["traducere_p"])) {
	
		myQ("
			INSERT INTO `[x]traducatori_procente` 
			(
				`procente_traducator`
  			)
			VALUES
			(
				'".$_POST['traducere_p']."'
			)
		");
		
		_fnc("reload", 0, "?L=moderator.system.salarii.traducatori&$t=21");
		die();
	}



	$lista_bonusuri = myQ("
		SELECT *
		FROM `[x]traducatori_bonusuri`
 	");
	
	/*
		Analizam daca au trecut 3 zile de cind sa creat contul 
	*/
	while ($lis_bonusuri = myF($lista_bonusuri)) {
	
		$listabon[] = array(
			"bonusuri.nume"       => $lis_bonusuri['bonus_traducator'],
			"bonusuri.suma.minim" => $lis_bonusuri['suma_minim'],
			"bonusuri.suma.maxim" => $lis_bonusuri['suma_maxim']		
		);
	}

	if (isset($listabon)) {
		
		$tpl -> Loop("listabon", $listabon);
	}
 
 
 
 


	$lista_traduceri = myQ("
		SELECT *
		FROM `[x]traducatori_procente`
 	");
	
	/*
		Analizam daca au trecut 3 zile de cind sa creat contul 
	*/
	while ($lista_traduc = myF($lista_traduceri)) {
	
		$listatrad[] = array(
			"traducere.id" => $lista_traduc['procente_traducator']
 		);
	}

	if (isset($listatrad)) {
		
		$tpl -> Loop("traducere", $listatrad);
	}
 
 
 
 
 
 
 	
	// TEMPLATE REPROCESS & FLUSH ////////////////////////////////////////////////////
	$tpl -> CleanZones();

	/* Get the frame templates, flush the TPL result into it */
	$frame = new template;
	$frame -> Load("!theme/{$GLOBALS["THEME"]}/frame.tpl");
	$frame -> AssignArray(array(
		"jump" => $tpl->Flush(1)
	));
	
	/* Assign Location Value */
	$locationArray = explode(".", $_GET["L"]);
	for ($i=0; $i<count($locationArray); $i++) {
		$locationAppendResult[] = $locationArray[$i];
		if ($i > 0) $location[] = "<a href=\"?L=".implode(".", $locationAppendResult)."\">{$locationArray[$i]}</a>";
	}
	$frame -> AssignArray(array("location" => implode(" &raquo; ", $location)));
	
	/* Set the forced chromeless mode, flush the template */
	$GLOBALS["CHROMELESS_MODE"] = 1;
	
	$tpl -> CleanZones();
	$frame -> Flush();
	
?>