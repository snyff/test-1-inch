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
		
  		if ($_GET['a']!='' && $_GET['t']!='') {
			
			myQ("UPDATE `[x]translators_translate` SET `test_status`='0', `test_original_file`='', `test_original_name`='' WHERE `id`='".$_GET['a']."' LIMIT 1");			
			_fnc("reload", 0, "?L=moderator.translators.translatorsList&update_t=ok");
			die();			
			
		} elseif ($_GET['a']!='' && $_GET['e']!='') {
			
			myQ("UPDATE `[x]editors_translate` SET `test_status`='0', `test_original_file`='', `test_original_name`='' WHERE `id_et`='".$_GET['a']."' LIMIT 1");			
			_fnc("reload", 0, "?L=moderator.translators.translatorsList&update_t=ok");
			die();			
		} 
 	}  	
 	
$tpl -> CleanZones();
$tpl -> Flush();
	
?>