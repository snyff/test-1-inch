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
	
	function strtrim($str, $maxlen=100, $elli=NULL, $maxoverflow=15) {
		global $CONF;
		
		if (strlen($str) > $maxlen) {
			
			if ($CONF["BODY_TRIM_METHOD_STRLEN"]) {
				return substr($str, 0, $maxlen);
			}
			
			$output = NULL;
			$body = explode(" ", $str);
			$body_count = count($body);
		
			$i=0;
		
			do {
				$output .= $body[$i]." ";
				$thisLen = strlen($output);
				$cycle = ($thisLen < $maxlen && $i < $body_count-1 && ($thisLen+strlen($body[$i+1])) < $maxlen+$maxoverflow?true:false);
				$i++;
			} while ($cycle);
			return $output.$elli;
		}
		else return $str;
	}
	
?>