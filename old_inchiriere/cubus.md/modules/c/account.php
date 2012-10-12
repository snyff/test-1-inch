<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  13.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("account");
	$tpl -> GetObjects();


	if (me("id")!='') {	
        _fnc("reload", 0, "?");
		die;
	}	
		

	if (isset($GLOBALS["LOGIN_FAIL_TYPE"])) {
		
		if ($GLOBALS["LOGIN_FAIL_TYPE"]     == "e.user")       $loginError = $GLOBALS["OBJ"]["loginError.username"];
		elseif ($GLOBALS["LOGIN_FAIL_TYPE"] == "e.password")   $loginError = $GLOBALS["OBJ"]["loginError.password"];
		elseif ($GLOBALS["LOGIN_FAIL_TYPE"] == "e.bruteforce") $loginError = $GLOBALS["OBJ"]["loginError.bruteforce"];
		elseif ($GLOBALS["LOGIN_FAIL_TYPE"] == "e.active")     $loginError = $GLOBALS["OBJ"]["loginError.active"];
	}
	
	$tpl -> AssignArray(array(
		"login.failMessage" => (isset($loginError)?$loginError:NULL)
	));
	
	
	/*
		Flush the template
	*/
	$tpl -> CleanZones();
	$tpl -> Flush();
?>