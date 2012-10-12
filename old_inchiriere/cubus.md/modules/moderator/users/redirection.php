<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  13.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");
/* Administrative restriction */
(!me('is_administrator')&&!me('is_superadministrator')?die("Access restricted"):NULL);


$tpl = new template;
$tpl -> Load("redirection");
$tpl -> GetObjects(); 

	
	// HANDLE THE GHOST REQUEST /////////////////////////////////////////////////////////
	if (isset($_GET["ghost"]) && $_GET["ghost"] != me("id")) {
		
		/*
			Swapping works one level down, means a superadmin can swap to 
			an admin but not to another superadmin - admins can swap to users
			only
		*/
		if (
			(me('is_superadministrator') && !_fnc("user", $_GET["ghost"], "is_superadministrator"))
			||
			(me('is_administrator') && !_fnc("user", $_GET["ghost"], "is_superadministrator") && !_fnc("user", $_GET["ghost"], "is_administrator"))
		) {
		
			$_SESSION["swap_id"] = $_SESSION["id"];
			$_SESSION["id"] = $_GET["ghost"];
			_fnc("reload", 0, "?L=");
		}
	}


$tpl -> CleanZones();
$tpl -> Flush();
	
?>