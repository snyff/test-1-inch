<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  04.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template; 
	$tpl -> Load("reload");
	$tpl -> GetObjects();

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && $_GET['f']!='' ) {	
		
  		$testData = myF(myQ("SELECT * FROM `[x]translator_test_files` WHERE `id_ttf`='".$_GET['f']."' LIMIT 1"));
		
		/* Delete from DB */
		myQ("DELETE FROM `[x]translator_test_files` WHERE `id_ttf` = '".$testData['id_ttf']."' LIMIT 1");	
		@unlink($CONF["files_folder"].$CONF["translators_tests"].'/'.$testData['original_file']);
			
		_fnc("reload", 0, "?L=moderator.translators.translatorsTests&delete_t=ok");
		die();
 	} 
	
	$tpl -> CleanZones();
	$tpl -> Flush();
	
?>