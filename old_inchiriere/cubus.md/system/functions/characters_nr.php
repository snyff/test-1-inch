<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  22.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function characters_nr($pages_nr) {
		
		 global $CONF;
		 
		 /* Calculam numarul de caractere */
		 $characters_nr = $pages_nr * $CONF["NR_CHARACTERS_ON_PAGE_WITHOUT_SPACE"];
		 
 		 return $characters_nr;
	}

?>