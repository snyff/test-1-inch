<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  12.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template; 
	$tpl -> Load("reload");
	$tpl -> GetObjects();
	
	
########################################################
    /*
         Procesul de incarcare a fisierului pe server ...
    */
########################################################
	
 	/*	Submit occured? Let's handle that! */
	if (isset($_POST["Submit"]) && me("id")!='') {
		
  		$testData = myF(myQ("SELECT * FROM `[x]editor_test_files` WHERE `translation_languages_id`='".$_POST['translation_languages_id']."' LIMIT 1"));
		
		if ($testData['id_etf']!='') {	
			_fnc("reload", 0, "?L=moderator.translators.editorsTests&error=fileExist");
			die;
		}
 		
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
						move_uploaded_file($_FILES["file"]["tmp_name"], $CONF["files_folder"].$CONF["translators_tests"]."/{$filename}");
							
						/* Save to database */
						myQ("INSERT INTO `[x]editor_test_files` (
								`translation_languages_id`, `original_name`, `original_file`, `add_time`								
							) VALUES (								
								'".$_POST['translation_languages_id']."', '".$_FILES["file"]["name"]."', '".$filename."', '".time()."'
							)
						");
						
						/* Activam ZONE care permita sa apara HTML */
						_fnc("reload", 0, "?L=moderator.translators.editorsTests&data=success");
 					}				
					/* File extension is not contained in allowed list */
					else  {
	
							_fnc("reload", 0, "?L=moderator.translators.editorsTests&error=unallowedExtension");
						  }
				}	
				/* File extension is not contained in allowed list */
				else  {
	
						_fnc("reload", 0, "?L=moderator.translators.editorsTests&error=unallowedExtension");
					  }
			}
 			/*
				Form was submitted with no file?! Nice idea for 
				an upload page... Show error
			*/
			else  {
	
					_fnc("reload", 0, "?L=moderator.translators.editorsTests&error=noFile");
				  }
				  
		// file big then error
		} else  {

				_fnc("reload", 0, "?L=moderator.translators.editorsTests&error=BigFileSize");
			  }
			  
	} else {
	
		_fnc("reload", 0, "?L=moderator.translators.editorsTests&error=unKnown");
	}
	
 
 	
	$tpl -> CleanZones();
	$tpl -> Flush();
?>