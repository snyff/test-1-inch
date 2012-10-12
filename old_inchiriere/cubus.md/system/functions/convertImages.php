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
	
	function convertImages($body) {
		return preg_replace(
			'%\\[image (([a-zA-Z0-9\\.:_\\/]*))\\]%im', 
			"<div style=\"clear:both;\">"
			."<a href=\"\\1\" target=\"_blank\">"
			."<img src=\"system/imagestream.php?location=\\1\" id=\"bodyCodeImage\">"
			."</a></div>", 
		$body);
	}
	
?>