<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  06.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////
 
/* CORECT */

/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

	
	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && $_GET['action']=='deleteLink' && $_GET['l']!='' ) {	
		
		/* Delete from DB */
		myQ("DELETE FROM `[x]links` WHERE `link_id` = '".$_GET['l']."' AND `company_id`='".$_GET['c']."' LIMIT 1");
		
		_fnc("reload", 0, "?L=moderator.companies.list&delete_t=ok");
		die();
		
 	} 
?>