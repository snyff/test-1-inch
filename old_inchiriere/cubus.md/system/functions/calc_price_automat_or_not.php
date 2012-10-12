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

	function calc_price_automat_or_not($getData) {
		
		if ( ($type_file == 'doc' || $type_file == 'rtf' || $type_file == 'txt') && $fileSelect['file_name'] != '' ) {
		
		    $autornot = 1;
		}
		else {
		    $autornot = 0;
		}
		
		return $autornot;
	}

?>