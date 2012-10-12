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


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	function select_type_translation($languages_type, $default=false) {
		
 		global $CONF;
		
		/* Selectam datele default care ne spun ce trebuie sa apara din start */
	    if ( $CONF["DEFAULT_FROM_TO_LANGUAGE"]!='' && is_numeric($CONF["DEFAULT_FROM_TO_LANGUAGE"]) && $CONF["DEFAULT_FROM_TO_LANGUAGE"]!=0) {
			if ($languages_type!='') $defaultLType = $languages_type;
			else                     $defaultLType = $CONF["DEFAULT_FROM_TO_LANGUAGE"];
			$selectDefault = myF(myQ("SELECT * FROM `[x]translation_languages` WHERE `id` = '".$defaultLType."'"));			
 		} elseif ($CONF["DEFAULT_FROM_TO_LANGUAGE"]==0) { 
 			_fnc("reload", 0, "?L=moderator.translations.rates&error=noDefaultTranslate");
			die();
		}
		
		
		/* Daca $default == true facem ca sa nu apara variabelel astea pe ecran */
		if ($default) {
		
			$skills = array(
				"{default}" => 'languages',
				"{id}"      => 'languagesd1',
				"{name}"    => $GLOBALS["OBJ"]["noneData"]
			);
			$ttList[0]["skills"] = strtr($GLOBALS["OBJ"]["addList"], $skills);	
			
			
			$skills = array(
				"{default}" => 'languagesd1',
				"{id}"      => 'languagesd11',
				"{name}"    => $GLOBALS["OBJ"]["noneData"]
			);
			$ttList[1]["skills"]  = strtr($GLOBALS["OBJ"]["addList"], $skills);
			
			
			$skills = array(
				"{default}" => 'languagesd11',
				"{id}"      => 0,
				"{name}"    => $GLOBALS["OBJ"]["noneData"]
			);
			$ttList[2]["skills"]  = strtr($GLOBALS["OBJ"]["addOption"], $skills);
		}
		
		
		
		/* Afisam lista cu datele despre limbi - Creem arborele cu toate limbile existente */
		$selectTa = myQ("SELECT * FROM `[x]translation_languages` WHERE `status`='0' ORDER BY `id` ASC");
		while ($selectAddA = myF($selectTa)) $arrayAddA[$selectAddA['from_language']][$selectAddA['to_language']][$selectAddA['file_type']] = $selectAddA['id'];
		

		$i=3;
		foreach ( $arrayAddA as $key => $val ) {
			
			$skills = array(
				"{default}" => 'languages',
				"{id}"      => 'languages'.$key,
				"{name}"    => _fnc("languages", $key, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])
			);
			
			if (!$default && $selectDefault['from_language']==$key) $ttList[0]["skills"]  = strtr($GLOBALS["OBJ"]["addList"], $skills);
			else                                                    $ttList[$i]["skills"] = strtr($GLOBALS["OBJ"]["addList"], $skills);			
			$i++;
			
			foreach ( $val as $keyval => $valval ) {
			
				$skills = array(
					"{default}"  => 'languages'.$key,
					"{id}"       => 'filetype'.$key.$keyval,
					"{name}"     => _fnc("languages", $keyval, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])
 				);
				
				if (!$default && $selectDefault['to_language']==$keyval && $selectDefault['from_language']==$key) $ttList[1]["skills"]  = strtr($GLOBALS["OBJ"]["addList"], $skills);
				else $ttList[$i]["skills"] = strtr($GLOBALS["OBJ"]["addList"], $skills);
				$i++;
		
				foreach ( $valval as $keyvalval => $valvalval ) {
				
					$skills = array(
						"{default}" => 'filetype'.$key.$keyval,
						"{id}"      => $valvalval,
						"{name}"    => _fnc("file_type", $keyvalval, $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])
					);
					
					if (!$default && $selectDefault['from_language']==$key && $selectDefault['to_language']==$keyval && $selectDefault['file_type']==$keyvalval) $ttList[2]["skills"]  = strtr($GLOBALS["OBJ"]["addOption"], $skills);
					else $ttList[$i]["skills"] = strtr($GLOBALS["OBJ"]["addOption"], $skills);
 					$i++;
				}
 			}
   		}
		$ttList[] = ksort($ttList);
 		
		return $ttList;
	}

?>