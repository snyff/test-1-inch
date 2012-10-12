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

/* CORECT */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function cash_advance($file_unic_id, $ap_unic_id='', $action='') {
					
		/* Daca UnIC ID de la fisier exista => scoatem scoatem datele despte contul de plata */
		if ($file_unic_id!='') {
			$select         = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$file_unic_id."' LIMIT 1"));
			$selectFileToAp = myF(myQ("SELECT * FROM `[x]files_to_account_payment` WHERE `file_id`='".$select['file_id']."' LIMIT 1"));
			
			$account_payment_unic_id = $selectFileToAp['unic_id'];
		
		} else $account_payment_unic_id = $ap_unic_id;
		
		
		$selectAp = myF(myQ("SELECT * FROM `[x]account_payment` WHERE `unic_id`='".$account_payment_unic_id."' LIMIT 1"));
		
		if ($selectAp['company_id']!='') {
		
			if ($selectAp['account_payment_cash_advance']>0) {
				
				if ($action=='') $addCash = 0; 
				else             $addCash = $selectAp['account_payment_cash_advance'];
			
			} else $addCash = (_fnc("company", $selectAp['company_id'], 'cash_advance', '')+$selectAp['account_payment_price']);
		
			
			// *|*|*|* //
			
						
			
			/* punem banii inapoi in cash_advance daca este necesar */
			myQ("
				 UPDATE `[x]companies` 
				 SET    `cash_advance`='".$addCash."'
				 WHERE  `company_id`='".$selectAp['company_id']."' 
				 LIMIT 1
			");	
		}
 	}

?>