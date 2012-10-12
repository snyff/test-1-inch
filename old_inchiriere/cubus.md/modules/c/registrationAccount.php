<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  13.01.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
 
	$tpl =  new template;
	$tpl -> Load("registrationAccount");
 
	if (me('id') != "") {
  	 	_fnc("reload", 0, "?");
		die();
	} 
	

	/* Generate the random verification code */
	$replace["vcode"] = rand(1000,2400);
 	$tpl -> AssignArray($replace);
	
	$tpl -> CleanZones();
	$tpl -> Flush();
	
?>