<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  18.03.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

########################################################
    /*****/
########################################################
 		
	$file_unic_id              = $_GET["unic_id"];
	$file_part_unic_id         = $_GET["filePartUnicID"];
	$file_action               = $_GET["action"];
	$file_sub_action           = $_GET["sub_action"];
	$file_tranlsation_language = $_POST["type_file"];
	$file_translator           = $_POST["translator"];
	$file_deadline             = $_POST["deadline"];
	
	if (me('id') && $file_unic_id!='' && $file_action=='translateFileSelectTranslator') {
  		
		/* Scoatem datele despre acest fisier din BD si sub fisierele lui */
		$files_array = _fnc("files_translation", $file_unic_id, $file_sub_action);
 
		/* Extragem datele despre tipul traducerii care a fost incarcata prin post */
		$tData = myF(myQ("SELECT * FROM `[x]translation_languages` WHERE `id`='".$file_tranlsation_language."' LIMIT 1"));
		
		/* Scoatem datele despre fisierul care se da in traducere */
 		$selectF = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='".$file_unic_id."' LIMIT 1"));
				
		/* Se cotroleaza daca este POST si daca este se face insert de date in DB */
		if ($file_translator!='' && $file_translator!=0 ) {
		
			/* Se genereaza un cod UNIC care se va folosi ca ID in Tabela */
			$unic_id = rand(100,999).rand(100,999).rand(100,999).time();
			
			/* Se genereaza DEADLINE din POST */
			$translation_deadline = strtotime($file_deadline);
			
			/* Se creeaza niste variabile */
			$company_id     = $selectF['company_id'];
			$parent_file_id = $selectF['file_id'];
			$parent_file_to_translator_id = $files_array['file_id'];			
			if ($parent_file_id==$parent_file_to_translator_id) $parent_file_to_translator_id =0;
			
			/* Se incepe portiunea cu SUBMIT */
			$original_file = '';
			$original_name = '';
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
								move_uploaded_file($_FILES["file"]["tmp_name"], $CONF["files_folder"].$CONF["new_files"]."/{$filename}");
																
								/* Se creeaza niste variabile care le vom putea folosi mai jos */
								$original_file     = $filename;
								$original_name     = $_FILES["file"]["name"];
								$price             = 0;
								$price_discount    = 0;
								$salary_translator = 0;
								$translation_type  = 1;
  							}				
							/* File extension is not contained in allowed list */
							else  {
			
								_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=unallowedExtension");
								die;
							}
						}	
						/* File extension is not contained in allowed list */
						else  {
			
							_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=unallowedExtension");
							die;
						}
					
					} elseif ($file_sub_action=='addNewFile') {
				
						_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noFile");
						die;
					}
				} 					  
			}  
			
			/* GENERAM NISTE VARIABILE CARE mie nu chiar imi plac e prea complicat sigur este o modalitate mai simpla */
			if ($original_name=='' && !isset($files_array['parent_file_id'])) {
				
				$original_name     = $selectF['original_name'];
				$original_file     = $selectF['original_file'];
				$price             = $selectF['price'];
				$price_discount    = $selectF['price_discount'];
				$salary_translator = _fnc("translator_salary", $selectF['price'], $file_translator, $file_tranlsation_language);
				$translation_type  = 0;

  			} elseif ($original_name=='' && isset($files_array['parent_file_id']) && $files_array['parent_file_id']!='') {
			
				$original_name     = $files_array['original_name'];
				$original_file     = $files_array['original_file'];
				$price             = $files_array['ft_price'];
				$price_discount    = $files_array['ft_price_discount'];
				$salary_translator = $files_array['salary_translator'];
				
					if ($files_array['translation_type']==0) $translation_type  = 0;
				elseif ($files_array['translation_type']==1) $translation_type  = 1;
			}
 			
			/* CREEM Status File */
				if ($translation_type==1)             $status_file = 0;
			elseif ($parent_file_to_translator_id>0)  $status_file = 10;
			elseif ($parent_file_to_translator_id==0) $status_file = 20; 
			
 			
			/* Analizam translation Method prin ce metoda se va face traducerea */
 				if ($translation_type==0 && $selectF['languages_type']==$file_tranlsation_language) $translation_method = 1;
			elseif ($translation_type==0 && $selectF['languages_type']!=$file_tranlsation_language) $translation_method = 2;
			elseif ($translation_type==1 && $selectF['languages_type']==$file_tranlsation_language) $translation_method = 3;
			elseif ($translation_type==1 && $selectF['languages_type']!=$file_tranlsation_language) $translation_method = 4;
 
 		
			/* insert to database a new file */
			myQ("INSERT INTO `[x]files_to_translator` (			
					`unic_id`, `company_id`, `original_name`, `original_file`, `parent_file_id`, `parent_file_to_translator_id`, `translator_id`, `languages_type`, `status_file`,  
					`addtime`, `translation_deadline`, `ft_price`, `ft_price_discount`, `salary_translator`, `translation_type`, `translation_method`				
				) VALUES (				 
					'".$unic_id."', '".$company_id."', '".$original_name."', '".$original_file."', '".$parent_file_id."', '".$parent_file_to_translator_id."', '".$file_translator."', '".$file_tranlsation_language."', '".$status_file."', 
					'".time()."', '".$translation_deadline."', '".$price."', '".$price_discount."', '".$salary_translator."', '".$translation_type."', '".$translation_method."'
				)
			");	
			
			
			/* Adaugam si in tabela FILES metoda prin care are loc traducerea fisierului */
			$filePart = myF(myQ("SELECT * FROM `[x]files_to_translator` where `file_id`='".mysql_insert_id()."' LIMIT 1"));
			myQ("UPDATE `[x]files` SET `translation_method`='".$translation_method."' WHERE `file_id`='".$filePart['parent_file_id']."' LIMIT 1");
			
 			
			/* Se determina unde se va face RELOAD PAGE in dependenda de ce tip de fisier a fost adaugat */
			if ($translation_type==1) {
			
				$filePartUnicID = "&filePartUnicID=".$filePart['unic_id']; 
 				myQ("UPDATE `[x]files` SET `translation_status`='0' WHERE `file_id`='".$filePart['parent_file_id']."' LIMIT 1");
		
			} else $filePartUnicID = '';	
 			
			 
			$selectFTLM = myF(myQ("
				SELECT * FROM `[x]translation_languages` 
				WHERE `from_language`='"._fnc("translation", $selectF['languages_type'], 'from_language')."' AND `to_language`='"._fnc("translation", $file_tranlsation_language, 'to_language')."' AND `file_type`='"._fnc("translation", $selectF['languages_type'], 'file_type')."' 
				LIMIT 1
			"));
			
			
 			if ($selectF['languages_type']==$selectFTLM['id']) { 
			
				if ( ($filePart['ft_price']>0 && $translation_type==1) || $translation_type==0 ) {
					
					myQ("UPDATE `[x]files` SET `translation_status`='1' WHERE `unic_id`='".$file_unic_id."' LIMIT 1");
					_fnc("reload", 0, "?L=moderator.files.accountsPayment&update_tsm=ok");
					die;
				
				} else { 
				
					_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noPriceCalc");
					die;
				}
				 
 			} else { 
			
				_fnc("reload", 0, "?L=moderator.files.accountsPayment&unic_id=".$file_unic_id."&action=translateFileTools".$filePartUnicID);
				die;
			}

			/* Analizam cum a fost distribuit fisierul la traducatori si vedem ce se intimpla */
			echo 'de aici orientam catre pagina cu fisiere sau catre adaugarea unei noi limbi...';
			//die;

		} elseif ( isset($file_translator) ) {
		
			echo 'Eroare aici rebuie sa fie selectat un traducator mai intii';
			_fnc("reload", 0, "?L=moderator.files.accountsPayment&error=noTranslator");
			die;
		}
				
		
		$tpl -> Zone("translateFileSelectTranslator", "selecttranslator");		
		if ( !isset($files_array['parent_file_id']) ) $tpl -> Zone("translatePartFile", "upload");

		//if ( $files_array['translation_type']==1 ) $tpl -> Zone("translatePartFile", "enabled");
		
 		
		/* ||| */
		$tpl->AssignArray(array(
			"from_language"    => _fnc("languages", $tData['from_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"to_language"      => _fnc("languages", $tData['to_language'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"file_type.name"   => _fnc("file_type", $tData['file_type'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
			"discount"         => bcdiv((100-$selectF['price_discount']/$selectF['price']*100), 1, 2),
			"deadline"         => ($selectF['translation_deadline']=='')?date("Y/m/d H:i"):date("Y/m/d H:i", $selectF['translation_deadline']),
			"unic_id"          => $selectF['unic_id'],
			"filePartUnicID"   => $file_part_unic_id,
			"file_type"        => $tData['id'],
			"partFile.name"    => $files_array['original_name'],
			"sub_action"       => $file_sub_action,
 		));

 		$i=1;
		$selectTranslator = myQ("
			SELECT * FROM `[x]translators_translate`, `[x]translators`
			WHERE `[x]translators_translate`.`translation_id`='".$tData['id']."' AND `[x]translators_translate`.`translation_active`='0' AND
			      `[x]translators_translate`.`translator_id`=`[x]translators`.`id` AND `[x]translators_translate`.`test_status`='2'
		");
		while ($selectT = myF($selectTranslator)) {
			
			$sTranslator[$i]["translator.id"] = $selectT['translator_id'];
			$sTranslator[$i]["translator"]    = $selectT['name'];			
			$sTranslator[$i]["selected"]      = ($selectFT['translator_id']!='' && $selectFT['translator_id']==$selectT['translator_id'])?' selected="selected" ':'';
			$i++;
		}
		if (isset($sTranslator)) $tpl -> Loop("loopFTranslator", $sTranslator); 
		else {
		
			/* Traducator */
			$sTranslator[0]["translator.id"] = 0;
			$sTranslator[0]["translator"]    = '------------------';
			$sTranslator[0]["selected"]      = '';
			
			$tpl -> Loop("loopFTranslator", $sTranslator); 
		}
	} 
?>