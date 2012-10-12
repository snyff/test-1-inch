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
	
	function clearBodyCodes($body) {

		/*
			The following is the replacement array. All the body
			codes are converted into a single space (except the
			\n character which is still converted into a BR)
		*/
		$BCRegExpArrayPattern = array(
			'/(&#33;|!){10,}/',
			'%\\[color (([a-zA-Z0-9#]*))\\]([^\\[]*)\\[/color\\]%',
			'%\\[b\\]([^\\[]*)\\[/b\\]%',
			'%\\[i\\]([^\\[]*)\\[/i\\]%',
			'%\\[u\\]([^\\[]*)\\[/u\\]%',
			'%\\[quote\\]([^\\[]*)\\[/quote\\]%',
			'%\\[s\\]([^\\[]*)\\[/s\\]%',
			'%\\[tt\\]([^\\[]*)\\[/tt\\]%',
			'/\\n/',
		);
		
		$BCRegExpArrayReplace = array(
			'!',
			'\\3 ',
			'\\1 ',
			'\\1 ',
			'\\1 ',
			'\\1 ',
			'\\1 ',
			'\\1 ',
			'<br /> ',
		);
		 
		$body = preg_replace($BCRegExpArrayPattern, $BCRegExpArrayReplace, $body);

		/*
			Break long strings into smaller chunks (prevents
			destroying the interface with a 500 characters
			long "word"
		*/
		foreach(explode(" ", strip_tags($body)) as $key => $line) {
			if (strlen($line) > 50) $body = str_replace($line, wordwrap($line, 25, " ", 1), $body);
		}
		
		/* 
			Return the body to the caller
		*/
		return $body;
	}

?>