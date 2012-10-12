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

	function sendSMS($templateName, $data_to_sms_array, $nr_phone) {		
		global $CONF;
		
		$sms = new template;
		$sms -> LoadThis(file_get_contents("theme/templates/GLOBALS/sms/".$templateName));
  		
		if (is_array($data_to_sms_array)) $sms -> AssignArray($data_to_sms_array); 

		$smsContent = $sms->Flush(1);
 		
  		/* Trimitem SMS la traducator  */						 
		$user     = $CONF["CLICKATELL_USER"];
		$password = $CONF["CLICKATELL_PASSWORD"];
		$api_id   = $CONF["CLICKATELL_API"]; 
		$baseurl  = "http://api.clickatell.com";
		$text = urlencode(trim($smsContent));
		$to = $nr_phone;
		// auth call
		$url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
		// do auth call
		$ret = file($url);
		
		// split our response. return string is on first line of the data returned
		$sess = split(":",$ret[0]);
		
		if ($sess[0] == "OK") {
			$sess_id = trim($sess[1]); // remove any whitespace
			$url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
			// do sendmsg call
			$ret = file($url);
			$send = split(":",$ret[0]);
		
			//if ($send[0] == "ID") echo "success message ID: ". $send[1];
			//else				  echo "send message failed";
		
		} else {
			
			//echo "Authentication failure: ". $ret[0];
			//exit();
		}
	}

?>