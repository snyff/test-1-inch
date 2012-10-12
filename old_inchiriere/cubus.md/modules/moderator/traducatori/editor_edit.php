<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  24.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("editor_edit");
	$tpl -> GetObjects();
	
		     
	//_fnc("userAcces", $_GET['L']);


########################################################
    /*
         Activam modulele stabile pentru pagina data
    */
########################################################

	if (me('id')) {	
		
		$tpl -> Zone("contModerator",         "enabled");
		$tpl -> Zone("cubusSteps",            "enabled");
		$tpl -> Zone("contacteCubus",         "enabled");
		$tpl -> Zone("traducatorLista",       "test");
	} 
	else {
	
	    $tpl -> Zone("traducatorLista",      "guest");
		_fnc("reload", 2, "?");
	}
	
	

########################################################
	/*
		Facem UPDATE la Traducator 
	*/ 
########################################################
	
	if ( me("id") !='' ) {
	
		// UPDATE abilitati, procente, bonusuri
		if (isset($_POST['procente'])) {
		
			myQ("UPDATE `[x]traducatori` 
				  SET    `editor_procent`='".$_POST['procente']."',
						 `editor_bonusuri`='".((count($_POST['bonusuri'])>0 && $_POST['bonusuri'][0]!='')?pk($_POST['bonusuri']):'')."',
				         `editor_active`='".$_POST['editor_active']."'
						 
				  WHERE  `id_traducator`='".$_POST['id_editor']."'
				  LIMIT  1
			");
		} 
	} 	
	
	
	

########################################################
	/*
		Schimbam procentele pentru acest traducator
	*/ 
########################################################
	if ( me('id') ) {	
	
		// nume prenume generam 
		$numePrenume = explode(".", _fnc("user", $_GET['id_editor'], 'username'));
		
		$tpl -> AssignArray(array(
		
			"editor.nume"        => ucwords($numePrenume[0]),
			"editor.prenume"     => ucwords($numePrenume[1]),
			"editor.id"          => $_GET['id_editor'],
			"checkbox.checked"   => _fnc("traducatorEditor", $_GET['id_editor'], 'editor_active')?' checked ':''
			
		));
	}


	/* procent traducator*/
	if ( me("id") ) {
	
		$lista_editori = myQ("
			SELECT *
			FROM `[x]editori_procente`
			ORDER BY `procente_editori` ASC
		");
		
		/*
			Analizam daca au trecut 3 zile de cind sa creat contul 
		*/
 		
		while ($lista_editor = myF($lista_editori)) {
		
			if ( _fnc("traducatorEditor", $_GET['id_editor'], "editor_procent") == $lista_editor['procente_editori'] ) { $procent_select = " selected "; } 
			else { $procent_select = ""; }
			
			$listaeditor[] = array(
				"procent.trad" => $lista_editor['procente_editori'],
				"sel.selected" => $procent_select
			);
		}
	
		if (isset($listaeditor)) {
			
			$tpl -> Loop("procentEditor", $listaeditor);
		}
		
	} 
		

	


	/* bonusuri traducator*/
	if ( me("id") ) {
	
		$all_bonusuri = unpk(_fnc("traducatorEditor", $_GET['id_editor'], "editor_bonusuri"));
		
		$lista_bonusuri = myQ("
			SELECT *
			FROM `[x]editori_bonusuri`
		");
		
		
		/*
			Analizam daca au trecut 3 zile de cind sa creat contul 
		*/
		while ($lista_bonus = myF($lista_bonusuri)) {
		
			$bonusList = $lista_bonus['bonus_editor']."|".$lista_bonus['suma_minim']."|".$lista_bonus['suma_maxim'];
			
			if ( in_array($bonusList, $all_bonusuri) ) { $bonus_selected = ' selected '; } 
			else                                       { $bonus_selected = ''; }
			
			$listabonus[] = array(
				"bonusuri.id"      => $lista_bonus['bonus_editor']."|".$lista_bonus['suma_minim']."|".$lista_bonus['suma_maxim'],
				"bonusuri.procent" => $lista_bonus['bonus_editor'],
				"bonus.sum.minim"  => $lista_bonus['suma_minim'],
				"bonus.sum.maxim"  => $lista_bonus['suma_maxim'],
				"bonus.selected"   => $bonus_selected
			);
		}
	
		if (isset($listabonus)) {
			
			$tpl -> Loop("bonusuriEditori", $listabonus);
		}
	} 
		

	


	$tpl -> CleanZones();
	$tpl -> Flush();
?>