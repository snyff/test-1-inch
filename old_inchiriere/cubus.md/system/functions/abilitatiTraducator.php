<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  12.12.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function abilitatiTraducator($abil) {
		
 	     global $tradLimbiAbil, $arrayAllTested, $listaLimbiTraduce;
		 
		 $selectIDFile = $abil;

		 foreach ( $selectIDFile as $key => $val ) { 
		     
			 if ( $selectIDFile[$key]['statut_file'] == 4 ) {
		         
				 $arrayAllTested[] = $key; 	
			 }
		 }
		 
		 /*
		     ACTIVAM CE POATE TRADUCE ACEST TRADUCATOR 		 
			 CA SA POATA VEDEA CE O SA II APARA 
			 DACA NU II PLACE CEVA NE CONTACTEAZA 
		 */
		 $tradLimbiAbil = explode(",",me("account_type"));	
		 
 		 /*
		     ANALIZAM daca acest traducator mai are de facut teste pentru traduceri
		 */
		 //if ( count($tradLimbiAbil) != (count($arrayAllTested) -1) ) $tpl -> Zone("test", "go");

		
		 for ($i=0; $i<count($tradLimbiAbil); $i++) {
		 
		     $dataExplodeLimbi = explode("-", $tradLimbiAbil[$i]);
			 
			      if ( in_array($tradLimbiAbil[$i], $arrayAllTested) && $selectIDFile[$tradLimbiAbil[$i]]['statut_file'] == 4 ) { $icon_statut = "OKShield-32x32.png"; }
			 else if ( in_array($tradLimbiAbil[$i], $arrayAllTested) && $selectIDFile[$tradLimbiAbil[$i]]['statut_file'] == 3 ) { $icon_statut = "Wait-32x32.png"; }
			 else                                                                                                               { $icon_statut = "ErrorCircle-32x32.png"; }
			 
			 $listaLimbiTraduce[$i]["limba.din.image"]    = _fnc("lang_data", $dataExplodeLimbi[0], "language");
			 $listaLimbiTraduce[$i]["limba.in.image"]     = _fnc("lang_data", $dataExplodeLimbi[1], "language");
			 $listaLimbiTraduce[$i]["traduce.din.limba"]  = _fnc("lang_data", $dataExplodeLimbi[0], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			 $listaLimbiTraduce[$i]["traduce.in.limba"]   = _fnc("lang_data", $dataExplodeLimbi[1], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			 $listaLimbiTraduce[$i]["limba.icon.statut"]  = $icon_statut;
		 } 
	}

?>