<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  19.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	function bufferProcParse($buffer) {
		global $CONF;
		
		$tpl = new template;
		$tpl -> LoadThis($buffer);
		
		// LOGGED IN / GUESTS ZONES SWAPPING ////////////////////////////////////////////////
		/*
			There are some options we only want to show to the users,
			some others for the guests. The "login/logout" swap
			into the theme is one of those! This will convert the
			zoning.
		*/			
		if (isset($_SESSION["id"])) $tpl->Zone("userStatus", "user");
		else $tpl->Zone("userStatus", "guest");
					
		/*
			... and a swapping admin link!
		*/
		if (me("is_administrator") || me("is_superadministrator")) $tpl->Zone("adminLink", "enabled");
		else $tpl->Zone("adminLink", "disabled");

		// SYSTEM ORIGINS ///////////////////////////////////////////////////////////////////
		/*
			Set the system origin value and attribute it to the template
		*/
		$GLOBALS["SYSTEM_ORIGIN"] = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$tpl -> AssignArray(array("system.origin" => $GLOBALS["SYSTEM_ORIGIN"]));
		
		/*
			Set the "L" call path replacement
		*/
		$tpl -> AssignArray(array("system.l" => $GLOBALS["THIS_PATH"]));

		// CONVERT SELF-USER DATA ///////////////////////////////////////////////////////////
		$tpl->ConvertSelf();

		// HTTPS ROLLBACK ///////////////////////////////////////////////////////////////////
		/*
			Converts HTTPS links back to HTTP when using the HTTPS protocol
		*/
		if ($CONF["HTTPS_ROLLBACK"] && isset($_SERVER['HTTPS']) && !is_null($_SERVER['HTTPS'])) {
			$tpl -> LoadThis(str_replace("https://", "http://", $tpl -> Flush(1)));
		}

		// FLUSH & EOF //////////////////////////////////////////////////////////////////////
		return $tpl -> Flush(1);

	}
	
?>