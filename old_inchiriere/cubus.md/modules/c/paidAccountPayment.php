<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  18.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("reload");
	$tpl -> GetObjects();
	
 	if ( me('id') ) {	
	
 		/* Account payment */
		$selectAP = myF(myQ("SELECT * FROM `[x]account_payment` WHERE `unic_id` = '".$_GET['apUnicID']."' LIMIT 1"));
		myQ("UPDATE `[x]account_payment` SET `account_payment_status`='20', `paid_time`='".time()."' WHERE `unic_id`='".$selectAP['unic_id']."' LIMIT 1");	
		
 		_fnc("reload", 0, "?paidUpdate_AP=ok");
		die();
 	
	} else {
		
		_fnc("reload", 0, "?notonline");
		die();
	}
	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>