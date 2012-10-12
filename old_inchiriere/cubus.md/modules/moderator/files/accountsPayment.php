<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  11.03.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("accountsPayment");
	$tpl -> GetObjects();
	
	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("accountPaymentModule", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
 	}	
	 
	if ( me('id') ) {	
	
		include("editFileAccountPayment.php");
		
		/* Controlam daca afisam toate conturile de plata neachitate sau nu mai cele care se fac manual */
		if ($_GET['action'] == 'showAll') $showAP = '';
		else                              $showAP = "AND `payment_type`='0'";
		
		/* Account payment */
		$accountPaymentSelect = myQ("
			SELECT * FROM  `[x]account_payment` 
			WHERE (`account_payment_status`='0' OR `account_payment_status`='10' OR `account_payment_status`='20') ".$showAP."
			ORDER BY `account_payment_id` DESC
		");
		
		/* display account payment */
		$i=0;
		$debt=0;
		while ( $accountPayment = myF($accountPaymentSelect) ) {
		
			$sfiles = myQ("
				SELECT * FROM `[x]files_to_account_payment`, `[x]files`
				WHERE `[x]files`.`file_id` = `[x]files_to_account_payment`.`file_id` AND
					  `[x]files_to_account_payment`.`account_payment_id` = '".$accountPayment['account_payment_id']."'
			");
			
			$y=0;
			$files_str ='';
			while ($files = myF($sfiles)) {
				
				if ( $files['unic_id'] == $_GET['unic_id'] ) { 
					$bgcolor = '#f5f5f5'; 
					$tpl -> AssignArray(array("discount" => bcdiv((100-$files['price_discount']/$files['price']*100), 1, 2)));
				} else $bgcolor = '#ffffff'; 
				
 				/* Controlam daca fisirul are subfisiere in TRADUCERE daca are nu apare butonul EDIT */
				$checkFilePart = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='".$files['file_id']."' LIMIT 1"));
				
				if ($checkFilePart['file_id']=='') $editFile = "<td> &nbsp; <a href='?L=moderator.files.accountsPayment&unic_id=".$files['unic_id']."&action=editFileAccountPayment'><img src=\"".$CONF["img_files"]."/mod_small_edit.png\" /></a></td>"; 
				else                               $editFile = "";
				
				$translatorName = (_fnc("translator_editor_data", $files['translator_id'], 'name')!='')?"<span style=\"background:#009900; color:#ffffff; padding:1px;\">["._fnc("translator_editor_data", $files['translator_id'], 'name')." - ".(($files['translation_deadline']>0)?date("Y/m/d H:i", $files['translation_deadline']):'---')."]</span>":"<span style=\"background:yellow; color:#999999; padding:1px;\">[---]</span>";
				$files_str .= "<tr bgcolor=".$bgcolor."><td><input size=5 value='".$files['original_name']."'> &nbsp;</td><td>-</td><td>&nbsp; <font size=\"1\">( "._fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $files["languages_type"], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ".$translatorName."</font></td>".$editFile."<td> &nbsp; <a href='?L=download.file&chromeless=1&path=".urlencode($CONF["new_files"])."&file=".$files['original_file']."&filename=".$files['original_name']."'><img src=\"".$CONF["img_files"]."/mod_small_download.png\" /></a></td></tr>";
				$y++;
			}
			$accountPaymentFiles = array("{files}" => $files_str);
			
			
			/* Datele care sunt introduse in HTML */
			$accountPaymentList[$i]["accountPayment.nr"]          = $accountPayment['account_payment_id'];
			$accountPaymentList[$i]["accountPayment.unicID"]      = $accountPayment['unic_id'];
			$accountPaymentList[$i]["accountPayment.price"]       = $accountPayment["account_payment_price"];
			$accountPaymentList[$i]["accountPayment.company_id"]  = $accountPayment["company_id"];
			
			if ($accountPayment['account_payment_type']) $accountPaymentList[$i]["accountPayment.type"] = $GLOBALS["OBJ"]["accountPaymentCashAdvance"]; 
			else                                         $accountPaymentList[$i]["accountPayment.type"] = strtr($GLOBALS["OBJ"]["accountPaymentFiles"], $accountPaymentFiles); 
		
			$debt += $accountPayment['account_payment_price'];
			
			$i++;
		}
		
		/* display account payment zone */
		if ( isset($accountPaymentList) ) {
 			$tpl -> Zone("accountPaymentList", "enabled"); 
			$tpl -> Loop("accountPaymentList", $accountPaymentList);
 		} else $tpl -> Zone("accountPaymentList", "empty"); 
		
		 
		
		include("translateFileTools.php");
		include("translateFileSelectTranslator.php");
		include("editFilePart.php");
		include("selectEditor.php");

		/* modulul de fisiere in traducere */
		/* scoatem fisierele din DB si le analizam separat in dependenta de statut */
		$selectFL = myQ("SELECT * FROM `[x]files` WHERE `status_file`='50' OR `status_file`='60' OR `status_file`='70'  ORDER BY `file_id` DESC");		
		$i=0;
		while ($files = myF($selectFL)) {
			
			/* COMPANY DATA */
			$client_data = _fnc("company", $files['company_id'], '', 'html');
			
			/* contact data */
			$clientDataArray = $client_data;
			$clientDataArray["{email}"] = _fnc("user", $files['company_id'], 'email');

 			$files_html = _fnc("array_html", $files);
			$files_html["{file.nrPage}"] = _fnc("pages_nr", $files['characters_nr']);

   			/* fisier data */
			$filesArray[$i]["translation.activ"]    = ($files['unic_id']==$_GET['unic_id'])?$GLOBALS["OBJ"]["translationActive"]:$GLOBALS["OBJ"]["translationInactive"];
			$filesArray[$i]["translation.status"]   = ($files['translation_status']==0)?$GLOBALS["OBJ"]["translationStatusNone"]:$GLOBALS["OBJ"]["translationStatusYes"];
			$filesArray[$i]["file.originalNameH"]   = $files['original_name'];
			$filesArray[$i]["file.translateFrom"]   = _fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["file.translateTo"]     = _fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["file.type"]            = _fnc("file_type", _fnc("translation", $files["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["file.company_id"]      = $files['company_id'];
			$filesArray[$i]["description"]          = $files['description'];
			$filesArray[$i]["file.price"]           = ($files["price_discount"]>0?'<font color="green"><b>'.$files["price_discount"].'</b></font>':(in_array($extension, $extension_array)?$GLOBALS["OBJ"]["calcPriceAuto"]:$GLOBALS["OBJ"]["calcPriceManual"]));
			$filesArray[$i]["nrPages.nrCharacters"] = ($files["price_discount"]>0)?strtr($GLOBALS["OBJ"]["nrPagesnrCharactersYes"], $files_html):$GLOBALS["OBJ"]["nrPagesnrCharactersNo"];
			$filesArray[$i]["file_unic_id"]         = $files["unic_id"];
			$filesArray[$i]["file.path"]            = urlencode($CONF["new_files"]);
			$filesArray[$i]["file.originalName"]    = urlencode($files["original_name"]);
			$filesArray[$i]["file.originalFile"]    = urlencode($files["original_file"]);
			$filesArray[$i]["client.data"]          = (_fnc("user", $files['company_id'], 'user_type')==1)?strtr($GLOBALS["OBJ"]["companyData"], $clientDataArray):strtr($GLOBALS["OBJ"]["personData"], $clientDataArray);
			
			$selectFTT = myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='".$files["file_id"]."' ORDER BY `file_id` ASC");		
 			$tfiles_str='';
 			$efiles_str='';
 			$afiles_str='';
			$fileWasAdded = 1;  
			$addSpace = '';
			while ($filesFTT = myF($selectFTT)) {
				
				/* Scoatem FROM LANGUAGE la primuyl fisier ca sa putem compara mai jos */
				if ( $filesFTT['parent_file_to_translator_id'] == 0 ) {
					
					$firstFileFromLanguages = _fnc("translation", $filesFTT["languages_type"], 'from_language');  
					$firstFileFileType      = _fnc("translation", $filesFTT["languages_type"], 'file_type');
				}
				
				if ($filesFTT['translation_type']==1) $filePartUnicID = $filesFTT['unic_id'];
				else                                  $filePartUnicID = '';
				
				if ($filesFTT['ft_price']==0) $bgcolor = '#CC00FF'; 
				else                          $bgcolor = '#ffffff'; 
				
				
				$filePartParentCheck = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_to_translator_id`='".$filesFTT['file_id']."' LIMIT 1"));
				$filePartLanguagesType = myF(myQ("
					SELECT * FROM `[x]translation_languages` 
					WHERE `from_language` ='".$firstFileFromLanguages."' AND 
						  `to_language`   ='"._fnc("translation", $filesFTT["languages_type"], 'to_language')."' AND 
						  `file_type`     ='".$firstFileFileType."'   
					LIMIT 1
				"));
				

				$deleteFilePart   = " &nbsp;<a href=?L=moderator.files.deleteFilePart&unic_id=".$files['unic_id']."&filePartUnicID=".$filesFTT['unic_id']."&chromeless=1><img align=\"absmiddle\" src=\"theme/default/components/images/delete1.png\"></a>";
				$addFilePart      = " &nbsp;<a href=?L=moderator.files.accountsPayment&unic_id=".$files['unic_id']."&action=translateFileTools&filePartUnicID=".$filePartUnicID."><img align=\"absmiddle\" src=\"theme/default/components/images/add_button1.png\"></a>";
				$teditFilePart    = "&nbsp;<a href=?L=moderator.files.accountsPayment&unic_id=".$files['unic_id']."&action=editFilePart&filePartUnicID=".$filesFTT['unic_id']."><img align=\"absmiddle\" src=\"theme/default/components/images/file_edit.png\"></a>";
				$eeditFilePart    = "&nbsp;<a href=?L=moderator.files.accountsPayment&unic_id=".$files['unic_id']."&filePartUnicID=".$filesFTT['unic_id']."&action=selectEditor><img align=\"absmiddle\" src=\"theme/default/components/images/file_edit.png\"></a>";
				$dontEditFilePart = "&nbsp;<a href=?L=moderator.files.filePartTranslatorToEditor&parent_file_id=".$filesFTT['parent_file_id']."&filePartUnicID=".$filesFTT['unic_id']."&chromeless=1>".$GLOBALS["OBJ"]["dontEditFilePart"]."</a>";
				$translatorName   = (_fnc("translator_editor_data", $filesFTT['translator_id'], 'name')!='')?"<span style=\"background:#009900; color:#ffffff; padding:1px;\"><font size=1>["._fnc("translator_editor_data", $filesFTT['translator_id'], 'name')." - ".date("Y/m/d H:i", $filesFTT['translation_deadline'])."]</font></span>":"<span style=\"background:yellow; color:#999999; padding:1px;\"><font size=1>[---]</font></span>";
				$editorName       = (_fnc("translator_editor_data", $filesFTT['editor_id'], 'name')!='')?"<span style=\"background:#009900; color:#ffffff; padding:1px;\"><font size=1>["._fnc("translator_editor_data", $filesFTT['editor_id'], 'name')." - ".date("Y/m/d H:i", $filesFTT['edit_deadline'])."]</font></span>":"<span style=\"background:yellow; color:#999999; padding:1px;\"><font size=1>[---]</font></span>";

				
				if ( $files['languages_type'] == $filePartLanguagesType['id'] ) {
					
					$addFilePart    = '';
					$deleteFilePart = $deleteFilePart;
					
					/* Daca fisierele sunt cele originale si nu au fost adaugate altele => */					
					if ( $filesFTT['translation_type']==1 ) $fileWasAdded = 1; // trebuie sa apara buton (+) pentru fisier 
					else                                    $fileWasAdded = 2; // nu trebuie sa apara buton (+) pentru fisier 

				} elseif ( $files['languages_type'] != $filesFTT['languages_type'] && $filePartParentCheck['file_id']>0 ) {
					
					$addFilePart    = '';
					$deleteFilePart = '';
					
 				} else {
				
					if ( $filesFTT['translation_type']==1 ) {
						
						$addFilePart    = $addFilePart;
						$deleteFilePart = $deleteFilePart;

					} else {
					
 						$addFilePart    = '';
						$deleteFilePart = $deleteFilePart;
					}
				}
				
				$downloadTFileArr = array();
				$downloadTFileArr["{translation.path}"]     = urlencode($CONF["translated_files"]);
				$downloadTFileArr["{file.translationFile}"] = $filesFTT['translation_file'];
				$downloadTFileArr["{file.translationName}"] = $filesFTT['translation_name'];
				
				$downloadEFileArr = array();
				$downloadEFileArr["{edit.path}"]            = urlencode($CONF["edited_files"]);
				$downloadEFileArr["{file.editFile}"]        = $filesFTT['edited_file'];
				$downloadEFileArr["{file.editName}"]        = $filesFTT['edited_name'];
				
				if ( $files['status_file'] == 70 ) {
					$addFilePart     = '';
					$deleteFilePart  = '';
					$editFilePart    = '';
					$downloadTFiles  = strtr($GLOBALS["OBJ"]["downloadTFiles"], $downloadTFileArr);
					if ( $filesFTT['edited_file']!='' ) $downloadEFiles  = strtr($GLOBALS["OBJ"]["downloadEFiles"], $downloadEFileArr);
				} 
				
				/* Daca fisierul in traducere estye de tip 2 atunci facem ca sa apara corect file in traducere */
				if ( $filesFTT['translation_method']==2 && $filesFTT['parent_file_to_translator_id']>0 ) {
				
					$addSpace .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				} 				
				$tfiles_str .= "<tr bgcolor=".$bgcolor."><td>".$addSpace."|--- <input size=5 value='".$filesFTT['original_name']."'> &nbsp;</td><td>-</td><td>&nbsp; <font size=\"1\">( "._fnc("languages", _fnc("translation", $filesFTT["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $filesFTT["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $filesFTT["languages_type"], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font> ".$translatorName."".$teditFilePart."".$deleteFilePart."".$addFilePart."".$downloadFiles."  </td></tr>";
				$efiles_str .= "<tr bgcolor=".$bgcolor."><td>".$addSpace."|--- <input size=5 value='".$filesFTT['original_name']."'> &nbsp;</td><td>-</td><td>&nbsp; <font size=\"1\">( "._fnc("languages", _fnc("translation", $filesFTT["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $filesFTT["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $filesFTT["languages_type"], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font> ".$editorName."".$eeditFilePart."".$dontEditFilePart."  </td></tr>";
				$afiles_str .= "<tr bgcolor=".$bgcolor."><td>".$addSpace."|--- <input size=5 value='".$filesFTT['original_name']."'> &nbsp;</td><td>-</td><td>&nbsp; <font size=\"1\">( "._fnc("languages", _fnc("translation", $filesFTT["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $filesFTT["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $filesFTT["languages_type"], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font> ".$downloadTFiles."".$downloadEFiles." </td></tr>";
			}
			
 			
			$fileWasAddedArray["{file_unic_id}"]   = $files["unic_id"];;
			$filesArray[$i]["obj.add.file.button"] = ($fileWasAdded==1)?strtr($GLOBALS["OBJ"]["addFileButton"], $fileWasAddedArray):'';
 			$filesArray[$i]["tfiles.part"]         = $tfiles_str;
 			$filesArray[$i]["efiles.part"]         = $efiles_str;
 			$filesArray[$i]["afiles.part"]         = $afiles_str;
			
 
 			/* Separam fisierele aprobate de cele neaprobate */
			if ( $files['status_file'] == 50 ) $filesInTranslation[] = $filesArray[$i];
			if ( $files['status_file'] == 60 ) $filesEditor[]        = $filesArray[$i];
			if ( $files['status_file'] == 70 ) $filesApprove[]       = $filesArray[$i];
			
			$i++;
		}
		
		if (isset($filesInTranslation)) {
			$tpl -> Zone("filesInTranslation", "enabled");
			$tpl -> Loop("filesInTranslationList", $filesInTranslation);
		} else $tpl -> Zone("filesInTranslation", "empty");
		
 
  		if (is_array($filesEditor)) {
			$tpl -> Zone("editFiles", "enabled");
			$tpl -> Loop("editFilesList", $filesEditor);
		} else $tpl -> Zone("editFiles", "empty");
		
	
		if (isset($filesApprove)) {
			$tpl -> Zone("filesApprove", "enabled");
			$tpl -> Loop("filesApproveList", $filesApprove);
		} else $tpl -> Zone("filesApprove", "empty");
		
 
		
		// Procesul de editare a fisierelor 
		/* scoatem fisierele din DB si le analizam separat in dependenta de statut */
		
		$selectE = myQ("SELECT * FROM `[x]files_to_translator` WHERE `status_file`='30' ORDER BY `file_id` DESC");		
		$i=0;
		$filesArray = '';
		while ($filesE = myF($selectE)) {
			
 			/* COMPANY DATA */
			$client_data = _fnc("company", $filesE['company_id'], '', 'html');
			
 			/* contact data */
			$clientDataArray = $client_data;
			$clientDataArray["{email}"] = _fnc("user", $files['company_id'], 'email');

 			$files_html                  = _fnc("array_html", $filesE);
			$files_html["{file.nrPage}"] = _fnc("pages_nr", $filesE['characters_nr']);
			
   			/* fisier data */
			$filesArray[$i]["file.originalNameH"]   = $filesE['translation_name'];
			$filesArray[$i]["file.translateFrom"]   = _fnc("languages", _fnc("translation", $filesE["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["file.translateTo"]     = _fnc("languages", _fnc("translation", $filesE["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["file.type"]            = _fnc("file_type", _fnc("translation", $filesE["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
			$filesArray[$i]["description"]          = $filesE['description'];
			$filesArray[$i]["file.price"]           = $filesE["ft_price_discount"];
 			$filesArray[$i]["unic_id"]              = $filesE["unic_id"];
			$filesArray[$i]["file.path"]            = urlencode($CONF["translated_files"]);
			$filesArray[$i]["file.originalName"]    = urlencode($filesE["translation_name"]);
			$filesArray[$i]["file.originalFile"]    = urlencode($filesE["translation_file"]);
			$filesArray[$i]["client.data"]          = (_fnc("user", $filesE['company_id'], 'user_type')==1)?strtr($GLOBALS["OBJ"]["companyData"], $clientDataArray):strtr($GLOBALS["OBJ"]["personData"], $clientDataArray);
			
  			/* Separam fisierele aprobate de cele neaprobate */
			$i++;
		}
  	}
	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>