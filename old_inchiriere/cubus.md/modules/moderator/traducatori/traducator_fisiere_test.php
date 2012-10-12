<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  23.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("traducator_fisiere_test");
	$tpl -> GetObjects();
	
		     
	//_fnc("userAcces", $_GET['L']);



########################################################
    /*
         Activam modulele stabile pentru pagina data
    */
########################################################

	if (me('id')) {	
		
		$tpl -> Zone("contModerator",         "enabled");
		$tpl -> Zone("cubusSteps",            "enabled");
		$tpl -> Zone("contacteCubus",         "enabled");
		$tpl -> Zone("traducatorFisiere",     "test");

	} 
	else {
	
	    $tpl -> Zone("traducatorFisiere",     "guest");
		_fnc("reload", 2, "?");
	}
	
	
########################################################
    /*
         Activam lista cu LIMBI
    */
########################################################

	if (me("id") != "" ) {
		
		/*
		    Selectam datele din DB
		*/
		if ( $_GET['edit'] != '' ) {							
		                   
			$editFileData = myF(myQ("
			    SELECT * 
				FROM `[x]traducatori_fisiere_test` 
				WHERE `id` = '".(int)$_GET['edit']."'
		    "));
			
		    setcookie("tabber", 0);
		
		    $tpl -> Zone("editeazaFisiere", "ok");
		
            $tpl -> AssignArray(array("fisier.id" => $editFileData["id"]));
			
			$activEdit = 'disabled';
		
		}	
		else  {
		     
			 $tpl -> Zone("incarcaFisiere", "ok"); 
			 $tpl -> AssignArray(array("fisier.id" => ''));
			 
			 $activEdit = '';
		}
		
		/*
	         Facem LOOP la Lista cu LIMBI 	 
		*/
		$tpl -> Loop("langSelect", _fnc("lang_select", $editFileData['lang_id'], $activEdit));
	}
	 
		
########################################################
    /*
         Procesul de incarcare a fisierului pe server ...
    */
########################################################
	
	if (me("id") != "" ) {
		/*
			Submit occured? Let's handle that!
		*/
		if (isset($_POST["Submit"])) {
			/* 
				We will check if we got a picture, attribute it a name, and
				save it to the temporary directory.
			*/
			if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
				
				if (strstr(basename($_FILES["file"]["name"]), ".")) {
					
					/*
					    Aflam extensia fisierului 
					*/
					$fileChunks = explode(".", basename($_FILES["file"]["name"]));
					$fileExtention = strtolower($fileChunks[count($fileChunks)-1]);
					
					/*
					    Daca extensia este in lista adminisibila de EXTENSII
					*/
					
					if (in_array($fileExtention, explode(",", $CONF["PICTURES_ALLOWED_EXTENTIONS"]))) {
				        
						/*
						     Daca limbile difera si Nu se face UPLOAD a 2 oara
						*/				
						if ( ($_SESSION['filedatacheck']['last_add_file'] != md5($_FILES["file"]["name"].$_POST["lang"])) ) { 
												
						    /*
							     Se creaza SESIUNEA care va controla mai 
								 apoi daca sa facut sau nu UPLOAD la acest document anterion 
							*/
							$_SESSION['filedatacheck']['last_add_file'] = md5($_FILES["file"]["name"].$_POST["lang"]);
							
							/*
							     Atribuim nume facem UPLOAD la file 
							*/
							$filename_db = $_FILES["file"]["name"];
						    $filename = md5(uniqid(time(), 1)) . "." . $fileExtention;
						    move_uploaded_file($_FILES["file"]["tmp_name"], "system/cache/temp/{$filename}");
				
							
							/*
							    Selectam datele din DB
							*/
							if ( $_POST['lang'] != '' ) {
							
								$insertFileData = myF(myQ("
			                        SELECT * 
				                    FROM `[x]traducatori_fisiere_test` 
				                    WHERE `lang_id` = '".$_POST['lang']."'
									LIMIT 1
			                    "));
							}
							
							/* 
							    Save to database 
							*/
							if ( $_POST['edit'] == '' ) { 
							
							    if ( $insertFileData['id'] == '' ) {							
							
							        myQ("
								        INSERT INTO `[x]traducatori_fisiere_test` 
								        (
									        `lang_id`,
									        `fname`,
									        `file_name`,
									        `timeadd`,
									        `statut`,
									        `nr_caractere`
								        )
								        VALUES
								        (
									        '".$_POST["lang"]."',
									        '".$_FILES["file"]["name"]."',
									        '".$filename."',
									        '".date("U")."',
									        '1',
									        '1800'
								        )
							        ");
														
								    /*
							            Activam cookie pentru a schimba TABBER
							        */
							        setcookie("tabber", 1);
							
							        /*
							             Mutam file dintr-un directoriu in altul 
						            */
						            rename("system/cache/temp/{$filename}", "system/cache/traducatori_test/{$filename}");
									
									/*
		                                Activam ZONE care permita sa apara HTML 
		                            */
						            $tpl->Zone("uploadHeader", "success");
							
							        _fnc("reload", 2, "?L=moderator.traducator_fisiere_test&a=1#middle");
								
								}
								else $tpl->Zone("uploadHeader", "selectOtherLANG");
							}
							else if ( $_POST['edit'] != '' ) {
	 
	                			$editFileData = myF(myQ("
                      			    SELECT * 
                    				FROM `[x]traducatori_fisiere_test` 
                     				WHERE `id` = '".(int)$_POST['edit']."'
                     		    "));

								
								myQ("
					                 UPDATE `[x]traducatori_fisiere_test` 
						             SET 
									     `fname`='".$_FILES["file"]["name"]."', 
										 `file_name`='".$filename."', 
										 `timeadd`='".time()."'
						             WHERE `id`='".$_POST['edit']."' 
					            ");		
								
							
			                    /*
			                        STERGEM FILE DE PE SERVER 
			                    */
			                    unlink("system/cache/traducatori_test/".$editFileData['file_name']);
							
							    /*
							           Activam cookie pentru a schimba TABBER
							    */
							    setcookie("tabber", 1);
							
							    /*
							         Mutam file dintr-un directoriu in altul 
						        */
						        rename("system/cache/temp/{$filename}", "system/cache/traducatori_test/{$filename}");
							  
							   
							    /*
		                               Activam ZONE care permita sa apara HTML 
		                        */
						        $tpl->Zone("uploadHeader", "success");
							
							    _fnc("reload", 2, "?L=moderator.traducator_fisiere_test&a=1#middle");								
							}	
					    }  
						elseif ( $_SESSION['filedatacheck']['last_add_file'] != md5($_FILES["file"]["name"].$_POST["lang"]) ) {
						    /*
						        GRESEALA Limbile trebuie sa fie diferite

						    */
						    $tpl->Zone("uploadHeader", "unallowedLang");
					    }
						else {
 
 			                  _fnc("reload", 0, "?L=moderator.traducator_fisiere_test&a=2#middle");
 						}					
					}				
					/*
						File extension is not contained in allowed list
					*/
					else  {
					         $tpl->Zone("uploadHeader", "unallowedExtension");
						  }
				}	
				/*
					File extension is not contained in allowed list
				*/
				else  {
				         $tpl->Zone("uploadHeader", "unallowedExtension");
					  }
			}
			
			/*
				Form was submitted with no file?! Nice idea for 
				an upload page... Show error
			*/
			else  {
			         $tpl->Zone("uploadHeader", "noFile");
				  }
		}
		
	}	
	
	
	

########################################################
	/*
	    Stergem un FISIER 
	*/ 
########################################################
	if ( me('id') ) {	
     
	    ///////////// Modified Main Picture Delete (hack) by Thunder ////////////////////
		if (isset($_GET["rm"])) {
		   
		    $deleteFileName = myF(myQ("
			    SELECT * 
				FROM `[x]traducatori_fisiere_test` 
				WHERE `id` = '".(int)$_GET['rm']."'
			"));
			
			
			myQ("
				DELETE 
				FROM `[x]traducatori_fisiere_test` 
				WHERE `id` = '".$deleteFileName['id']."'
			");
			
			
			/*
			    STERGEM FILE DE PE SERVER 
			*/
			unlink("system/cache/traducatori_test/".$deleteFileName['file_name']);
			
			/*
			    ARATAM CA FILE A FOST STERS SI DIN DB SI DE PE SERVER 
			*/
			$tpl->Zone("filedelete", "success");
			
			_fnc("reload", 2, "?L=moderator.traducator_fisiere_test#middle");
 		}
	}
		



########################################################
	/*
	    Afisam lista de FISIERE  
	*/ 
########################################################
	  
	if ( me('id') ) {	
	  
	    /*
		     Selectam din nou file pentru a le folosi aranja in LISTA 
		*/
		$fileSelect = myQ("
			SELECT *
			FROM `[x]traducatori_fisiere_test`
			ORDER BY `id` DESC
		");
		

		/*
		     Afisam lista cu documente
		*/
		$i=0;
		
		while ($lisFis = myF($fileSelect)) {
		
			/*
			     tipul fisierului 
			*/
			$type_file = _fnc("file_extension", "system/cache/traducatori_test/".$lisFis["file_name"]);
			
 			/*
			     ICON TYPE
			*/
			$img_show = _fnc("icon_type", $type_file);
			
			/*
			     Datele care sunt introduse in HTML 
			*/
			$repFis[$i]["fisier.file"]       = "theme/default/images/icons/office/".$img_show;
			$repFis[$i]["fisier.title"]      = $lisFis["fname"];
			$repFis[$i]["fisier.limba"]      = _fnc("lang_data", $lisFis['lang_id'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
 			$repFis[$i]["fisier.edit.id"]    = $lisFis["id"];
			
			$i++;
		}
			

        /*
		    AFISAM Lista pentru CALCUL PRET 
		*/
		if (isset($repFis) ) {
			
			$tpl -> Zone("listafisiere", "enabled");
			$tpl -> Loop("fislist", $repFis);
		
		}  else $tpl -> Zone("listafisiere", "empty");

  	}
 
 


	$tpl -> CleanZones();
	$tpl -> Flush();
?>