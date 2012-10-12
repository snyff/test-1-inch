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
		
  		$data = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$_POST['id']."' LIMIT 1"));
 		
		if ($data['status_file']==80) {	
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=fileExist");
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
					
							/* Save to database */
							myQ("UPDATE `[x]files` 
								 SET    `edited_file`='".$filename."', `edited_name`='".$_FILES["file"]["name"]."', `status_file`='80', `time80`='".time()."'
								 WHERE  `unic_id`='".$_POST['id']."' 
								 LIMIT  1
							");	
									
					  		$dataEditedFile = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='".$data['file_id']."' LIMIT 1"));
							
							myQ("
								UPDATE `[x]files_to_translator` 
								SET    `status_file`='50' 
								WHERE  `file_id`='".$dataEditedFile['file_id']."' 
								LIMIT  1
							");	
								
						} elseif ($data['translation_method']==2) {
						
							/* Daca exista fisier care trebuie sa fie approbat duap "translation_method 2" facem SELECT */							
							$dataApproveFile = myF(myQ("
								SELECT * FROM `[x]files_to_translator` 
								WHERE `parent_file_id`='".$data['file_id']."' AND `status_file`='40' 
								LIMIT 1
							"));
							
 							if ($dataApproveFile['file_id']!='') {
							
								$dataNewFile = myF(myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_to_translator_id`='".$dataApproveFile['file_id']."' LIMIT 1"));
								
								/* Analizam daca mai este sau nu un fisier sub acesta traducere */
								if ($dataNewFile['file_id']!='') {
								
 									/* Actualul fisier il mutam la 50 */ 
 									myQ("UPDATE `[x]files_to_translator` SET `status_file`='50' WHERE `file_id`='".$dataApproveFile['file_id']."' LIMIT 1");	
									
									/* Viitorul fiiser ii dam drept de traducere */
									myQ("UPDATE `[x]files_to_translator` SET `original_file`='".$filename."', `original_name`='".$_FILES["file"]["name"]."', `status_file`='20' WHERE `file_id`='".$dataNewFile['file_id']."' LIMIT 1");		
									
									/* Fisierul din Files in trecem din nou in traducere */
									myQ("UPDATE `[x]files` SET   `status_file`='50', `time50`='".time()."' WHERE `file_id`='".$dataNewFile['parent_file_id']."' LIMIT 1");	
								
								} else {
								
 									/* Actualul fisier il mutam la 50 */ 
 									myQ("UPDATE `[x]files_to_translator` SET `status_file`='50' WHERE  `file_id`='".$dataApproveFile['file_id']."' LIMIT 1");	
									
									/* Fisierul din Files in trecem din nou in traducere */
									myQ("UPDATE `[x]files` SET `edited_file`='".$filename."', `edited_name`='".$_FILES["file"]["name"]."', `status_file`='80', `time80`='".time()."' WHERE  `unic_id`='".$_POST['id']."' LIMIT  1");	
								}		
 							} 
						
						} elseif ($data['translation_method']==3) {
						
							/* Nu sunt sigur ca pasul 3 e corect  */
							myQ("UPDATE `[x]files` 
								 SET    `edited_file`='".$filename."', `edited_name`='".$_FILES["file"]["name"]."', `status_file`='80', `time80`='".time()."'
								 WHERE  `unic_id`='".$_POST['id']."' 
								 LIMIT  1
							");	
									
					  		$dataEditedFile = myQ("SELECT * FROM `[x]files_to_translator` WHERE `parent_file_id`='".$data['file_id']."'");
							
							while ( $dataEditedF = myF($dataEditedFile) ) {
		
								myQ("
									UPDATE `[x]files_to_translator` 
									SET    `status_file`='50' 
									WHERE  `file_id`='".$dataEditedF['file_id']."' 
									LIMIT  1
								");	
							}

						} elseif ($data['translation_method']==4) {
						
							//
						}
 						
 						
 						/* Activam ZONE care permita sa apara HTML */
						_fnc("reload", 0, "?L=moderator.files.accountsPayment&&data=success");
 					}				
					/* File extension is not contained in allowed list */
					else  {
	
							_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=unallowedExtension");
						  }
				}	
				/* File extension is not contained in allowed list */
				else  {
	
						_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=unallowedExtension");
					  }
			}
 			/*
				Form was submitted with no file?! Nice idea for 
				an upload page... Show error
			*/
			else  {
	
				   		_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noFile");
				  }
				  
		// file big then error
		} else  {

					_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=BigFileSize");
			    }
			  
	} else {
	
	 	_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=unKnown");
	}
	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>