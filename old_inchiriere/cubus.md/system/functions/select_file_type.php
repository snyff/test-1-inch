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

	function select_file_type($fileTypeName) {
		
		 /* Selectam lista de TIP TEXT din tabela */
		 $file_type_list = myQ("
			SELECT *
			FROM `[x]file_type`
			ORDER BY `id_file_type` ASC
		 ");
		 
 	     /* Adaugam datele in ARRAY */
		 $i=1;
		 while ($file_type = myF($file_type_list)) {
		 
 			 /* Aflam "namefield" pentru a putea lucra cu EA */
			 $fileTypeArray[$i]["file_type.default_name"] = $file_type["default_name"];
			 $fileTypeArray[$i]["file_type.id"]           = $file_type["id_file_type"];
			 
			 /* Detectam daca e selectat sau nu LIMBA */
			     if ($i==1 && $fileTypeName=="")                                     { $fileTypeArray[$i]["file_type.selected"] = " selected "; }
			 elseif ($file_type["default_name"]==$fileTypeName && $fileTypeName!="") { $fileTypeArray[$i]["file_type.selected"] = " selected "; }
			 else                                                                    { $fileTypeArray[$i]["file_type.selected"] = ""; }
						
			 /* Punem numele la limba in dependenta de ce LIMBA e activa RO, RU, EN */
			 $fileTypeArray[$i]["file_type.name"] = $file_type[$GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]];
			 
			 $i++;
		 }
		 		
		 return $fileTypeArray;
	}

?>