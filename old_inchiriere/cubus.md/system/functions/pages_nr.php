<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  06.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

// CORECT !!! //

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function pages_nr($characters_nr) {
		
 		 global $CONF;
		 
		 /* Calculam numarul de pagini */
		 $pages_nr = bcdiv($characters_nr, $CONF["NR_CHARACTERS_ON_PAGE_WITHOUT_SPACE"], 3);
		 
 		 return $pages_nr;
	}

?>