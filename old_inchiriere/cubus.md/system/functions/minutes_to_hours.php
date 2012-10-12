<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  19.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT - dar cred ca functia asta nu e chiar corect */
/* CRED ca functia asta se poate de inlocuit cu altceva mai bun */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function minutes_to_hours($minutes, $value) {
		
		 /* Calculam numarul de ore si minute */
		 $hours = (int)($minutes/60);
		 $minutes = $minutes - $hours*60;
		 
 		     if ( $value == 'hours' )   { return $hours; }
		 elseif ( $value == 'minutes' ) { return (int)$minutes; }
	}

?>