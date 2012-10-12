<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Translation, CUBUS - info@cubus.md                 //
// Last modification date:  01.07.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007 - 2008  CUBUS Translation - All rights reserved                          //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	/*
	    SCHIMBAM LIMBA
	*/
	$lang_array = explode(",", $GLOBALS['CONF']["LOCALE_SITE_LANGUAGES"] );
	
 	if ( $_GET['currentlangdata'] != '' && in_array(''.$_GET['currentlangdata'].'', $lang_array ) ) { 
	
	    $_SESSION['currentlang'] = $_GET['currentlangdata'];
		
		if ( me("id") !='' ) {
		    
			myQ("UPDATE `[x]users`
				SET `language` = '".$_GET['currentlangdata']."'
				WHERE `id`='".me("id")."'
				LIMIT 1"
			);
		}
		_fnc("reload", 0, "?L");
		
	} else { _fnc("reload", 0, "?L"); }

	
?>