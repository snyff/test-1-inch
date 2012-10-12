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

	function addLinksToFile($select, $cash_advance, $file_price_discount) {
		
 		/* Analizam daca este legatura ca sa treaca automat mai departe 
		   si scoatem banii din cont de la utilizator din CONT AVANS */
		$autoAP      = 0;
		$statusAP    = 0;
		$paymentType = 0;
		if ( _fnc("linkc1", $select['company_id'], $select['languages_type']) && $cash_advance >= $file_price_discount ) {
		
			$autoAP      = 1;
			$statusAP    = 30;
			$status_file = 50;
			$paymentType = 1;
						
		} elseif ( _fnc("linkc1", $select['company_id'], $select['languages_type']) && _fnc("linkc4", $select['company_id'], $select['languages_type'])) {
				   
 			$status_file = 50;
			$paymentType = 1;
 			$autoAP      = 1;
			$statusAP    = 0;
 						
		} elseif ( _fnc("linkc1", $select['company_id'], $select['languages_type']) ) {
				   
			$status_file = 10;
			$autoAP      = 1;
			$statusAP    = 0;
 
  		} else $status_file = 10;
		
		$data['autoAP']      = $autoAP;
		$data['statusAP']    = $statusAP;
		$data['paymentType'] = $paymentType;
		$data['status_file'] = $status_file;
		
		return $data;	
   	}
	
?>