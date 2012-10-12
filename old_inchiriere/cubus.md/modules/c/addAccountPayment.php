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

	/* add normal account payment */
	if ( $_GET['translate']!='' && isset($_GET['translate']) ) {

 		$error = _fnc("addAccountPayment", $_GET['translate']);
		
		/* check if error */
		if ($error==1) {
		
			/* Reload */
			_fnc("reload", 0, "?error=pricenotcalc");
			die;
		
		} elseif ($error==2) {
		
			/* Reload */
			_fnc("reload", 0, "?error=fileIsInAP");
			die;
		
		} elseif ($error==0) {
		
			/* Reload */
			_fnc("reload", 0, "?translate_f=ok");
			die;
		}
	
	} elseif ($_GET['translate']=='' && isset($_GET['translate'])) {
		/* Reload */
 		_fnc("reload", 0, "?");
		die;
	}		

	
	/* add cash_advance */
 	if ( $_GET['addAP'] != '' && isset($_GET['addAP']) ) {

		if ( is_numeric($_GET['addAP']) ) {
		
			if ( $_GET['addAP'] >= $CONF["MIN_ACCOUNT_PAYMENT"] ) {
		
				/* insert in account payment if no error */
				$unic_id = rand(100,999).rand(100,999).rand(100,999).time();
				myQ("INSERT INTO `[x]account_payment` (`company_id`, `unic_id`, `account_payment_price`, `account_payment_cash_advance`, `account_payment_status`, `account_payment_type`, `created_time` ) 
					 VALUES                           ('".me("id")."', '".$unic_id."', '".$_GET['addAP']."', '0', '0', '1', '".time()."')
				");
				$accountPaymentID = mysql_insert_id();
				
  				/* Account payment generator in PDF */
				_fnc("accountPaymentToPDF", $accountPaymentID, 1);
 				_fnc("reload", 0, "?add_ap=ok");
				die;
			
			} else {			
				
				_fnc("reload", 0, "?error=noDataInAP");
				die;
			}
			
		} else {
		
			_fnc("reload", 0, "?error=noNumAP");
			die;
		}
		 		 
	} elseif ( $_GET['addAP'] == '' && isset($_GET['addAP']) ) {
	
 		_fnc("reload", 0, "?error=noDataInAP");
		die;
	}		


?>