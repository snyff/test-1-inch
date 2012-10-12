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

	function moneyFormat($int) {	
		if (!$CONF["LOCALE_MONETARY_RETURNFLAT"]) {
			setlocale(LC_MONETARY, ($CONF["LOCALE_MONETARY_USEISO:639"]?$CONF["LOCALE_MONETARY_ISO639"]:$CONF["LOCALE_MONETARY_ISO3166"]));
			return money_format($CONF["LOCALE_MONETARY_STRINGFORMAT"], $int);
		} else {
			return $int;
		}
	}
	
?>