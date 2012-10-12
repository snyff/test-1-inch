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

	function checkTime($time_insert, $data_check, $type_time) {
				 
		 if ( $type_time == 'zile' )     { $timpNormal = $data_check * 24 * 60 * 60; } 
		 if ( $type_time == 'ore' )      { $timpNormal = $data_check * 60 * 60; } 
		 if ( $type_time == 'minute' )   { $timpNormal = $data_check * 60; } 
		 if ( $type_time == 'secunde' )  { $timpNormal = $data_check; } 
		 
		 $array_zile_nelucratoare = array();
		 
		 $timp_o_zi = 24*60*60;
		
		 /* Data luna anul cind sa intimplat evenimentul */  
		 $timpWeekend = $time_insert;
		 
		 $days_check_test = $timpNormal / 60 / 60 / 24;
		 $days_check_int = (int)($timpNormal / 60 / 60 / 24);
		 
		 if ( $days_check_test > $days_check_int ) { $days_check = $days_check_test; } 
		 else                                      { $days_check = $days_check_int;  } 

		 
		 for ($i=0; $i<$days_check; $i++) {
		  
		      $k = 0;
		  
		           if ( date('w', $timpWeekend) == 5 && ( $days_check- $k ) > 0 ) { $timpWeekend = $timpWeekend + $timp_o_zi * 3; }
  			  else if ( date('w', $timpWeekend) == 6 && ( $days_check- $k ) > 0 ) { $timpWeekend = $timpWeekend + $timp_o_zi * 2; }
			  else if ( date('w', $timpWeekend) == 0 && ( $days_check- $k ) > 0 ) { $timpWeekend = $timpWeekend + $timp_o_zi * 1; }
			  else                                                                { $timpWeekend = $timpWeekend + $timp_o_zi * 1; }
 			  
			  $k++;
		 }		

		 return  $timpWeekend;
	}
?>



