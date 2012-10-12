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
	$tpl -> Load("filesList");
	$tpl -> GetObjects(); 
		
  		/**/
		$tpl->Zone("abilList", "translation"); 
		$tpl->Zone("uploadFileBlock", "enabled"); 
		if (me("id")) $tpl->Zone("islogin", "login"); 
 		
 		/* Facem LOOP la Lista cu LIMBI */
		$ttList = _fnc("select_type_translation", '');
		/* AFISAM Lista cu posibilitatile de traduceri existente */
		if (isset($ttList) ) $tpl -> Loop("loopSkills", $ttList); 
		
		
		/* Conturi de plata */
		if ( me('id') ) { 
 
			$tpl -> AssignArray(array(
 				"name.contact.person" => _fnc("company",  me("id"), 'contact_person', ''),
 			));
			
			echo "SELECT * FROM  `[x]files` WHERE `company_id` = '".me('id')."' ORDER BY `file_id` DESC";
			
			$fileSelect = myQ("SELECT * FROM  `[x]files` WHERE `company_id` = '".me('id')."' ORDER BY `file_id` DESC");		
			
			/* Afisam lista cu documente */
			$i=0;
			while ($files = myF($fileSelect)) {
				
				$fileDataAr = array(
					"{file.nrPage}" => _fnc("pages_nr",  $files['characters_nr']),
					"{file.price}"  => $files["price_discount"]
				);
				
 				/* Datele care sunt introduse in HTML */ 
				$filesList[$i]["unic.id"]       = $files["unic_id"];
				$filesList[$i]["original.name"] = $files["original_name"];
				$filesList[$i]["original.file"] = $files["original_file"];
				$filesList[$i]["from.language"] = _fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesList[$i]["to.language"]   = _fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesList[$i]["file.type"]     = _fnc("file_type", _fnc("translation", $files["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
				$filesList[$i]["characters.nr"] = ($files["characters_nr"]==0)?'---':$files["characters_nr"];
				$filesList[$i]["pages.nr"]      = ($files["characters_nr"]==0)?'---':_fnc("pages_nr",  $files['characters_nr']);
				$filesList[$i]["price"]         = ($files["price_discount"]==0)        ?'---':$files["price_discount"];
				$filesList[$i]["description"]   = $files["description"];
				$filesList[$i]["fileDetail"]    =  strtr($GLOBALS["OBJ"]["fileDetail"], $fileDataAr); 
				$filesList[$i]["time0"]         =  date($CONF["LOCALE_SHORT_DATE_TIME"], $files["time0"]); 
				
				
				if ($files["status_file"]==80 ) {
	
					$downloadFileArr["{download.path}"]     = urlencode($CONF["edited_files"]);
					$downloadFileArr["{file.downloadFile}"] = $files['edited_file'];
					$downloadFileArr["{file.downloadName}"] = $files['edited_name'];
				} 
			
					if ($files["status_file"]>=0 && $files["status_file"]<=30) $filesList[$i]["statut.file"] = $GLOBALS["OBJ"]["statutToPay"];
				elseif ($files["status_file"]==50                             ) $filesList[$i]["statut.file"] = $GLOBALS["OBJ"]["statutToTranslation"];
				elseif ($files["status_file"]>=60 && $files["status_file"]<=70) $filesList[$i]["statut.file"] = $GLOBALS["OBJ"]["statutToEdit"];
				elseif ($files["status_file"]==80                             ) $filesList[$i]["statut.file"] = strtr($GLOBALS["OBJ"]["statutDownload"], $downloadFileArr);
				
				
				$i++;
			}
  
 			/* AFISAM Lista pentru CALCUL PRET */
			if ( isset($filesList) ) {
				$tpl -> Zone("filesList", "enabled");
				$tpl -> Loop("loopFilesList", $filesList);
			}  
   		}
		
		// daca nu etse logat incarcam modulul care scoate alerta pentru logare
		if ( !me("id") ) $tpl -> Zone("islogin", "guest");
		
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>