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
	$tpl -> Load("forTranslators");
	$tpl -> GetObjects(); 
		
		$tpl->Zone("contactData", "enabled"); 
		
			
			
			if ( $_GET['error'] == 'noFile' )             { $tpl->Zone("uploadHeader",   "noFile"); } 	
		elseif ( $_GET['error'] == 'unallowedExtension' ) { $tpl->Zone("uploadHeader",   "unallowedExtension"); } 	
		elseif ( $_GET['error'] == 'BigFileSize' )        { $tpl->Zone("uploadHeader",   "BigFileSize"); } 	
		elseif ( $_GET['error'] == 'pricenotcalc' )       { $tpl->Zone("accountPayment", "pricenotcalc"); } 	
		elseif ( $_GET['error'] == 'noFileSelected' )     { $tpl->Zone("accountPayment", "noFileSelected"); } 	
		elseif ( $_GET['error'] == 'fileIsInAP' )         { $tpl->Zone("accountPayment", "fileIsInAP"); } 	
		elseif ( $_GET['error'] == 'noDataInAP' )         { $tpl->Zone("accountPayment", "noDataInAP"); } 	
		elseif ( $_GET['error'] == 'noNumAP' )            { $tpl->Zone("accountPayment", "noNumAP"); } 	
		elseif ( $_GET['error'] == 'noCompanyName' )      { $tpl->Zone("accountPayment", "noCompanyName"); } 	
		elseif ( $_GET['data']  == 'success' )            { $tpl->Zone("uploadHeader",   "ok"); } 	


 	
		/*	Submit occured? Let's handle that! */
		if (isset($_POST["Submit"])) {
			
			if ( $_FILES['file']['size'] <= $CONF["MAX_UPLOAD_FILE_SIZE"] ) {
				/* 
					We will check if we got a picture, attribute it a name, and
					save it to the temporary directory.
				*/
				if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
					
					if (strstr(basename($_FILES["file"]["name"]), ".")) {
						
						/* Aflam extensia fisierului */
						$fileChunks = explode(".", basename($_FILES["file"]["name"]));
						$fileExtention = strtolower($fileChunks[count($fileChunks)-1]);
						
						/* Daca extensia este in lista adminisibila de EXTENSII	*/
						if (in_array($fileExtention, explode(",", $CONF["PICTURES_ALLOWED_EXTENTIONS"]))) {
							
												
							/* Atribuim nume facem UPLOAD la file */
							$filename = md5(uniqid(time(), 1)) . "." . $fileExtention;
							move_uploaded_file($_FILES["file"]["tmp_name"], $CONF["files_folder"].$CONF["translators_cv"]."/{$filename}");
							
	
 							/* trimitem mailuri care anunta ca sa incarcat un nou fisier */
							if ( $CONF["EMPROYEES_MAIL_ALERT"] && $CONF["EMPROYEES_MAIL_LIST"]!='' ) {
							
								$empl_array = explode(",", $CONF["EMPROYEES_MAIL_LIST"]);
								foreach ($empl_array as $key => $val) { _fnc("sendMail", "new_cv_traducator.tpl", "", trim($val)); }
							}						
							
							/* Activam ZONE care permita sa apara HTML */
							_fnc("reload", 0, "?L=page.forTranslators&data=success");
		
						}				
						/* File extension is not contained in allowed list */
						else  {
		
								_fnc("reload", 0, "?L=page.forTranslators&error=unallowedExtension");
							  }
					}	
					/* File extension is not contained in allowed list */
					else  {
		
							_fnc("reload", 0, "?L=page.forTranslators&error=unallowedExtension");
						  }
				}
				
				/*
					Form was submitted with no file?! Nice idea for 
					an upload page... Show error
				*/
				else  {
		
						_fnc("reload", 0, "?L=page.forTranslators&error=noFile");
					  }
					  
			// file big then error
			} else  {
	
					_fnc("reload", 0, "?L=page.forTranslators&error=BigFileSize");
				  }
				  
		}  
		
 
		
		
    
	$tpl -> CleanZones();
	$tpl -> Flush();

?>