<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  24.12.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2008  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

// CORECT !!! //

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
########################################################
    /*
         SELECTAM TOATE FISIERELE DIN db SI LE REPARTIZAM 
		 CA "aprobate" SI "neaprobate"
    */
########################################################

	die();	
	
	echo $countTime = time()-5*60;
	$select = myF(myQ("SELECT * FROM `[x]files` WHERE `status_file` = '0' AND `time0` < '".$countTime."' ORDER BY `time0` DESC LIMIT 1"));
	/* tipul fisierului */
	if ( $select["original_file"] != '' ) {
	 
		echo '1';
		
		/* trimitem mailuri care anunta ca sa incarcat un nou fisier */
		if ( $CONF["EMPROYEES_MAIL_ALERT"] && $CONF["EMPROYEES_MAIL_LIST"]!='' ) {
		
			$empl_array = explode(",", $CONF["EMPROYEES_MAIL_LIST"]);
			foreach ($empl_array as $key => $val) { _fnc("sendMail", "new_file_upload.tpl", "", trim($val)); }
		}						
	}	


	$countTime = time()-20*60;
	$select = myF(myQ("SELECT * FROM `[x]files` WHERE `status_file` = '0' AND `time0` < '".$countTime."' ORDER BY `time0` DESC LIMIT 1"));
	/* tipul fisierului */
	if ( $select["original_file"] != '' ) {
	 
		echo '2';
		
		/* extragen numarul de telefon al traducatorului */
		$nr_phone_translator = '+37368130505';
		$dataToSmsArray = array(
			"siteName" => $CONF["SITE_NAME"],
			"siteUrl"  => "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF'])
		);
		/* Trimitem SMS la traducator */
		_fnc("sendSMS", 'new_file_to_translate.tpl', $dataToSmsArray, $nr_phone_translator);
	}	
	
?>
