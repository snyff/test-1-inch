<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  15.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////



/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

 	/*  */
	if ( $_GET['translate'] != '' && isset($_GET['translate']) ) {

		$filesArray = explode(",", $_GET['translate']);
		$error = 0;
		foreach ( $filesArray as $key => $val ) {
					
			$select = myF(myQ("SELECT * FROM  `[x]files` WHERE `unic_id` = '".$val."'  LIMIT 1"));
			
			/* if error then end here */
			if ( $select['characters_nr'] == 0 ) { $error = 1;}
			
			/* count price for accountPayment */
 			$accountPaymentPrice += $select['price_discount'];
			
			/*  */
			$arrAP[] = $select['file_id'];
		} 
		
		/* check if this files not was added in account payment */
		foreach ( $arrAP as $var => $value ) {
			
			$checkFileData = myF(myQ("SELECT * FROM `[x]files_to_account_payment` WHERE `file_id` = '".$value."' LIMIT 1"));
			if ( $checkFileData['file_id'] != '' ) { $error == 2; }
		}

 		/* check if error */
		if ( $error == 1 ) {
			/* Reload */
			_fnc("reload", 0, "?error=pricenotcalc");
			die;
		}		
		
		if ( $error == 2 ) {
			/* Reload */
			_fnc("reload", 0, "?error=fileIsInAP");
			die;
		}		
		
		/* insert in account payment if no error */
		$unic_id = rand(100,999).rand(100,999).rand(100,999).time();
 		myQ("INSERT INTO `[x]account_payment` (`company_id`, `unic_id`, `account_payment_price`, `account_payment_cash_advance`, `account_payment_status`, `created_time` ) 
			 VALUES                           ('".me("id")."', '".$unic_id."', '".$accountPaymentPrice."', '0', '0', '".time()."')
		");
		$accountPaymentID = mysql_insert_id();

		/* Link between account payment and files */
		foreach ( $arrAP as $var => $value ) {
			
			myQ("INSERT INTO `[x]files_to_account_payment` (`account_payment_id`, `file_id`) 
				 VALUES                                    ('".$accountPaymentID."', '".$value."')
			");
			
			/* change file status */
			myQ("UPDATE `[x]files` SET `status_file` = '30', `time30` = '".time()."' WHERE `file_id` = '".$value."' ");
		}

		/* Reload */
 		_fnc("reload", 0, "?translate_f=ok");
		die;
	
	} elseif ( $_GET['translate'] == '' && isset($_GET['translate']) ) {

		/* Reload */
 		_fnc("reload", 0, "?");
		die;
	}		


?>