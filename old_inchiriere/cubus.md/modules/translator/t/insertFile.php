<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  11.02.2009                                               //
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
		
  		$testData = myF(myQ("SELECT * FROM `[x]translators_translate` WHERE `id`='".$_POST['id']."' LIMIT 1"));
		
		if ($testData['test_original_file']!='') {	
			_fnc("reload", 0, "?L=translator.t.tests&error=fileExist");
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
						myQ("UPDATE `[x]translators_translate` 
						     SET `test_original_file`='".$filename."', `test_original_name`='".$_FILES["file"]["name"]."', `test_status`='1' 
							 WHERE `id`='".$_POST['id']."' 
							 LIMIT 1
						");			
						
						/* Activam ZONE care permita sa apara HTML */
						_fnc("reload", 0, "?L=translator.t.tests&data=success");
 					}				
					/* File extension is not contained in allowed list */
					else  {
	
							_fnc("reload", 0, "?L=translator.t.tests&error=unallowedExtension");
						  }
				}	
				/* File extension is not contained in allowed list */
				else  {
	
						_fnc("reload", 0, "?L=translator.t.tests&error=unallowedExtension");
					  }
			}
 			/*
				Form was submitted with no file?! Nice idea for 
				an upload page... Show error
			*/
			else  {
	
				   		_fnc("reload", 0, "?L=translator.t.tests&error=noFile");
				  }
				  
		// file big then error
		} else  {

					_fnc("reload", 0, "?L=translator.t.tests&error=BigFileSize");
			    }
			  
	} else {
	
	 	_fnc("reload", 0, "?L=translator.t.tests&error=unKnown");
	}
	
 
 	
	$tpl -> CleanZones();
	$tpl -> Flush();
?>