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
	$tpl -> Load("lostpass");
	$tpl -> GetObjects();
	
 	
	if (isset($_POST["Submit"]) and !me("id")) {
		
		if ($_POST["email"] != "") 
		
			$userRow = myF(myQ("
				SELECT * 
				FROM `[x]users` 
				WHERE LCASE(`email`) = '".strtolower($_POST["email"])."'
				LIMIT 1
			"));
		
		else $tpl -> Zone("lostPassForm", "error");
		
		if ($userRow["id"] > 0) {
			
			$newPassword = strtolower(dechex(mt_rand(0x000000, 0xffffff) & 0xffffff));
			
			myQ("
				UPDATE `[x]users` 
				SET `password` = '".md5($newPassword)."' 
				WHERE `id` = '{$userRow["id"]}'
			");
			
			
 			$dataToMailArray = array(
				"siteName" => $CONF["SITE_NAME"],
				"siteURL"  => "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']),
				"newpass"  => $newPassword,
				"email"    => $userRow["email"]
			);
			
 			_fnc("sendMail", "lostpass.tpl", $dataToMailArray, $userRow["email"]);
			

			$tpl -> Zone("lostPassForm", "completed");
		
		} else $tpl -> Zone("lostPassForm", "error");
			
	} elseif (me("id")) { _fnc("reload", 0, "?"); die; 
 	} else $tpl -> Zone("lostPassForm", "enabled");
	
	$tpl -> CleanZones();
	$tpl -> Flush();
?>