<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  10.03.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");


########################################################
    /*
         CORECTAM DATELE DESPRE FISIER 
		 CALCULAM PRETUL 
		 APROBAM FISIERUL PENTRU CONT DE PLATA
    */
########################################################

	$notCountAuto = 1;
	if ( $_GET['notCountAuto'] != '' ) $notCountAuto = $_GET['notCountAuto'];
		

	/* Scoatem datele din GET PROGRAMS */
	if ( $_GET['FileName']!='' && $_GET['CCount']!=''/* && $_GET['CCount']>0 */) {
	
		$selectCountPrice = myF(myQ("SELECT * FROM `[x]files` WHERE `original_file` = '".$_GET['FileName']."' LIMIT 1"));		
		$_GET['file_unic_id']  = $selectCountPrice['unic_id'];
		$_GET['characters_nr'] = $_GET['CCount'];
	} 
	
	if ( $GLOBALS["CHROMELESS_MODE"] && $_GET['file_unic_id']!='' && $_GET['characters_nr']!='' && (is_numeric($_GET['characters_nr']) || $_GET['characters_nr']=='calculated') ) {
	
		$select = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$_GET['file_unic_id']."' LIMIT 1"));
		
 		/* Scoatem cont avans */
		$cash_advance = _fnc("company", $select['company_id'], 'cash_advance', '');	
		
		if ($_GET['characters_nr']=='calculated') $characters_nr = $select['characters_nr'];
		else                                      $characters_nr = $_GET['characters_nr'];
		/* PRET Fisier */
		$file_price          = _fnc("file_price", (int)($characters_nr), $select["languages_type"], $select['company_id'], ''); 
		$file_price_discount = _fnc("file_price", (int)($characters_nr), $select["languages_type"], $select['company_id'], 'discount');


		/* Adaugam/Controlam legaturile fiecarui fisier/companii si determinam ce trebuie sa facem cu el */
		$linksData = _fnc("addLinksToFile", $select, $cash_advance, $file_price_discount);
				

		// CHECK status ....
		if ($select['status_file']==0 || $select['status_file']==10 ) {
		 
			/* Analizam daca LINK care vine aduce sau nu NR de CUVINTE */
			if ( isset($_GET['words_nr']) && $_GET['words_nr'] != '' ) { $words_nr = $_GET['words_nr']; }
			else 												       { $words_nr = 0; }
			
 			/* extragem din links traducatorul cu asa legatura */
			$translatorArr = _fnc("linkt1", $select['company_id'], $select['languages_type']);
 			$forTranslator = $translatorArr['translator_id'];   
 			
 			// UPDATE ...
 			myQ("UPDATE `[x]files` 
				SET `status_file`='".$linksData['status_file']."',  
				 `translator_id`='".$forTranslator."',
				 `salary_translator`='"._fnc("translator_salary", $file_price, $forTranslator, $select["languages_type"])."',
				 `time10`='".time()."',
				 `characters_nr`='".(int)($characters_nr)."',
				 `words_nr`='".(int)($words_nr)."',
				 `price`='".$file_price."', 
				 `price_discount`='".$file_price_discount."', 
				 `payment_type`='".$linksData['paymentType']."'  
				WHERE `unic_id`='".$_GET['file_unic_id']."'
				LIMIT 1
			");
 		
 			/* crrem cont de plata in caz ca acest lucru este necesar */
			if ($linksData['autoAP']==1) _fnc("addAccountPayment", $select['unic_id'], $linksData['statusAP']);
						
			
			/* Analizam daca trebuie sa primeasca SMS Traducatorul */
			if ( $translatorArr['sms_alert'] ) {
				
				/* extragen numarul de telefon al traducatorului */
				$nr_phone_translator = _fnc("translator_editor_data", $forTranslator, 'mobile_phone');
				$dataToSmsArray = array(
					"siteName" => $CONF["SITE_NAME"],
					"siteUrl"  => "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF'])
				);
				/* Trimitem SMS la traducator */
				_fnc("sendSMS", 'new_file_to_translate.tpl', $dataToSmsArray, $nr_phone_translator);
			}
			

			/* Analizam daca trebuie sa primeasca Email Traducatorul */
			if ( $translatorArr['email_alert'] ) {

				/* extragen numarul de telefon al traducatorului */
				$email_translator = _fnc("user", $forTranslator, 'email');
				$dataToMailArray = array(
					"siteName" => $CONF["SITE_NAME"],
					"siteUrl"  => "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']),
				);
				/* Trimitem Email la traducator */
				_fnc("sendMail", "new_file_to_translate.tpl", $dataToMailArray, $email_translator);
			}

			
			/* Send the mail out! Company Email */
			$dataToMailArray = array(
				"company.name"      => _fnc("company", $select['company_id'], 'name', ''),
				"file.name"         => $select['original_name'],
				"translate.from"    => _fnc("languages", _fnc("translation", $select["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"translate.to"      => _fnc("languages", _fnc("translation", $select["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
				"file.type"         => _fnc("file_type", _fnc("translation", $select["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),				
				"file.price"        => $file_price_discount,
				"siteName"          => $CONF["SITE_NAME"],
				"siteUrl"           => "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']),
				"companyTelNumbers" => $CONF["COMPANY_TEL_NUMBERS"],	
				"companyFaxNumbers" => $CONF["COMPANY_FAX_NUMBERS"],	
				"companyEmail"      => $CONF["COMPANY_EMAIL"]
			);
			_fnc("sendMail", "file_price_calculated.tpl", $dataToMailArray, _fnc("user", $select['company_id'], 'email'));
		}
	} 
	
	/* Daca fisieul este calculat manual includem  refresh */
	if ( $notCountAuto && $GLOBALS["CHROMELESS_MODE"] ) {
		_fnc("reload", 0, "?L=moderator.files.filesList");
		die();
	}

?>