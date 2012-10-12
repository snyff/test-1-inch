<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  13.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

// CORECT !!! // 	

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function translator_editor_data($id, $data) {
		
		/*
			Sometimes the script will blindly query on the ID field
			while it has the answer in the request itself. We don't
			need to query on that, let's return the $id value.
		*/
		if ($data == 'id') return $id;
		
		/*
			If we got the requested data in memory, we will send it 
			to the caller without querying ...
		*/
		if (isset($GLOBALS["DATA_BY_TRADUCATOR_EDITOR"][$id][$data])) return $GLOBALS["DATA_BY_TRADUCATOR_EDITOR"][$id][$data];

		/*
			If we're still alive past that point, it means that
			we don't have anything to pass to the caller, let's
			query the database and find some results
		*/
		$GLOBALS["DATA_BY_TRADUCATOR_EDITOR"][$id] = myF(myQ("SELECT `{$data}` FROM `[x]translators` WHERE `id`='{$id}'"));
		if (isset($GLOBALS["DATA_BY_TRADUCATOR_EDITOR"][$id][$data])) return $GLOBALS["DATA_BY_TRADUCATOR_EDITOR"][$id][$data];

		/*
			Ahem ... well something went wrong! Send ... nothing!
		*/
		return '';
	}
	
?>