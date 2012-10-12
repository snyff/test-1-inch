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
		
		myQ("UPDATE `[x]account_payment` SET `account_payment_status`='30', `confirmation_time`='".time()."' WHERE `unic_id`='".$selectAP['unic_id']."' LIMIT 1");	
		
		if ($selectAP['account_payment_type']==0) {
		
			_fnc("cash_advance", '', $selectAP['unic_id']);
			
			$sfiles = myQ("
				SELECT * FROM `[x]files_to_account_payment`, `[x]files`
				WHERE `[x]files`.`file_id` = `[x]files_to_account_payment`.`file_id` AND
					  `[x]files_to_account_payment`.`account_payment_id` = '".$selectAP['account_payment_id']."' AND
					  `[x]files`.`status_file` < 50
			");
 			while ($files = myF($sfiles)) {
				
				myQ("UPDATE `[x]files` SET `status_file`='50', `time50`='".time()."' WHERE `unic_id`='".$files['unic_id']."' LIMIT 1");	
				
				/* Adaugat File part automat */
				_fnc("addFilePart", $files['file_id']);						 
			}
			
		} elseif ($selectAP['account_payment_type']==1) {
		
			$cash_advance_all = $selectAP['account_payment_price'];
			
 			
			/* daca sunt bani in cont avans se confirma automat conturile de plata */
			$approveAPok = myQ("SELECT * FROM `[x]account_payment` WHERE `company_id` = '".$selectAP['company_id']."' AND `payment_type`= '1' AND 
					  `account_payment_status` < '30' ORDER BY `account_payment_id` ASC
			");
					  
 			while ($approveAPO = myF($approveAPok)) {
				
				if ($cash_advance_all >= $approveAPO['account_payment_price']) myQ("UPDATE `[x]account_payment` SET `account_payment_status`='30', `confirmation_time`='".time()."' WHERE `unic_id`='".$approveAPO['unic_id']."' LIMIT 1");	
				$cash_advance_all = $cash_advance_all - $approveAPO['account_payment_price'];
			}
			
			_fnc("cash_advance", '', $selectAP['unic_id']);			
		}
		
		if ($_GET['account']=='c') _fnc("reload", 0, "?confirmUpdate_AP=ok");
		else 					   _fnc("reload", 0, "?L=moderator.files.accountsPayment&confirmUpdate_AP=ok");
		die();
 	
	} else {
		
		_fnc("reload", 0, "?notonline");
		die();
	}
	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>