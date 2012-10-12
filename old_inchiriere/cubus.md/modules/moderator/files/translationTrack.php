<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  18.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("translationTrack");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') ) {	
		
		$tpl -> Zone("filesModule", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}
		

	########################################################
		/*
			 SELECTAM TOATE FISIERELE DIN db SI LE REPARTIZAM 
			 CA "aprobate" SI "neaprobate" sau "sterse"
		*/
	########################################################
	
	if ( me('id') ) {	
	
		/* extension array */
		$extension_array = explode(",", $CONF["FILES_COUNTED_EXTENTIONS"]);
 
		/* scoatem fisierele din DB si le analizam separat in dependenta de statut */
		$selectL = myQ("SELECT * FROM `[x]files` ORDER BY `file_id` DESC");		
		$i=0;
		while ($files = myF($selectL)) {
			
			/* extensie file */
			$extension = _fnc("file_extension", $CONF["files_folder"].$CONF["new_files"]."/".$files["original_file"]);						
						
   			$files_html                  = _fnc("array_html", $files);
			$files_html["{file.nrPage}"] = _fnc("pages_nr", $files['characters_nr']);
			
  			/* fisier data */
			$filesArray[$i]["file.originalNameH"]   = $files['original_name'];
			$filesArray[$i]["file.translateFrom"]   = _fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["file.translateTo"]     = _fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["file.type"]            = _fnc("file_type", _fnc("translation", $files["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["description"]          = $files['description'];
			$filesArray[$i]["file.price"]           = ($files["price_discount"]>0?'<font color="green"><b>'.$files["price_discount"].'</b></font>':(in_array($extension, $extension_array)?$GLOBALS["OBJ"]["calcPriceAuto"]:$GLOBALS["OBJ"]["calcPriceManual"]));
			$filesArray[$i]["nrPages.nrCharacters"] = ($files["price"]>0)?strtr($GLOBALS["OBJ"]["nrPagesnrCharactersYes"], $files_html):$GLOBALS["OBJ"]["nrPagesnrCharactersNo"];
			$filesArray[$i]["unic_id"]              = $files["unic_id"];
			$filesArray[$i]["file.companyID"]       = $files["company_id"];
			$filesArray[$i]["file.path"]            = urlencode($CONF["new_files"]);
			$filesArray[$i]["file.originalName"]    = urlencode($files["original_name"]);
			$filesArray[$i]["file.originalFile"]    = urlencode($files["original_file"]);
			
			/* Pentru fisierele care trebuie sterse apare peste cit timp vor fi sterse */
 			if ( $files['status_file'] == 20 ) {
				$minutes_nr = ($files['time20'] + 2*24*60*60 - time())/60;
				
				$filesArray[$i]["file.hours"]   = (int)($minutes_nr/60);
				$filesArray[$i]["file.minutes"] = (int)($minutes_nr-($filesArray[$i]["file.hours"]*60));
			}
			
			/* Separam fisierele aprobate de cele neaprobate */
				if ( $files['status_file'] == 20 )  {  $newFiles[]      = $filesArray[$i]; }
			elseif ( $files['status_file'] == 10 ) {  $approvedFiles[] = $filesArray[$i]; }
			elseif ( $files['status_file'] == 20 ) {  $rejectedFiles[] = $filesArray[$i]; }
			
			$i++;
		}
		
		if (isset($newFiles)) {
			$tpl -> Zone("newFiles", "enabled");
			$tpl -> Loop("newFilesList", $newFiles);
		} else $tpl -> Zone("newFiles", "empty");
		
		if (isset($approvedFiles)) {
			$tpl -> Zone("approvedFiles", "enabled");
			$tpl -> Loop("approvedFilesList", $approvedFiles);
		} else $tpl -> Zone("approvedFiles", "empty");
		
		if (isset($rejectedFiles)) {
			$tpl -> Zone("rejectedFiles", "enabled");
			$tpl -> Loop("rejectedFilesList", $rejectedFiles);
		} else $tpl -> Zone("rejectedFiles", "empty");
	}
		
 	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") ) $tpl -> Zone("filesModule", "guest");


$tpl -> CleanZones();
$tpl -> Flush();
	
?>