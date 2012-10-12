<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  09.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
 	$tpl = new template;
	$tpl -> Load("accountsPayment");
	$tpl -> GetObjects(); 
		
 		if (  $_GET['ap']!='') {
		
			$ap = myF(myQ("SELECT * FROM `[x]account_payment` WHERE `unic_id` = '".$_GET['ap']."' LIMIT 1"));
			
			if ( $ap['unic_id']!='' ) {
			
				$filePath = $CONF["files_folder"].$CONF["account_payment"].'/'.$ap['unic_id'].'.pdf';
				
				if ( file_exists($filePath) ) {
		
 					// required for IE, otherwise Content-disposition is ignored
					if(ini_get('zlib.output_compression')) ini_set('zlib.output_compression', 'Off');
					
					// addition 
					$file_extension = _fnc("file_extension", $filePath );
					
					switch( $file_extension ) {
					
						 case "pdf": $ctype="application/pdf"; break;
						 default:    $ctype="application/force-download";
					}
					
					header("Pragma: public"); // required
					header("Expires: 0");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header("Cache-Control: private",false); // required for certain browsers 
					header("Content-Type: $ctype");
					header("Content-Disposition: inline; filename=\"".$CONF["SITE_NAME"]."_".$ap['account_payment_id']."\";" );
					header("Content-Transfer-Encoding: binary");
					header("Content-Length: ".filesize($filePath));
					readfile("$filePath");
					exit();
					
 				} else _fnc("reload", 0, "?"); 

			} else _fnc("reload", 0, "?"); 
			
 		} else _fnc("reload", 0, "?"); 
			
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>