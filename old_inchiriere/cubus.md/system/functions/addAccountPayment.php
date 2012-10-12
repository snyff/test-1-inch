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

	function addAccountPayment($files_unic_id, $status_ap=0) {
		
		$filesArray                = explode(",", $files_unic_id);
		$arrAP                     = array();
		$error                     = 0;
		$accountPaymentPrice       = 0;
		$AP_status                 = 0;
		$status_ap_value           = 0;
		$accountPaymentCashAdvance = 0;		
		
		$selectCompanyData = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id` = '".$filesArray[0]."' LIMIT 1"));					
		
		foreach ( $filesArray as $key => $val ) {
 			
 			$cash_advance = _fnc("company", $selectCompanyData['company_id'], 'cash_advance', '');
			
			$select = myF(myQ("SELECT * FROM  `[x]files` WHERE `unic_id` = '".$val."'  LIMIT 1"));
			
			/* if error then end here */
			if ( $select['characters_nr'] == 0 ) $error = 1;
			
  			/* Controlam daca trebuie sau nu trebuie sa creem cont de plata nou sau trecem fisierele automat la traducere */
			if ( $error==0 && $cash_advance>=$select['price_discount'] ) {
				
				$new_cash_advance = _fnc("company", $selectCompanyData['company_id'], 'cash_advance', '')-$select['price_discount'];
				
				myQ("
					 UPDATE `[x]companies` 
					 SET    `cash_advance`='".$new_cash_advance."'
					 WHERE  `company_id`='".$select['company_id']."' 
					 LIMIT 1
				");	
				myQ("UPDATE `[x]files` SET `status_file`='50', `payment_type`='1', `time50` = '".time()."' WHERE `file_id` = '".$select['file_id']."' LIMIT 1");
								
				/* count price for accountPayment */
				$accountPaymentPrice      += $select['price_discount'];
  				$accountPaymentCashAdvance = 0;
				
 				/*  */
				$arrAP[]         = $select['file_id'];
				/* Creem conturi de plata */
				$AP_status       = 1;
				$status_ap_value = 30;
			
			} elseif ( $error==0 && _fnc("linkc4", $selectCompanyData['company_id'], $select['languages_type']) ) {
			
				$new_cash_advance = _fnc("company", $selectCompanyData['company_id'], 'cash_advance', '')-$select['price_discount'];
				
				myQ("
					 UPDATE `[x]companies` 
					 SET    `cash_advance`='".$new_cash_advance."'
					 WHERE  `company_id`='".$select['company_id']."' 
					 LIMIT 1
				");	

				/* count price for accountPayment */
				$accountPaymentPrice      += $select['price_discount'];
  				$accountPaymentCashAdvance = ($cash_advance>0 && $accountPaymentCashAdvance==0)?$cash_advance:0;
				
 				/*  */
				$arrAP[]   = $select['file_id'];
				/* Creem conturi de plata */
				$AP_status = 1;
				$status_ap_value = 0;
				
			} else {
			
				$new_cash_advance = _fnc("company", $selectCompanyData['company_id'], 'cash_advance', '')-$select['price_discount'];
				
				myQ("
					 UPDATE `[x]companies` 
					 SET    `cash_advance`='".$new_cash_advance."'
					 WHERE  `company_id`='".$select['company_id']."' 
					 LIMIT 1
				");	

				/* count price for accountPayment */
				$accountPaymentPrice      += $select['price_discount'];
  				$accountPaymentCashAdvance = ($cash_advance>0 && $accountPaymentCashAdvance==0)?$cash_advance:0;
				
 				/*  */
				$arrAP[]   = $select['file_id'];
				/* Creem conturi de plata */
				$AP_status = 0;
				$status_ap_value = 0;
 			}
		} 
		
		
		
		/* check if this files not was added in account payment */
		foreach ( $arrAP as $var => $value ) {
			
			$checkFileData = myF(myQ("SELECT * FROM `[x]files_to_account_payment` WHERE `file_id` = '".$value."' LIMIT 1"));
			if ( $checkFileData['file_id'] != '' ) $error = 2;
		}
		

		if ($error!=0) return $error;
		else {		
		
 			if ( count($arrAP)>0 ) {
				
				/* insert in account payment if no error */
				$unic_id = rand(100,999).rand(100,999).rand(100,999).time();
				myQ("INSERT INTO `[x]account_payment` (`company_id`, `unic_id`, `account_payment_price`, `account_payment_cash_advance`, `account_payment_status`, `created_time`, `payment_type` ) 
					 VALUES                           ('".$selectCompanyData['company_id']."', '".$unic_id."', '".$accountPaymentPrice."', '".$accountPaymentCashAdvance."', '".$status_ap_value."', '".time()."', '".$AP_status."')
				");
				$accountPaymentID = mysql_insert_id();
		
				/* Link between account payment and files */
				foreach ( $arrAP as $var => $value ) {
					
					myQ("INSERT INTO `[x]files_to_account_payment` (`account_payment_id`, `file_id`) 
						 VALUES                                    ('".$accountPaymentID."', '".$value."')
					");
					
					/* change file status */
					if ($AP_status) {
						 
						 myQ("UPDATE `[x]files` SET `status_file` = '50', `payment_type`='1', `time50` = '".time()."' WHERE `file_id` = '".$value."' ");
						 
						 /* Adaugat File part automat */
						 _fnc("addFilePart", $value);						 
					
					} else {
					
						myQ("UPDATE `[x]files` SET `status_file` = '30', `time30` = '".time()."' WHERE `file_id` = '".$value."' ");
					}
				}
		
				/* Account payment generator in PDF */
				_fnc("accountPaymentToPDF", $accountPaymentID, 0);
				
				return $error;
			}
		}		
   	}

?>