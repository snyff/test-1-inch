<?php
///////////////////////////////////////////////////////////////////////////////////////
// PHPizabi 0.848b C1 [ALICIA]                               http://www.phpizabi.net //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         Claude Desjardins, R - feedback@realitymedias.com        //
// Last modification date:  August 13th 2006                                         //
// Version:                 PHPizabi 0.848b C1                                       //
//                                                                                   //
// (C) 2005, 2006 Real!ty Medias / PHPizabi - All rights reserved                    //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	function laneMakeToken($type, $dst_user, $array = array()) {

		if (is_file("theme/{$GLOBALS["THEME"]}/templates/GLOBALS/lane/{$type}.tpl")) {
			
			$tpl = new template;
			$tpl -> LoadThis(file_get_contents("theme/{$GLOBALS["THEME"]}/templates/GLOBALS/lane/{$type}.tpl"));
			$laneOptoBuffer = strtr($tpl->Flush(1), $array);
			
			if ($handle = fopen("system/cache/lane/{$dst_user}.".date("U").".tk", "w")) {
				fwrite($handle, $laneOptoBuffer);
				fclose($handle);
			}
		}
	}
	
?>