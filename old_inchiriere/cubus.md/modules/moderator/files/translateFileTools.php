<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  20.03.2009                                               //
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
     */
########################################################
 		
 	if (me('id') && $_GET['unic_id']!='' && $_GET['action']=='translateFileTools') {
		
 		$files_array = _fnc("files_translation", $_GET['unic_id'], $_GET['sub_action']);
		
		if ( isset($files_array['ft_price']) && $files_array['ft_price']==0 && $_GET['filePartUnicID']!='' ) {
		
			echo 'Eroare trebuie de calculat pretul acestui fisier pentru inceput';
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noFilePrice");
			die;
  		} 		
  
 		
		if ($files_array['translation_type']==1 && $_GET['filePartUnicID']=='') $tpl -> Zone("translateOneFileTools", "confirm"); 
		else                                                                    $tpl -> Zone("translateFileTools", "selectlanguage");	

		if ($_GET['filePartUnicID']!='') {
			
			$filePart = myF(myQ("SELECT * FROM `[x]files_to_translator` where `unic_id`='".$_GET['filePartUnicID']."' LIMIT 1"));
			$tpl -> Zone("translatePartFileName", "enabled");
			$tpl -> AssignArray(array(
				"partFile.name" => $filePart['original_name']
			));
 		}	
		
		
		/* Sel;ectam datele despre fisier */	
		$toLanguageType = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$_GET['unic_id']."' LIMIT 1"));
		$toLanguage = myF(myQ("SELECT * FROM `[x]translation_languages` WHERE `id`='".$toLanguageType['languages_type']."' LIMIT 1"));
 		
		$selectTL = myF(myQ("SELECT * FROM `[x]translation_languages` WHERE `id`='".$files_array['languages_type']."' LIMIT 1"));
 		$fromLanguageId = ($files_array['parent_file_id']=='')?$selectTL['from_language']:$selectTL['to_language'];

		$selectToLang = myQ("
			SELECT * FROM `[x]translation_languages` 
			WHERE `from_language`='".$fromLanguageId."' AND `file_type`='".$selectTL['file_type']."'
			ORDER BY `id` ASC
		");
		$i=0;
		while ($selectToL = myF($selectToLang)) {
			
			$translateToLang[$i]["language.id"]       = $selectToL['id'];
			$translateToLang[$i]["language.selected"] = ($selectToL['to_language']==$toLanguage['to_language'])?' selected="selected" ':'';
			$translateToLang[$i]["language.name"]     = _fnc("languages", $selectToL['to_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$i++;
		}
		/* display account payment zone */
		if ( isset($translateToLang) ) $tpl -> Loop("selectLanguagesTo", $translateToLang);
		
 		$tpl -> AssignArray(array(
			"unic_id"           => $_GET['unic_id'],
			"filePartUnicID"    => $_GET['filePartUnicID'],
			"deadline"          => ($selectTL['translation_deadline']=='')?date("Y/m/d H:i"):date("Y/m/d H:i", $selectTL['translation_deadline']),
			"discount"          => bcdiv((100-$files_array['price_discount']/$files_array['price']*100), 1, 2),
			"fromLanguage.id"   => $fromLanguageId,
			"fromLanguage.name" => _fnc("languages", $fromLanguageId, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"sub_action"       => $_GET['sub_action'],
 		));
	} 

?>