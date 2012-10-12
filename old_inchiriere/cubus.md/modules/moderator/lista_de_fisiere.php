<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  27.11.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2008  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("lista_de_fisiere");
	$tpl -> GetObjects();
	

	// SELECT files from server => put to browser. 	
	if ( me('id') && $_GET['chromeless'] == 0 ) {	
		
		$tpl -> Zone("uploadPicture", "enabled");
		$tpl -> Zone("cubusSteps",    "enabled");
		$tpl -> Zone("contacteCubus", "enabled");
		$tpl -> Zone("contModerator", "enabled");
	
	} else if ( $_GET['chromeless'] == 0 )  $tpl -> Zone("checkContPlata", "guest");



########################################################
    /*
         ANALIZAM fisierele care trebuie sa se stearga automat din lista LISTA FISIERE RECENTE
    */
########################################################
	
	if ( me('id') && $_GET['sterge_fisierul'] != '' ) {	

		$fisiereStergereManuala = myF(myQ("
			SELECT *
			FROM `[x]files`
			WHERE `id` = '".$_GET['sterge_fisierul']."'
			LIMIT 1
		"));
		
		 myQ("
			 DELETE 
			 FROM `[x]files` 
			 WHERE `id` = '".$_GET['sterge_fisierul']."'
			 LIMIT 1
		 ");
		 
		 unlink("system/cache/pictures/".$fisiereStergereManuala['file_name']);				  
		 
		 _fnc("reload", 0, "?L=moderator.lista_de_fisiere");
		 die;
	}
	



########################################################
    /*
         ANALIZAM fisierele care trebuie sa se stearga automat din lista LISTA FISIERE RECENTE
    */
########################################################
	
	if ( me('id') && $_GET['chromeless'] == 0 ) {	

		$fisiereRecenteStergere = myQ("
			SELECT *
			FROM `[x]files`
			WHERE `approved` = '1' 
		");
		
		
		/*
		    Analizam daca au trecut 15 zile de cind sa incarcat fisierul
		*/
		$i=0;
		while ($fisiereCStergere = myF($fisiereRecenteStergere)) {
			
			//echo (time()-_fnc("checkTime", $fisiereCStergere['timeadd'], 10, 'zile'));
			
			if ( ((time()-_fnc("checkTime", $fisiereCStergere['timeadd'], 10, 'zile')) > 0)  ) {
			
			     myQ("
				     DELETE 
				     FROM `[x]files` 
				     WHERE `id` = '".$fisiereCStergere['id']."'
			     ");
				 
				 /*
				     Trimite NEWSLETTRE la persoana care a Incarcat fisierul se anunta 
					 ca fisierul a fost sters din baza de date din motiv ca nu sa creat CONT de PLATA
					 ........
				 */		
			}
		}		
	}
	

########################################################
    /*
         ANALIZAM fisierele care trebuie sa se stearga automat
    */
########################################################
	
	if ( me('id') && $_GET['chromeless'] == 0 ) {	

		$fisiereCatreStergere = myQ("
			SELECT *
			FROM `[x]files`
			WHERE `approved` = '2' 
		");
		
		
		/*
		    Analizam daca au trecut 3 zile de cind sa ACHITAT contul 
		*/
		$i=0;
		while ($fisiereStergere = myF($fisiereCatreStergere)) {
		    
			if ( ((time()-_fnc("checkTime", $fisiereStergere['timesters'], 2, 'zile')) > 0)  ) {
			
			     myQ("
				     DELETE 
				     FROM `[x]files` 
				     WHERE `id` = '".$fisiereStergere['id']."'
			     ");
				 
				 /*
				     Trimite NEWSLETTRE la persoana care a Incarcat fisierul se anunta 
					 ca au in timp de 2 zile comanda va fi stearsa
					 ........
				 */		
			}
		}		
	}
	

########################################################
    /*
         Stergem fisierul daca acest lucru este cerut 
    */
########################################################

	if ( me('id') && $_GET['delete_file']!='' && $_GET['chromeless'] == 0 ) {	
	
		myQ("UPDATE `[x]files` 
		     SET `approved`='2',  
			     `timesters`='".time()."'
			 WHERE `id`='".$_GET['delete_file']."'
		");	
		
		/*
		    Trimite NEWSLETTRE la persoana care a creat cont si se anunta 
		    ca au trecut 3 zile de la crearea contului
			........
		*/		
		
		_fnc("reload", 0, "?L=moderator.lista_de_fisiere");
	}



########################################################
    /*
         CORECTAM DATELE DESPRE FISIER 
		 CALCULAM PRETUL 
		 APROBAM FISIERUL PENTRU CONT DE PLATA
    */
########################################################

	if ( (me('id') && $_GET['chromeless'] == 0) || ($_GET['chromeless'] == 1) ) {	
	
		/*
		    Scoatem datele din GET PROGRAMS 
		*/
		if ( $_GET['FileName']!='' && $_GET['CCount']!='' ) {
		    
			$_GET['file_name']  = $_GET['FileName'];
			$_GET['file_value'] = $_GET['CCount'];
		}
                
		
		
		if ( $_GET['file_name']!= '' && $_GET['file_value']!='' && is_numeric($_GET['file_value']) ) {
		
			$selectDataFile = myF(myQ("
				SELECT * 
				FROM `[x]files` 
				WHERE `file_name`='".$_GET['file_name']."'
			"));
			
			/*
			    Scoatem cont avans 
			*/
			$cont_avans = _fnc("user", $selectDataFile['company'], 'money_check'); 
			
			/*
			    PRET Fisier
			*/
			$pretFisier = _fnc("calc_price", 'company', (int)($_GET['file_value']), $selectDataFile['from_lang'], $selectDataFile['to_lang'], $selectDataFile['type_file'], $selectDataFile['company'] );
			
			/*
			    Controlam daca este legatura ca FISIERUL DAT sa treaca direct la traducere
			*/
			$selectLegaturaCompany = myF(myQ("
				SELECT * 
				FROM `[x]leg_companie_cubus` 
				WHERE 
					  `idcompanie`='".$selectDataFile['company']."' AND 
				      `tip_legatura`='1'  
				LIMIT 1
			"));
			
			
 			/*
			    Analizam daca este legatura si scoatem banii din cont de la utilizator din OCNT AVANS
			*/
			if ( $selectLegaturaCompany['tip_legatura'] == 1 && $cont_avans >= $pretFisier ) {
			
			    $statutFisier = 5;
			   
	            myQ("
		             UPDATE `[x]users` 
		         	 SET `money_check`='".($cont_avans-$pretFisier)."'
	        		 WHERE `id`='".$selectDataFile['company']."' 
		    		 LIMIT 1
        		");	
			}
			else $statutFisier = 1;
			
			/*
			    Controlam daca este legatura ca FISIERUL DAT sa treaca direct la un anumit traducator
			*/
			$selectLegaturaTraducator = myF(myQ("
				SELECT * 
				FROM `[x]leg_companie_traducator` 
				WHERE `idcompanie`='".$selectDataFile['company']."'
				LIMIT 1
			"));
			
			if ( $selectLegaturaTraducator['from_lang'] == $selectDataFile['from_lang'] && $selectLegaturaTraducator['to_lang'] == $selectDataFile['to_lang'] ) {
			    
			     $forTraducator = $selectLegaturaTraducator['idtraducator'];   
				 
				 $data_traducator = unpk(_fnc("user", $selectLegaturaTraducator['idtraducator'], 'profile_data'));	
				 
				 $nr_telefon_traducator = substr(str_replace("-", "", str_replace(" ", "", $data_traducator['telMobil'])), -8);
				 
				 
				 /*  Trimitem SMS la traducator  */						 
					$user = "bagrinser";
					$password = "camera7a";
					$api_id = "3116699";
					$baseurl ="http://api.clickatell.com";
					$text = urlencode("CUBUS Translation: Dvs. aveti un fisier nou pentru traducere. Va rugam sa intrati in contul dvs. CUBUS si sa efectuati traducerea. Va multumim!");
					$to = "+373".$nr_telefon_traducator;
					// auth call
					$url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
					// do auth call
					$ret = file($url);
					
					//echo $ret;
					//echo '--------------';
					//die;
					
					// split our response. return string is on first line of the data returned
					$sess = split(":",$ret[0]);
					
					if ($sess[0] == "OK") {
						$sess_id = trim($sess[1]); // remove any whitespace
						$url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
						// do sendmsg call
						$ret = file($url);
						$send = split(":",$ret[0]);
					
						//if ($send[0] == "ID") echo "success message ID: ". $send[1];
						//else				  echo "send message failed";
					
					} else {
						
						//echo "Authentication failure: ". $ret[0];
						//exit();
					}
			}		
				
			
			// CHECK status ....
			if ( $selectDataFile['approved'] == 0  || $selectDataFile['approved'] == 30 ) {
			 
			    /* Analizam daca LINK care vine aduce sau nu NR de CUVINTE */
				if ( isset($_GET['WCount']) && $_GET['WCount'] != '' ) { $nr_cuvinte = $_GET['WCount']; }
				else 												   { $nr_cuvinte = 0; }
				
				if ( $selectDataFile['approved'] == 30 ) { $statutFisier = 31; }
				
				
				// UPDATE ...
			    myQ("UPDATE `[x]files` 
			        SET `approved`='".$statutFisier."',  
				     `fortraduc`='".$forTraducator."',
				  	 `salariu_traducator`='"._fnc("salariuTraducatori", $pretFisier, $forTraducator)."',
				     `timeapproved`='".time()."',
				     `nr_caractere`='".(int)($_GET['file_value'])."',
				     `nr_cuvinte`='".(int)($nr_cuvinte)."',
				     `pretul`='".$pretFisier."',  
				     `pretul_editare`='".bcdiv(($pretFisier/5), 1, 2)."',  
				     `cu_editare`='1'  
				    WHERE `file_name`='".$_GET['file_name']."'
				");	
			}
			
			
   			/*
  				Send the mail out!
  			*/
   			$dateCompanieDetalii = unpk(_fnc("user", $selectDataFile['company'], 'profile_data'));
		
   			$mail = new template;
   			$mail -> LoadThis(file_get_contents("theme/templates/GLOBALS/mails/file_price_calculated.tpl"));
   			$mail -> AssignArray(array(
  				"nume.companie"      => $dateCompanieDetalii['numele'],
   				"nume.fisier"        => $selectDataFile['fname'],
   				"traduce.fisier.din" => _fnc("lang_data", $selectDataFile['from_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
  				"traduce.fisier.in"  => _fnc("lang_data", $selectDataFile['to_lang'],   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),
   				"tip.fisier"         => _fnc("tip_file_data", $selectDataFile['type_file'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]),				
   				"pret.fisier"        => $pretFisier				
   			));

  			/*
       			Split the body and the subject, then
   				send the mail
  			*/
   			$mailContent = explode("\n", $mail->Flush(1), 2);
						
   			/* Include the mail class and prepare it for the mailing */
   			include_once("system/functions/classes/mail.class.php");
																	
   			$mail = new SendMail;
   			$mail -> From = 			"{$CONF["SITE_NAME"]} <{$CONF["SITE_SYSTEM_EMAIL"]}>";
   			$mail -> To =				'bagrin.sergiu@yahoo.com';
   			$mail -> Subject = 			$mailContent[0];
   			$mail -> Body = 			$mailContent[1];
   			$mail -> SMTPHost = 		$CONF["MAIL_SMTP_HOST"];
   			$mail -> SMTPPort = 		$CONF["MAIL_SMTP_PORT"];
  			$mail -> SMTPUser = 		$CONF["MAIL_SMTP_USER"];
   			$mail -> SMTPPassword = 	$CONF["MAIL_SMTP_PASSWORD"];
   			$mail -> SMTPTimeout = 		$CONF["MAIL_SMTP_TIMEOUT"];
   			$mail -> MailMethod = 		$CONF["MAIL_METHOD"];
   			$mail -> Charset = 			$CONF["MAIL_CHARSET"];
   			$mail -> Encoding = 		$CONF["MAIL_ENCODING"];
   			$mail -> SendmailPath = 	$CONF["MAIL_SENDMAIL_PATH"];
       		$mail -> Send();

			
			/*
			    Activam cookie pentru a schimba TABBER
			*/
			//setcookie("tabber", 1);
			
		    if ( $_GET['chromeless'] == 0 ) _fnc("reload", 0, "?L=moderator.lista_de_fisiere");
		} 
	}
		
		

########################################################
    /*
         CORECTAM DATELE DESPRE FISIER RECENTE
		 CALCULAM PRETUL 
		 APROBAM FISIERUL PENTRU CONT DE PLATA
    */
########################################################

	if ( (me('id') && $_GET['chromeless'] == 0) ) {	
	
		if ( $_GET['file_name_recent']!= '' && $_GET['file_value_recent']!='' && is_numeric($_GET['file_value_recent']) ) {
		
			$selectDataFile = myF(myQ("
				SELECT * 
				FROM `[x]files` 
				WHERE `file_name`='".$_GET['file_name_recent']."' 
				LIMIT 1
			"));
			
		    // UPDATE ...
		    myQ("UPDATE `[x]files` 
		        SET `approved`='1',  
			     `timeapproved`='".time()."',
			     `nr_caractere`='".(int)($_GET['file_value_recent'])."',
			     `pretul`='"._fnc("calc_price", 'company', (int)($_GET['file_value_recent']), $selectDataFile['from_lang'], $selectDataFile['to_lang'], $selectDataFile['type_file'] )."'  
			    WHERE `file_name`='".$_GET['file_name_recent']."'
			");	
					
			/*
			    Activam cookie pentru a schimba TABBER
			*/
			//setcookie("tabber", 1);
			
		    //_fnc("reload", 0, "?L=moderator.lista_de_fisiere");
		} 
	}
		
		
########################################################
    /*
         SELECTAM TOATE FISIERELE DIN db SI LE REPARTIZAM 
		 CA "aprobate" SI "neaprobate"
    */
########################################################

	if ( me('id') && $_GET['chromeless'] == 0 ) {	

		$fileSelect = myQ("
			SELECT *
			FROM `[x]files`
			WHERE `approved` >= '0' AND `approved` <= '2' 
			ORDER BY `id` DESC
		");
		
		$i=0;
 		while ($fisierList = myF($fileSelect)) {
		
			/*
			     tipul fisierului 
			*/
			$type_file = _fnc("file_extension", "system/cache/pictures/".$fisierList["file_name"]);
			
			/*
			     ICON TYPE
			*/
			$img_show = _fnc("icon_type", $type_file);
			
			/*
			    COMPANY DATA 
			*/
			$company_data =  unpk(_fnc("user", $fisierList['company'], 'profile_data'));


			/*
			    COMPLETAM html CU DATELE CERUTE
			*/
		    $fisier[$i]["fisier.nrPage"]          = _fnc("nrPagini", $fisierList['nr_caractere']);
		    $fisier[$i]["fisier.nrCaractere"]     = $fisierList['nr_caractere'];
		 
		    $fisier[$i]["fisier.traducDin"]       = _fnc("lang_data",     $fisierList['from_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
		    $fisier[$i]["fisier.traducIn"]        = _fnc("lang_data",     $fisierList['to_lang'],   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
		    $fisier[$i]["fisier.typeFile"]        = _fnc("tip_file_data", $fisierList['type_file'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
		  
			$fisier[$i]["fisier.file"]            = "theme/default/images/icons/office/".$img_show;
			$fisier[$i]["fisier.title"]           = $fisierList["fname"];
			$fisier[$i]["fisier.description"]     = $fisierList["description"];
 			$fisier[$i]["fisier.id"]              = $fisierList["id"];  
 			$fisier[$i]["fisier.namestart"]       = $fisierList["file_name"];  
			
			$fisier[$i]["fisier.path"]            = urlencode("system/cache/pictures/"); 
			$fisier[$i]["fisier.filename"]        = urlencode($fisierList["file_name"]);
		   
		    $fisier[$i]["fisier.pret"]            = $fisierList["pretul"];
		    
			
			if ( _fnc("user", $fisierList['company'], 'email_verified') == 1 ) { 
			
				$dataCompanyArray  = array(
			   
			        "{company.statut}"            => 'Companie',
			        "{company.name}"              => $company_data['numele'],
			        "{company.pers.contact}"      => $company_data['persoanadecontact'],
			        "{company.adresa}"            => $company_data['adresa'],
			        "{company.tel}"               => $company_data['telefon'],
			        "{company.fax}"               => $company_data['fax'],
			        "{company.email}"             => _fnc("user", $fisierList['company'], 'email'),
			        "{company.codfiscal}"         => $company_data['codfiscal'],
			        "{company.codtva}"            => $company_data['codtva'],
			        "{company.codbancar}"         => $company_data['codbancar'],
			        "{company.denumireabancii}"   => $company_data['denumireabancii']
			    );
			   
			    $fisier[$i]["date.de.contact"]    = strtr($GLOBALS["OBJ"]["dateCompanie"], $dataCompanyArray);
			}
			elseif ( _fnc("user", $fisierList['company'], 'email_verified') == 2 ) { 
			    
				$dataPersoanaFizicaArray  = array(
			   
			        "{pers.statut}"               => 'Persoana Fizica',
			        "{pers.numele}"               => $company_data['numele'],
			        "{pers.prenumele}"            => $company_data['persoanadecontact'],
			        "{pers.adresa}"               => $company_data['adresa'],
			        "{pers.telMobil}"             => $company_data['telefon'],
			        "{pers.telFix}"               => $company_data['fax'],
			        "{pers.codPersonal}"          => $company_data['codPersonal'],
			        "{pers.email}"                => _fnc("user", $fisierList['company'], 'email')
			    );
			   
			    $fisier[$i]["date.de.contact"]    = strtr($GLOBALS["OBJ"]["datePersoanaFizica"], $dataPersoanaFizicaArray);
			}
			else {
			
			    $fisier[$i]["date.de.contact"]    = '';
			}
			
			
			/*
			    Lista de traducatori
				*/
			
		    $fileSelectTrad = myQ("
			    SELECT *
			    FROM `[x]users`
			    WHERE `is_administrator` = '3' 
			    ORDER BY `id` DESC
		    ");
			
		    $dataTrad = $fisierList['from_lang']."-".$fisierList['to_lang']; 
			
 		    while ($fisierListTrad = myF($fileSelectTrad)) {
			
				 $arrayAllTested = array();
				 _fnc("abilitatiTraducator", unpk($fisierListTrad["trad_id_file"]));
				 
		       	 $numePrenume = explode(".", $fisierListTrad["username"]);
				 
				 if ( in_array($dataTrad, $arrayAllTested) ) $datatraducator .= "<option value=\"".$fisierListTrad['id']."\">".ucwords($numePrenume[0])." ".ucwords($numePrenume[1])."</option>\r\n";
			}
			
			$fisier[$i]["data.traducator"]  = $datatraducator;
			
		
			
			/*
			    Pentru fisierele care trebuie sterse
				apare peste cit timp vor fi sterse
			*/
		    if ( $fisierList['approved'] == 2 ) {
			
			    $nr_minute_ramase = (_fnc("checkTime", $fisierList['timesters'], 2, 'zile') - time())/60;
				
				$fisier[$i]["timp.ore"]           = _fnc("MinutesToHour", $nr_minute_ramase, 'ore'); 
		        $fisier[$i]["timp.minute"]        = _fnc("MinutesToHour", $nr_minute_ramase, 'minute'); 
			}

            /*
			    Separam fisierele aprobate de cele neaprobate 
			*/
			    if ( $fisierList['approved'] == 0 ) {  $fisiereNeAprobate[] = $fisier[$i]; }
			elseif ( $fisierList['approved'] == 1 ) {  $fisiereAprobate[]   = $fisier[$i]; }
			elseif ( $fisierList['approved'] == 2 ) {  $fisiereRespinse[]   = $fisier[$i]; }
			
			$i++;
		}


	    if (isset($fisiereNeAprobate)) {
			
		    $tpl -> Zone("fisiereNeAprobate", "enabled");
		    $tpl -> Loop("fisiereNeAprobateList", $fisiereNeAprobate);
	    } 
	    else $tpl -> Zone("fisiereNeAprobate", "empty");
		

		if (isset($fisiereAprobate)) {
		   
			$tpl -> Zone("fisiereAprobate", "enabled");
			$tpl -> Loop("fisiereAprobateList", $fisiereAprobate);
		} 
		else $tpl -> Zone("fisiereAprobate", "empty");
		

		if (isset($fisiereRespinse)) {
		   
			$tpl -> Zone("fisiereRespinse", "enabled");
			$tpl -> Loop("fisiereRespinseList", $fisiereRespinse);
		} 
		else $tpl -> Zone("fisiereRespinse", "empty");
	}
	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>