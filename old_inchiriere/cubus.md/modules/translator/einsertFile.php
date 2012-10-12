<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  25.03.2009                                               //
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
		
  		$data = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `unic_id`='".$_POST['id']."' LIMIT 1"));
		
		if ($data['status_file']==40) {	
			_fnc("reload", 0, "?L=translator.files&error=fileExist");
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
						move_uploaded_file($_FILES["file"]["tmp_name"], $CONF["files_folder"].$CONF["edited_files"]."/{$filename}");							
 						
					
						/* ANALIZAM ce facem cu fisierul dupa ce incarcat m traducerea ??? */
						if ($data['translation_method']==1) {
							
							myQ("UPDATE `[x]files` SET `status_file`='70' WHERE `file_id`='".$data['parent_file_id']."' LIMIT 1");									
							$status_file = 40;
						
						} elseif ($data['translation_method']==2) {
						
							myQ("UPDATE `[x]files` SET `status_file`='70' WHERE `file_id`='".$data['parent_file_id']."' LIMIT 1");									
 							$status_file = 40;
						
						} elseif ($data['translation_method']==3) {
						
							myQ("UPDATE `[x]files` SET `status_file`='70' WHERE `file_id`='".$data['parent_file_id']."' LIMIT 1");									
 							$status_file = 40;

						} elseif ($data['translation_method']==4) {
						
							//
						}
  
  					
						/* Save to database */
						myQ("UPDATE `[x]files_to_translator` 
						     SET `edited_file`='".$filename."', `edited_name`='".$_FILES["file"]["name"]."', `status_file`='".$status_file."' 
							 WHERE `unic_id`='".$_POST['id']."' 
							 LIMIT 1
						");			
						
  						/* Activam ZONE care permita sa apara HTML */
						_fnc("reload", 0, "?L=translator.files&data=success");
 					}				
					/* File extension is not contained in allowed list */
					else  {
	
							_fnc("reload", 0, "?L=translator.files&error=unallowedExtension");
						  }
				}	
				/* File extension is not contained in allowed list */
				else  {
	
						_fnc("reload", 0, "?L=translator.files&error=unallowedExtension");
					  }
			}
 			/*
				Form was submitted with no file?! Nice idea for 
				an upload page... Show error
			*/
			else  {
	
				   		_fnc("reload", 0, "?L=translator.files&error=noFile");
				  }
				  
		// file big then error
		} else  {

					_fnc("reload", 0, "?L=translator.files&error=BigFileSize");
			    }
			  
	} else {
	
	 	_fnc("reload", 0, "?L=translator.files&error=unKnown");
	}
	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>