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
	$tpl -> Load("calcPrice");
	$tpl -> GetObjects(); 
		
		$tpl->Zone("abilList", "translation"); 
		$tpl->Zone("countPrice", "count"); 
 	
		
		
		/* Facem LOOP la Lista cu LIMBI */
		$ttList = _fnc("select_type_translation", '');
		/* AFISAM Lista cu posibilitatile de traduceri existente */
		if (isset($ttList) ) $tpl -> Loop("loopSkills", $ttList); 
		
		if ($_GET['file_types']>0 && $_GET['pages']>0) {
		
			$type_file = $_GET['file_types']; 
 			
			$tpl->Zone("calcPrice", "enabled");			
			$price = _fnc("file_price", (int)($_GET['pages']*$CONF["NR_CHARACTERS_ON_PAGE_WITHOUT_SPACE"]), $_GET['file_types'], '', '');			
			$tpl -> AssignArray(array("calc.price" => $price));
			
			/* trimitem mailuri care anunta ca sa incarcat un nou fisier */
			if ( $CONF["EMPROYEES_MAIL_ALERT"] && $CONF["EMPROYEES_MAIL_LIST"]!='' ) {
			
				$dataToMailArray = array(
					"pages"        => $_GET['pages'],
					"fromLanguage" => _fnc("languages", _fnc("translation", $_GET['file_types'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),	
					"toLanguage"   => _fnc("languages", _fnc("translation", $_GET['file_types'], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),	
					"fileType"     => _fnc("file_type", _fnc("translation", $_GET['file_types'], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
					"price"        => $price,
					"name"         => $_GET['name'],
					"phone"        => $_GET['phone'],
					"email"        => $_GET['email']
				);
 				
				$empl_array = explode(",", $CONF["EMPROYEES_MAIL_LIST"]);
				foreach ($empl_array as $key => $val) { _fnc("sendMail", "new_calc_price.tpl", $dataToMailArray, trim($val)); }
			}						
		} 
   
	$tpl -> CleanZones();
	$tpl -> Flush();

?>