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

	function timpTraducere($nrCaractere, $valTime) {
		
		 /*
		      Calculam numarul de ore si minute
		 */
		 $nrOre = (int)($nrCaractere/1800*48/60);
		 $nrMinute = $nrCaractere/1800*48 - $nrOre*60;
		 
 		     if ( $valTime == 'ore' )    { return $nrOre; }
		 elseif ( $valTime == 'minute' ) { return (int)$nrMinute; }
	}

?>