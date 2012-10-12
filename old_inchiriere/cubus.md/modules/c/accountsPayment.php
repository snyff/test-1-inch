<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  19.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
 	$tpl = new template;
	$tpl -> Load("accountsPayment");
	$tpl -> GetObjects(); 
		
  		/**/
		$tpl->Zone("abilList", "translation"); 
		$tpl->Zone("uploadFileBlock", "enabled"); 
		if (me("id")) $tpl->Zone("islogin", "login"); 
 		
 		/* Facem LOOP la Lista cu LIMBI */
		$ttList = _fnc("select_type_translation", '');
		/* AFISAM Lista cu posibilitatile de traduceri existente */
		if (isset($ttList) ) $tpl -> Loop("loopSkills", $ttList); 
		
 		/* Conturi de plata */
		if ( me('id') ) { 
		
			
			$tpl -> AssignArray(array(
 				"name.contact.person" => _fnc("company",  me("id"), 'contact_person', ''),
 			));
			
			
			/* Account payment */
			$accountPaymentSelect = myQ("
				SELECT *
				FROM  `[x]account_payment`
				WHERE `company_id` = '".me('id')."'  
				ORDER BY `account_payment_id` DESC
			");
			
 			/* display account payment */
			$i=0;
			$debt=0;
			$accountPaymentListNew = '';
			$accountPaymentListConfirm = '';
			while ( $accountPayment = myF($accountPaymentSelect) ) {
			
				$sfiles = myQ("
					SELECT * FROM `[x]files_to_account_payment`, `[x]files`
					WHERE `[x]files`.`file_id` = `[x]files_to_account_payment`.`file_id` AND
						  `[x]files_to_account_payment`.`account_payment_id` = '".$accountPayment['account_payment_id']."'
				");
				
				$y=0;
				$files_str ='';
				while ($files = myF($sfiles)) {
					
					$files_str .= "<tr><td>".$files['original_name']." &nbsp;</td><td>-</td><td>&nbsp; <font size=\"1\">( "._fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $files["languages_type"], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font></td></tr>";
					$y++;
				}
 				$accountPaymentFiles = array("{files}" => $files_str);
				
				$accountPaymentUnicID = array("{accountPayment.unicID}" => $accountPayment['unic_id']);

				/* Datele care sunt introduse in HTML */
				$accountPaymentList[$i]["accountPayment.nr"]     = $accountPayment['account_payment_id'];
				$accountPaymentList[$i]["accountPayment.unicID"] = $accountPayment['unic_id'];
				$accountPaymentList[$i]["accountPayment.price"]  = $accountPayment["account_payment_price"];
				$accountPaymentList[$i]["deleteAP"]              = $accountPayment["payment_type"]?'':strtr($GLOBALS["OBJ"]["accountPaymentDeleteEnabled"], $accountPaymentUnicID);

				if ($accountPayment['account_payment_type']) $accountPaymentList[$i]["accountPayment.type"] = $GLOBALS["OBJ"]["accountPaymentCashAdvance"]; 
				else $accountPaymentList[$i]["accountPayment.type"] = strtr($GLOBALS["OBJ"]["accountPaymentFiles"], $accountPaymentFiles); 
 			
				$debt += $accountPayment['account_payment_price'];
				
					if ($accountPayment['account_payment_status']<=20) $accountPaymentListNew[]     = $accountPaymentList[$i];
				elseif ($accountPayment['account_payment_status']==30) $accountPaymentListConfirm[] = $accountPaymentList[$i];
				
				$i++;
			}
			
  			/* display account payment zone */
			if ( is_array($accountPaymentListNew) ) {
				
 				$tpl -> Zone("accountPaymentListNew", "enabled"); 
				$tpl -> Loop("accountPaymentListNew", $accountPaymentListNew);

			} else $tpl -> Zone("accountPaymentListNew", "empty"); 
 		
			/* display account payment zone */
			if ( is_array($accountPaymentListConfirm) ) {
				
				$tpl -> Zone("accountPaymentListConfirm", "enabled"); 
				$tpl -> Loop("accountPaymentListConfirm", $accountPaymentListConfirm);

			} else $tpl -> Zone("accountPaymentListConfirm", "empty"); 
		}
		
		// daca nu etse logat incarcam modulul care scoate alerta pentru logare
		if ( !me("id") ) $tpl -> Zone("islogin", "guest");
		
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>