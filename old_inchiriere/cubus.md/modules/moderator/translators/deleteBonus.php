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
	
	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && $_GET['action']=='deleteBonus' && $_GET['t']!='' ) {	
		
		/* Delete from DB */
		myQ("DELETE FROM `[x]translators_bonus` WHERE `id_tb` = '".$_GET['b']."' LIMIT 1");
		
		_fnc("reload", 0, "?L=moderator.translators.translatorsList&delete_t=ok");
		die();
		
 	} else if ( me('id') && $_GET['action']=='deleteBonus' && $_GET['e']!='' ) {	
		
		/* Delete from DB */
		myQ("DELETE FROM `[x]editors_bonus` WHERE `id_eb` = '".$_GET['b']."' LIMIT 1");
		
		_fnc("reload", 0, "?L=moderator.translators.translatorsList&delete_t=ok");
		die();
 	} 
	
$tpl -> CleanZones();
$tpl -> Flush();
?>