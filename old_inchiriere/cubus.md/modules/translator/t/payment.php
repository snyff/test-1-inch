<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  12.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
 	$tpl = new template;
	$tpl -> Load("reload");
	$tpl -> GetObjects(); 
		
  		/**/
 		
 		/* Conturi de plata */
		if ( me('id') ) { 
		
				if ($_GET['paymentStatus']==0) $paymentStatus = 1;
			elseif ($_GET['paymentStatus']==1) $paymentStatus = 0;
			else {
				 _fnc("reload", 0, "?L=translator.files");
				 die();
			}
			
			myQ("UPDATE `[x]files_to_translator` SET `salary_translator_paid` = '".$paymentStatus."' WHERE `unic_id` = '".$_GET['unic_id']."'");
		
			_fnc("reload", 0, "?L=translator.t.archive");
			die();
		}
		
		// daca nu etse logat incarcam modulul care scoate alerta pentru logare
		if ( !me("id") ) $tpl -> Zone("islogin", "guest");
		
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>