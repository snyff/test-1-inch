<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  22.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

	if ( me("id")!='' ) {
		
		/* Stergem fisierul din DB */
		if ( $_GET['deleteAP'] != '' && isset($_GET['deleteAP']) ) {
		
			 /*
				Posibil ca e gresit trebuie de vazul pina unde se permise sa se stearga FISIERE  
				AICI E GRESEALA --- `account_payment_status` < 20
			 */
			 if ( is_op(me('id')) ) $where = " 1 AND"; 
			 else                   $where = " `company_id` = '".me('id')."' AND "; 
			
			 $selectAP = myF(myQ("
				SELECT * FROM `[x]account_payment` 
				WHERE `unic_id` = '".$_GET['deleteAP']."' AND 
					  ". $where ."
					  `account_payment_status` < 20 
				LIMIT 1
			 "));
			
			 if ( $selectAP['account_payment_id'] != '' ) {
			
				_fnc("cash_advance", '', $selectAP['unic_id'], 'deleteAP');
				
				/* delete account payment */
				myQ("DELETE FROM `[x]account_payment` WHERE `account_payment_id`='".$selectAP['account_payment_id']."' LIMIT 1");		
 				
				// go next if this Account payment have file 
				if ( $selectAP['account_payment_type'] == 0 ) {
				
					/* Afisam lista cu documente */
					$fileSelect = myQ("
						SELECT * FROM `[x]files`, `[x]files_to_account_payment`
						WHERE `[x]files_to_account_payment`.`file_id` = `[x]files`.`file_id` AND
							  `[x]files_to_account_payment`.`account_payment_id` = '".$selectAP['account_payment_id']."'
					");
					
					while ($files = myF($fileSelect)) {
					
						/* punem banii inapoi in cash_advance daca este necesar */
 						myQ("UPDATE `[x]files` SET `status_file`='10', `translation_status`='0', `translation_method`='0' WHERE `file_id`='".$files['file_id']."'");
						
						/* Stergem toate subfisierele daca exista */
						$filePartDelete = myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='".$files['file_id']."'");
 						while ($filesPD = myF($filePartDelete)) {
						
							myQ("DELETE FROM `[x]files_to_translator` WHERE `file_id`='".$filesPD['file_id']."' LIMIT 1");
							@unlink($CONF["files_folder"].$CONF["new_files"].'/'.$filesPD['original_file']);
						}
  					}
					
					/* delete from files_to_account_payment */
					myQ("DELETE FROM `[x]files_to_account_payment` 
						 WHERE `account_payment_id`='".$selectAP['account_payment_id']."'   
					");
				 }
				 
 				 @unlink($CONF["files_folder"].$CONF["account_payment"].'/'.$selectAP['unic_id'].".pdf");
				 				  
			 }
					 
			 if ( is_op(me('id')) ) _fnc("reload", 0, "?L=moderator.files.accountsPayment");
			 else                   _fnc("reload", 0, "?delete_ap=ok");
			 die;
			
		} elseif ( $_GET['deleteAP'] == '' && isset($_GET['deleteAP']) ) {
		
			 _fnc("reload", 0, "?");
			 die;
		}
		
	} else {

		 _fnc("reload", 0, "?");
		 die;
	}		
		

?>