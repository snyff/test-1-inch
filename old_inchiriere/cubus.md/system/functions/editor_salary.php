<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  16.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function editor_salary($file_price, $editor_id, $translation_id)  {
		
		$percent = _fnc("epercent", _fnc("editors_translate", $editor_id, $translation_id, "editor_salary"), 'editor_percent');			
		$c       = $percent/100; 

		if ($c==0) $s = 0; 
		else       $s = bcdiv(($file_price * $c), 1, 2);
		
		return $s;
	}

?>