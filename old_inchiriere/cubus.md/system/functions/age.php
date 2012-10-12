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
	
	function age($date) { /* mm/dd/yyyy */
		if (strstr($date, "/")) {
			$date = explode("/", $date);
			return (date("md",date("U",mktime(0,0,0,$date[0],$date[1],$date[2])))>date("md")?((date("Y")-$date[2])-1):(date("Y")-$date[2]));
		} else {
			return 0;
		}
	}
	
?>