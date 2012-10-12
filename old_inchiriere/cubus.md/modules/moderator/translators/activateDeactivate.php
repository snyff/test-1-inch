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


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template; 
$tpl -> Load("reload");
$tpl -> GetObjects();

 	// lucram cu abilitatile traducatorului si editorului 
	if ( me('id') ) {	
		
  		if ($_GET['t']!='' && $_GET['s']!='') {
			
			myQ("UPDATE `[x]translators` SET `translator_active` = ".$_GET['s']." WHERE `id`='".$_GET['t']."' LIMIT 1");			
			_fnc("reload", 0, "?L=moderator.translators.translatorsList&update_t=ok");
			die();
			
		} elseif ($_GET['e']!='' && $_GET['s']!='') {
			
			myQ("UPDATE `[x]translators` SET `editor_active` = ".$_GET['s']." WHERE `id`='".$_GET['e']."' LIMIT 1");			
			_fnc("reload", 0, "?L=moderator.translators.translatorsList&update_t=ok");
			die();
		}
 	} 
 	
$tpl -> CleanZones();
$tpl -> Flush();
	
?>