<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  12.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template; 
$tpl -> Load("reload");
$tpl -> GetObjects();

 	// lucram cu abilitatile traducatorului si editorului 
	if ( me('id') ) {	
		
  		if ($_GET['t']!='' && $_GET['s']!='' && $_GET['a']!='') {
			
			myQ("UPDATE `[x]translators_translate` SET `test_status` = ".$_GET['s']." WHERE `id`='".$_GET['a']."' LIMIT 1");			
			_fnc("reload", 0, "?L=moderator.translators.translatorPage&t=".$_GET['t']."&update_t=ok");
			die();			

		} elseif ($_GET['e']!='' && $_GET['s']!='' && $_GET['a']!='') {
		
			myQ("UPDATE `[x]editors_translate` SET `test_status` = ".$_GET['s']." WHERE `id_et`='".$_GET['a']."' LIMIT 1");			
			_fnc("reload", 0, "?L=moderator.translators.translatorPage&e=".$_GET['e']."&update_t=ok");
			die();			
 		}
 	}  	
 	
$tpl -> CleanZones();
$tpl -> Flush();
	
?>