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
$tpl -> Load("translatorPage");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
 		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}
	
	// Includem adaugarea de modele 
	include("addAbility.php");
	include("editAbility.php");
	include("addBonus.php");
	
 
########################################################
	/* Afisam lista de traducatori  */ 
########################################################
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
	  
	    if (isset($_GET['id'])) $id = $_GET['id'];
	    if (isset($_GET['t']))  $id = $_GET['t'];
	    if (isset($_GET['e']))  $id = $_GET['e'];
		
		/* Selectam din nou file pentru a le folosi aranja in LISTA */
		$selectT = myQ("SELECT * FROM `[x]translators` WHERE `id`='".$id."'");
		
		/* Afisam lista cu documente */
		$i=0;
		while ($select = myF($selectT)) {
					
			/* Datele care sunt introduse in HTML */
			$name = _fnc("translator_editor_data", $select['id'], "name");
 			
			/* Selectam abilitatile traducatorului */
			$selectAbil = myQ("SELECT * FROM `[x]translators_translate` WHERE `translator_id`='".$select['id']."'");
 			/* Afisam lista cu abilitati */
			$tabil_str  ='';
			$ttests_str = '';
			$y=0;
 			while ($selectA = myF($selectAbil)) {
				$y++;
				
	 			$oFile = myF(myQ("SELECT * FROM `[x]translator_test_files` WHERE `translation_languages_id`='".$selectA['translation_id']."' LIMIT 1"));			
				
				if ($selectA['id']==$_GET['a']) $bgcolor = '#f5f5f5'; else $bgcolor = '#ffffff';				
				if ($selectA['test_status']==3) $bgcolor = '#ECE9D8';
				if ($oFile['id_ttf']=='')       $bgctest = 'yellow';  else $bgctest = '#ffffff';
				if ($selectA['translation_active']==1) $inactive = $GLOBALS["OBJ"]["abilInactive"]; else $inactive = $GLOBALS["OBJ"]["abilActive"];				
				
				$activAD = array(
					"{o.original_file}" => $oFile['original_file'],
					"{o.path}"          => $CONF["translators_tests"],
					"{o.original_name}" => $oFile['original_name'],
					"{t.original_file}" => $selectA['test_original_file'],
					"{t.original_name}" => $selectA['test_original_name'],
					"{t}"               => $select['id'],
					"{a}"               => $selectA['id'],
				);

					if ($selectA['test_status']==0) $activ = strtr($GLOBALS["OBJ"]["tactivNone"], $activAD);  
				elseif ($selectA['test_status']==1) $activ = strtr($GLOBALS["OBJ"]["tactivAD"], $activAD);  
				elseif ($selectA['test_status']==2) $activ = $GLOBALS["OBJ"]["activA"].strtr($GLOBALS["OBJ"]["tcancelAbil"], $activAD); 
				elseif ($selectA['test_status']==3) $activ = $GLOBALS["OBJ"]["activR"].strtr($GLOBALS["OBJ"]["tcancelAbil"], $activAD); 
				
				$tabil_str  .= "<tr bgcolor=\"".$bgcolor."\"><td>&nbsp; ".$y.". <font size=\"1\">( "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $selectA['translation_id'], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font></td><td> &nbsp; - <font size=\"1\">"._fnc("tpercent", $selectA['translator_salary'], 'translator_percent')."% &nbsp; &nbsp; <a href='?L=moderator.translators.translatorPage&t=".$select['id']."&a=".$selectA['id']."&action=editAbility'><img src=".$CONF["img_files"]."/file_edit.png ></a>&nbsp;&nbsp;&nbsp; ".$inactive."</font></td></tr>";
				if ($selectA['translation_active']==0) $ttests_str .= "<tr bgcolor=\"".$bgctest."\"><td>&nbsp; ".$y.". <font size=\"1\">( "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $selectA['translation_id'], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font></td><td> &nbsp; - ".$activ."</td></tr>";
			}	
 			$tabil  = array("{ability}" => $tabil_str);
 			$ttests = array("{tests}"   => $ttests_str);
 			
			
			/* Selectam abilitatile traducatorului */
			$selectAbil = myQ("SELECT * FROM `[x]editors_translate` WHERE `editor_id`='".$select['id']."'");
 			/* Afisam lista cu abilitati */
			$eabil_str ='';
			$y=0;
 			while ($selectA = myF($selectAbil)) {
				$y++;
				
	 			$oFile = myF(myQ("SELECT * FROM `[x]editor_test_files` WHERE `translation_languages_id`='".$selectA['translation_id']."' LIMIT 1"));			
				
				if ($selectA['id_et']==$_GET['a']) $bgcolor = '#f5f5f5'; else $bgcolor = '#ffffff';				
				if ($selectA['test_status']==3) $bgcolor = '#ECE9D8';
				if ($oFile['id_etf']=='')       $bgctest = 'yellow';     else $bgctest = '#ffffff';
				if ($selectA['translation_active']==1) $inactive = $GLOBALS["OBJ"]["abilInactive"]; else $inactive = $GLOBALS["OBJ"]["abilActive"];				
				
 				$activAD = array(
					"{o.original_file}" => $oFile['original_file'],
					"{o.original_name}" => $oFile['original_name'],
					"{e.original_file}" => $selectA['test_original_file'],
					"{e.original_name}" => $selectA['test_original_name'],
					"{e}"               => $select['id'],
					"{a}"               => $selectA['id_et'],
				);

					if ($selectA['test_status']==0) $activ = strtr($GLOBALS["OBJ"]["eactivNone"], $activAD);  
				elseif ($selectA['test_status']==1) $activ = strtr($GLOBALS["OBJ"]["eactivAD"], $activAD);  
				elseif ($selectA['test_status']==2) $activ = $GLOBALS["OBJ"]["activA"].strtr($GLOBALS["OBJ"]["ecancelAbil"], $activAD); 
				elseif ($selectA['test_status']==3) $activ = $GLOBALS["OBJ"]["activR"].strtr($GLOBALS["OBJ"]["ecancelAbil"], $activAD); 

				$eabil_str .= "<tr bgcolor=\"".$bgcolor."\"><td>&nbsp; ".$y.". <font size=\"1\">( "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $selectA['translation_id'], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font></td><td> &nbsp; - <font size=\"1\">"._fnc("epercent", $selectA['editor_salary'], 'editor_percent')."% &nbsp; &nbsp; <a href='?L=moderator.translators.translatorsList&e=".$select['id']."&a=".$selectA['id_et']."&action=editAbility'><img src=".$CONF["img_files"]."/file_edit.png ></a>&nbsp;&nbsp;&nbsp; ".$inactive." </font></td></tr>";
				if ($selectA['translation_active']==0) $etests_str .= "<tr bgcolor=\"".$bgctest."\"><td>&nbsp; ".$y.". <font size=\"1\">( "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $selectA['translation_id'], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $selectA['translation_id'], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font></td><td> &nbsp; - ".$activ."</td></tr>";
			}	
 			$eabil = array("{ability}" => $eabil_str);
 			$etests = array("{tests}"   => $etests_str);

			
			/* Selectam abilitatile traducatorului */
			$selectBonus = myQ("SELECT * FROM `[x]translators_bonus` WHERE `translator_id`='".$select['id']."'");
 			/* Afisam lista cu abilitati */
			$tbonus_str ='';
			$y=0;
 			while ($selectB = myF($selectBonus)) {
				$y++;
				$tbonus_str .= "<tr><td>&nbsp; ".$y.". <font size=\"1\"> "._fnc("tbonus", $selectB['bonus_id'], 'translator_bonus')." % ( min: "._fnc("tbonus", $selectB['bonus_id'], 'min_value')." - max: "._fnc("tbonus", $selectB['bonus_id'], 'max_value').") </td><td> &nbsp;&nbsp; <a href='?L=moderator.translators.deleteBonus&b=".$selectB['id_tb']."&t=".$select['id']."&action=deleteBonus&chromeless=1'><img src=".$CONF["img_files"]."/delete3.png ></a></font></td></tr>";
			}	
 			$tbonus = array("{bonus}" => $tbonus_str);
 			
 			
			/* Selectam abilitatile traducatorului */
			$selectBonus = myQ("SELECT * FROM `[x]editors_bonus` WHERE `editor_id`='".$select['id']."'");
 			/* Afisam lista cu abilitati */
			$ebonus_str ='';
			$y=0;
 			while ($selectB = myF($selectBonus)) {
				$y++;
				$ebonus_str .= "<tr><td>&nbsp; ".$y.". <font size=\"1\"> "._fnc("ebonus", $selectB['bonus_id'], 'editor_bonus')." % ( min: "._fnc("ebonus", $selectB['bonus_id'], 'min_value')." - max: "._fnc("ebonus", $selectB['bonus_id'], 'max_value').") </td><td> &nbsp;&nbsp; <a href='?L=moderator.translators.deleteBonus&b=".$selectB['id_eb']."&e=".$select['id']."&action=deleteBonus&chromeless=1'><img src=".$CONF["img_files"]."/delete3.png ></a></font></td></tr>";
			}	
 			$ebonus = array("{bonus}" => $ebonus_str);
 			
 			$tList[$i]["id"]            = $select['id'];
 			$tList[$i]["t.id"]          = $select['id'];
			$tList[$i]["name"]          = $name;
			$tList[$i]["tabil"]         = ($tabil_str=='')?$GLOBALS["OBJ"]["abilNone"]:strtr($GLOBALS["OBJ"]["abilOk"], $tabil); 
			$tList[$i]["ttests"]        = ($ttests_str=='')?$GLOBALS["OBJ"]["testsNone"]:strtr($GLOBALS["OBJ"]["testsOk"], $ttests); 
			$tList[$i]["eabil"]         = ($eabil_str=='')?$GLOBALS["OBJ"]["abilNone"]:strtr($GLOBALS["OBJ"]["abilOk"], $eabil); 
			$tList[$i]["etests"]        = ($etests_str=='')?$GLOBALS["OBJ"]["testsNone"]:strtr($GLOBALS["OBJ"]["testsOk"], $etests); 
			$tList[$i]["tbonus"]        = ($tbonus_str=='')?$GLOBALS["OBJ"]["bonusNone"]:strtr($GLOBALS["OBJ"]["bonusOk"], $tbonus); 
			$tList[$i]["ebonus"]        = ($ebonus_str=='')?$GLOBALS["OBJ"]["bonusNone"]:strtr($GLOBALS["OBJ"]["bonusOk"], $ebonus); 
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