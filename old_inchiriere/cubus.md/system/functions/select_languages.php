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


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	function select_languages($idSelectedLanguage) {
		
		 /* Selectam lista de LIMBI din tabela */
		 $languages_list = myQ("
			SELECT *
			FROM `[x]languages`
			ORDER BY `language_id` ASC
		 ");
	
	     /* Adaugam datele in ARRAY */
		 $i=1;
		 while ($languages = myF($languages_list)) {
		       			 
 			 /* Aflam ID limbii pentru a putea lucra cu EA */
			 $languageArray[$i]["language.id"] = $languages["language_id"];
			 
			 /* Detectam daca e selectat sau nu LIMBA */
			     if ( $i == 1                   && $idSelectedLanguage == "" ) { $languageArray[$i]["language.selected"] = " selected "; }
			 elseif ( $i == $idSelectedLanguage && $idSelectedLanguage != "" ) { $languageArray[$i]["language.selected"] = " selected "; }
			 else                                                              { $languageArray[$i]["language.selected"] = ""; }
			 
			 /* Punem numele la limba in dependenta de ce LIMBA e activa RO, RU, EN */
 			 $languageArray[$i]["language.name"] = $languages[$GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]];
			 
			 $i++;
		 }
 		
		return $languageArray;
	}

?>