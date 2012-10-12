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
	$tpl -> Load("traducator_edit");
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
	
		// abilitati  traducator 
		$selectAbilitati = unpk(_fnc("traducatorEditor", $_GET['id_traducator'], "abilitati"));

		// UPDATE abilitati, procente, bonusuri
		if (isset($_POST['procente'])) {
		
			$countLangTrans = count($_POST['from_lang']);
			
			/*
				STRINGEM TOATE DATELE DESPRE CE POATE TRADUCE ACEST UTILIZATOR 
			*/
			for ( $i=0; $i<=$countLangTrans; $i++ ) {
			
				if ( $_POST['from_lang'][$i] != 0 && is_numeric($_POST['from_lang'][$i]) && $_POST['to_lang'][$i] != 0 && is_numeric($_POST['to_lang'][$i]) && $_POST['from_lang'][$i] != $_POST['to_lang'][$i] ) {
				
				   $abilNEw = $_POST['from_lang'][$i]."-".$_POST['to_lang'][$i]; 
				   
				  
				   if ( $selectAbilitati[$abilNEw]['from_lang'] == '' ) {
				   
						/* se face array cu abilitatile */
						$selectAbilitati[$abilNEw]['statut_file']   = 0;
						$selectAbilitati[$abilNEw]['from_lang']     = $_POST['from_lang'][$i];
						$selectAbilitati[$abilNEw]['to_lang']       = $_POST['to_lang'][$i];
				   } 
				   
				   $add_lang_tr[] = $abilNEw;
				} 
			}
			
			
			//---> controlam si stergem limbile in caz ca nu mai exista in acest array
			if ( count($add_lang_tr)!= count($selectAbilitati) ) {
			
				foreach ($selectAbilitati as $key => $val) {
				
					// cream WHERE pentru select 
					if ( !in_array($key, $add_lang_tr) ) {
					
						// --- > Stergem aceatsa perechi de limbi 
						unset($selectAbilitati[$key]);
					}
				}
			} 
			
			myQ("UPDATE `[x]traducatori` 
				  SET    `procent`='".$_POST['procente']."',
						 `bonusuri`='".((count($_POST['bonusuri'])>0 && $_POST['bonusuri'][0]!='')?pk($_POST['bonusuri']):'')."',
						 `abilitati`='".pk($selectAbilitati)."'
						 
				  WHERE  `id_traducator`='".$_POST['id_traducator']."'
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
	
		// -->
  		foreach ($selectAbilitati as $key => $val) {
 		 
			if ( $selectAbilitati[$key]['from_lang']!='' ) {
				
				/* 
					Se creaza lista cu OPTION 		
				*/
				$listaOption = myQ("
					SELECT *
					FROM `[x]languages` 
				");
				
				$option_list_from = '';
				$option_list_to = '';
				
				while ($o_lista = myF($listaOption)) {
	
					// din
					if ( $o_lista['id'] == $selectAbilitati[$key]['from_lang'] ) {
					
						$option_list_from .= "<option selected value=".$o_lista['id'].">".$o_lista['ro']."</option>\r\n";
	
					} else {
					
						$option_list_from .= "<option value=".$o_lista['id'].">".$o_lista['ro']."</option>\r\n";
					}
	
					// in
					if ( $o_lista['id'] == $selectAbilitati[$key]['to_lang'] ) {
					
						$option_list_to .= "<option selected value=".$o_lista['id'].">".$o_lista['ro']."</option>";
	
					} else {
					
						$option_list_to .= "<option value=".$o_lista['id'].">".$o_lista['ro']."</option>";
					}
				}
		
				
				$lista_abilitati .= "
									<tr>
										<td>
											<select name=\"from_lang[]\" class=\"select_small_css\">
												<option value=\"0\">-</option>
												".$option_list_from."
											</select>
										</td>
										<td>
											<select name=\"to_lang[]\" class=\"select_small_css\">
												<option value=\"0\">-</option>
												".$option_list_to."
											</select>
										</td>
									</tr>";	
			}
		}
			
		
		// Adaugam lista goala de OPTION		
		while ($k < 20 ) {
  			
			/* 
				Se creaza lista cu OPTION 		
			*/
			$listaOption = myQ("
				SELECT *
				FROM `[x]languages` 
			");
			
			$option_list_from = '';
			$option_list_to = '';
			
			while ($o_lista = myF($listaOption)) {
				
				$option_list_from .= "<option value=".$o_lista['id'].">".$o_lista['ro']."</option>\r\n";
	
				// in
				$option_list_to .= "<option value=".$o_lista['id'].">".$o_lista['ro']."</option>\r\n";
			}
	
			
			$lista_abilitati .= "
								<tr>
									<td>
										<select name=\"from_lang[]\" class=\"select_small_css\">
											<option value=\"0\">-</option>
											".$option_list_from."
										</select>
									</td>
									<td>
										<select name=\"to_lang[]\" class=\"select_small_css\">
											<option value=\"0\">-</option>
											".$option_list_to."
										</select>
									</td>
								</tr>";	
 			$k++;
		}
		
		
		// nume prenume generam 
		$numePrenume = explode(".", _fnc("user", $_GET['id_traducator'], 'username'));
		
		$tpl -> AssignArray(array(
		
			"lista.abilitati"    => $lista_abilitati,
			"traducator.nume"    => ucwords($numePrenume[0]),
			"traducator.prenume" => ucwords($numePrenume[1]),
			"traducator.id"      => $_GET['id_traducator']
			
		));
	}


	/* procent traducator*/
	if ( me("id") ) {
	
		$lista_traduceri = myQ("
			SELECT *
			FROM `[x]traducatori_procente`
			ORDER BY `procente_traducator` ASC
		");
		
		/*
			Analizam daca au trecut 3 zile de cind sa creat contul 
		*/
 		
		while ($lista_traduc = myF($lista_traduceri)) {
		
			if ( _fnc("traducatorEditor", $_GET['id_traducator'], "procent") == $lista_traduc['procente_traducator'] ) { $procent_select = " selected "; } 
			else { $procent_select = ""; }
			
			$listatrad[] = array(
				"procent.trad" => $lista_traduc['procente_traducator'],
				"sel.selected" => $procent_select
			);
		}
	
		if (isset($listatrad)) {
			
			$tpl -> Loop("procentTraducator", $listatrad);
		}
		
	} 
		

	


	/* bonusuri traducator*/
	if ( me("id") ) {
	
		$all_bonusuri = unpk(_fnc("traducatorEditor", $_GET['id_traducator'], "bonusuri"));
		
		$lista_bonusuri = myQ("
			SELECT *
			FROM `[x]traducatori_bonusuri`
		");
		
		
		/*
			Analizam daca au trecut 3 zile de cind sa creat contul 
		*/
		while ($lista_bonus = myF($lista_bonusuri)) {
		
			$bonusList = $lista_bonus['bonus_traducator']."|".$lista_bonus['suma_minim']."|".$lista_bonus['suma_maxim'];
			
			if ( in_array($bonusList, $all_bonusuri) ) { $bonus_selected = ' selected '; } 
			else                                       { $bonus_selected = ''; }
			
			$listabonus[] = array(
				"bonusuri.id"      => $lista_bonus['bonus_traducator']."|".$lista_bonus['suma_minim']."|".$lista_bonus['suma_maxim'],
				"bonusuri.procent" => $lista_bonus['bonus_traducator'],
				"bonus.sum.minim"  => $lista_bonus['suma_minim'],
				"bonus.sum.maxim"  => $lista_bonus['suma_maxim'],
				"bonus.selected"   => $bonus_selected
			);
		}
	
		if (isset($listabonus)) {
			
			$tpl -> Loop("bonusuriTraducator", $listabonus);
		}
	} 
		

	


	$tpl -> CleanZones();
	$tpl -> Flush();
?>