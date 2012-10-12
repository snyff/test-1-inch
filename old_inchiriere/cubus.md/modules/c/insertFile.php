<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  04.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

function do_post_request($url, $postdata, $files = null)
{
    $data = "";
    $boundary = "---------------------".substr(md5(rand(0,32000)), 0, 10);
      
    //Collect Postdata
    foreach($postdata as $key => $val)
    {
        $data .= "--$boundary\r\n";
        $data .= "Content-Disposition: form-data; name=\"".$key."\"\r\n";
		$data .= "\r\n";
		$data .= $val;
		$data .= "\r\n";
    }
   
    //Collect Filedata
    foreach($files as $key => $file)
    {
	    $data .= "--$boundary\r\n";
        $data .= "Content-Disposition: form-data; name=\"{$key}\"; filename=\"{$file['name']}\"\r\n";
        $data .= "Content-Type: application/octet-stream\r\n";
        //$data .= "Content-Transfer-Encoding: binary\r\n";
        $data .= "\r\n";
        $data .= file_get_contents($file['tmp_name']);
        $data .= "\r\n";
    }
    $data .= "--$boundary--";
 
 	$data_len = strlen($data);
	return file_get_contents($url, false, stream_context_create(array(
		'http' => array(
			'method' => 'POST', 
			'header' => "Host: api.logicsoft.md\r\nConnection: close\r\nContent-Length: $data_len\r\nContent-Type: multipart/form-data; boundary=$boundary", 
			'content' => $data
		)
	)));
    $params = array('http' => array(
           'method' => 'POST',
           'header' => "Content-Type: multipart/form-data; boundary=$boundary\r\n".
		   		"Content-Length: $data_len\r\n",
           'content' => $data
        ));
	//echo $params['http']['header'];
	//echo $params['http']['content'];
	//die();
   $ctx = stream_context_create($params);
   $fp = fopen($url, 'rb', false, $ctx);
  
   if (!$fp) {
      throw new Exception("Problem with $url, $php_errormsg");
   }
 
   $response = @stream_get_contents($fp);
   if ($response === false) {
      throw new Exception("Problem reading data from $url, $php_errormsg");
   }
   return $response;
}

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
						
						$unic_id = rand(100,999).rand(100,999).rand(100,999).time();
						
						if ( me("id")=='' ) {
						
							/* Cream un ID unic care il vom folosi la recunoasterea informatiei companiei date */						
							if ( $_SESSION['temporary_files_id']=='' && !isset($_SESSION['temporary_files_id']) && me("id")=='' ) {
							
								$_SESSION['temporary_files_id'] = rand(100,999).rand(100,999).rand(100,999).time();
							}							
						
							/* Save to database */
							myQ("INSERT INTO `[x]files` (
							
									`unic_id`, `original_name`, `languages_type`, `description`, `original_file`, 
									`time0`, `status_file`, `characters_nr`, `temporary_id`, `company_id`
								
								) VALUES (
								
									'".$unic_id."', '".$_FILES["file"]["name"]."', '".$_POST['file_types']."',
									 '".$_POST["description"]."', '".$filename."',
									'"._fnc("time_creator", '')."', '0', '0', '".$_SESSION['temporary_files_id']."', '0'
								)
							");
							
						} else {

							/* Save to database */
							myQ("INSERT INTO `[x]files` (
								
									`unic_id`, `original_name`, `languages_type`, `description`, `original_file`,
									`time0`, `status_file`, `characters_nr`, `temporary_id`, `company_id`
								
								) VALUES (
								
									'".$unic_id."', '".$_FILES["file"]["name"]."', '".$_POST['file_types']."',
									'".$_POST["description"]."', '".$filename."', 
									'"._fnc("time_creator", '')."', '0', '0', '', '".me('id')."'
								)
							");
						}
						
						$reg = '/\.(pdf|doc)$/i';
						if (preg_match($reg, basename($filename))) {
							$content = file_get_contents("http://api.logicsoft.md/wordcount.php?url=http://www.cubus.md/sys/pictures/$filename");
							$json = json_decode($content, true);
							if ($json !== NULL) {
								file_get_contents("http://www.cubus.md/?L=moderator.files.countPriceFile&chromeless=1&coco=1&FileName=$filename&CCount=$json[chars]");
							}
						}
						/* selectam ultimul fisier adaugat */
						$files = myF(myQ("SELECT * FROM `[x]files` where `file_id`='".mysql_insert_id()."' LIMIT 1"));
						
						
						/* trimitem mailuri la companie care anunta ca a incarcat un nou fisier */
						if ( me("id") && $CONF["COMPANY_MAIL_ALERT"] && $CONF["COMPANY_MAIL_ALERT_NEW_FILE"]) {
							
							$dataToMailArray = array(
								"siteName"          => $CONF["SITE_NAME"],
								"siteUrl"           => "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']),
								"company.name"      => _fnc("company", $files['company_id'], 'name'),
								"file.name"         => $files['original_name'],
								"translate.from"    => _fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
								"translate.to"      => _fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'),   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
								"file.type"         => _fnc("file_type", _fnc("translation", $files["languages_type"], 'file_type'),     $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),				
								"companyTelNumbers" => $CONF["COMPANY_TEL_NUMBERS"],	
								"companyFaxNumbers" => $CONF["COMPANY_FAX_NUMBERS"],	
								"companyEmail"      => $CONF["COMPANY_EMAIL"]
							);
							
							_fnc("sendMail", "new_file_upload_company.tpl", $dataToMailArray, me("email"));
						}
						
						
						/* trimitem mailuri care anunta ca sa incarcat un nou fisier */
						if ( $CONF["EMPROYEES_MAIL_ALERT"] && $CONF["EMPROYEES_MAIL_LIST"]!='' ) {
						
							$empl_array = explode(",", $CONF["EMPROYEES_MAIL_LIST"]);
							foreach ($empl_array as $key => $val) { _fnc("sendMail", "new_file_upload.tpl", "", trim($val)); }
						}						
						
						/* Activam ZONE care permita sa apara HTML */
						if ( me("id") ) _fnc("reload", 0, "?data=success");
						else            _fnc("reload", 0, "?upload=ok");
	
					}				
					/* File extension is not contained in allowed list */
					else  {
	
							_fnc("reload", 0, "?error=unallowedExtension");
						  }
				}	
				/* File extension is not contained in allowed list */
				else  {
	
						_fnc("reload", 0, "?error=unallowedExtension");
					  }
			}
			
			/*
				Form was submitted with no file?! Nice idea for 
				an upload page... Show error
			*/
			else  {
	
					_fnc("reload", 0, "?error=noFile");
				  }
				  
		// file big then error
		} else  {

				_fnc("reload", 0, "?error=BigFileSize");
			  }
			  
	} else {
	
		_fnc("reload", 0, "?");
	}
	
 
 	
	$tpl -> CleanZones();
	$tpl -> Flush();
?>