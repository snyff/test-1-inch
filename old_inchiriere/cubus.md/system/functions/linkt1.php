<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  16.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

// CORECT !!! // 	
	
	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function linkt1($compnay_id, $languages_type) {
		
		/* Controlam daca e companie  */
		if (
			 ( _fnc("user", $compnay_id, 'user_type')==1 || 
			   _fnc("user", $compnay_id, 'user_type')==2
			 ) && $compnay_id != '' 
		   ) 
		{
			
			/* Legatura care controleaza daca traducerea trece direct la traducator sau nu . */
			$select = myF(myQ("
				SELECT * FROM `[x]links` 
				WHERE `company_id`='".$compnay_id."' AND `link_type`='6' AND `languages_type`='".$languages_type."'  
				LIMIT 1
			"));
			
			if ( $select['link_id']!='' ) {
			
				$translatorArr['translator_id'] = $select['translator_id']; 
				$translatorArr['sms_alert']     = $select['sms_alert']; 
				$translatorArr['email_alert']   = $select['email_alert']; 
			
			} else {
			
				$translatorArr['translator_id'] = 0; 
				$translatorArr['sms_alert']     = 0; 
				$translatorArr['email_alert']   = 0; 
			}
			
			return $translatorArr;			
		
 		} else {
 
 			$translatorArr['translator_id'] = 0; 
			$translatorArr['sms_alert']     = 0; 
			$translatorArr['email_alert']   = 0; 
			return $translatorArr; 
		}
 	}

?>