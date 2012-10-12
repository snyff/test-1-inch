<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  05.12.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2008  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	// addition 
	
	set_time_limit(0);	
	$file_path = $CONF["files_folder"].urldecode($_GET['path']).'/'.urldecode($_GET['file']);
	$file_extension = _fnc("file_extension", $file_path);

	 _fnc("force_download", $file_path, urldecode($_GET['filename']), $file_extension);
	
?>