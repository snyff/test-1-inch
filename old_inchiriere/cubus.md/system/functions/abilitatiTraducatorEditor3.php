<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Translation, CUBUS - info@cubus.md                 //
// Last modification date:  30.06.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007 - 2008  CUBUS Translation - All rights reserved                          //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function abilitatiTraducatorEditor3($selectAbilitati) {
		
 	     global $dd; 
		 
		 //global $toateAbilitatile, $arrayAbilitatiTestate, $listaBlockAbilitati;
		 		 		
		 /* afisam bloc */
  		 foreach ($selectAbilitati as $key => $val) {
 			 
			 if ( $key != 'lucrezCuTraducerea' ) {
			 
					  if ( $selectAbilitati[$key]['statut_file'] == 4 ) { $icon_statut = "OKShield-32x32.png"; }
				 else if ( $selectAbilitati[$key]['statut_file'] == 3 ) { $icon_statut = "Wait-32x32.png"; }
				 else                                                   { $icon_statut = "ErrorCircle-32x32.png"; }
				 
				 /*  */
				 $from_to_lang_new = explode("-", $key);
				 
				 $listaBlockAbilitati[$i]["limba.din.image"]    = _fnc("lang_data", $from_to_lang_new[0], "language");
				 $listaBlockAbilitati[$i]["limba.in.image"]     = _fnc("lang_data", $from_to_lang_new[1], "language");
				 $listaBlockAbilitati[$i]["traduce.din.limba"]  = _fnc("lang_data", $from_to_lang_new[0], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				 $listaBlockAbilitati[$i]["traduce.in.limba"]   = _fnc("lang_data", $from_to_lang_new[1], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				 $listaBlockAbilitati[$i]["limba.icon.statut"]  = $icon_statut;
			 
				 
				 if ( $selectAbilitati[$key]['statut_file'] == 0 ) {
				
					 $dd ++;
				 }
			 }
			 
			 $i++;
		 }
		 
		 return $listaBlockAbilitati;
	}

?>