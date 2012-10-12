26<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  26.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("documente");
	$tpl -> GetObjects();
	
		     
	//_fnc("userAcces", $_GET['L']);


	// SELECT files from server => put to browser. 	
	if (me('id')) {	
		
		$tpl -> Zone("cubusSteps",    "enabled");
		$tpl -> Zone("contacteCubus", "enabled");
		$tpl -> Zone("toolsdata",     "enabled");
		$tpl -> Zone("contModerator",     "enabled");

	} 
	else {
	
	    $tpl -> Zone("toolsdata",     "guest");
		_fnc("reload", 2, "?");
	}

	$tpl -> CleanZones();
	$tpl -> Flush();
?>