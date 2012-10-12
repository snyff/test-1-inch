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
	
	function str_spot($string, $words, $len) {
		
		$words = preg_replace('/[^0-9A-Za-z ]?/', '', $words);
		$words = strtr($words, array(" " => "|", "it" => "", "the" => ""));

		if (preg_match('/(.{0,'.($len/2).'})('.$words.')(.{0,'.($len/2).'})/i', $string, $matches, PREG_OFFSET_CAPTURE, 1)) {
			return preg_replace('/('.$words.')/i', '<span class="hilight">\\1</span>', $matches[0][0]);
		}
		else return substr($string, 0, $len);
	}
	
?>