<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  10.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

 	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function discount($id, $value) {
		
 		$select = myF(myQ("SELECT * FROM `[x]company_discount` WHERE `id_company_discount`='".$id."' LIMIT 1"));
		return $select[$value];
	}

?>