<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  03.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function ebonus($id, $value='') {
		
		$select = myF(myQ("
			SELECT * 
			FROM `[x]editor_bonus` 
			WHERE `id_bonus`='".$id."'
			LIMIT 1
		"));
		
		if ($value=='') return $select;
		else            return $select[$value];
	}

?>