<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Translation, CUBUS - info@cubus.md                 //
// Last modification date:  30.06.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007 - 2008  CUBUS Translation - All rights reserved                          //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("conturi_de_plata");
	$tpl -> GetObjects();
	
		     
	//_fnc("userAcces", $_GET['L']);


########################################################
    /*
         ACTIVAM ZONE
    */
########################################################
	if (me('id')) {	
		
		$tpl -> Zone("checkContPlata",  "enabled");
		$tpl -> Zone("cubusSteps",      "enabled");
		$tpl -> Zone("contacteCubus",   "enabled");
		$tpl -> Zone("contModerator",   "enabled");

	} else $tpl -> Zone("checkContPlata", "guest");
	

########################################################
    /*
         Stergem fisierul din lista "Fisiere in traducere"
    */
########################################################
	
	if ( me('id') ) {	

	    if ( $_GET['sterge_fisierul_go']!='' ) {
			 
			$dateleFisierului = myF(myQ("
				SELECT *
				FROM `[x]files` 
				WHERE `id`='".$_GET['sterge_fisierul_go']."'
			"));

			 
			 myQ("
				 DELETE 
				 FROM `[x]files` 
				 WHERE `id` = '".$_GET['sterge_fisierul_go']."'
			 ");
	
			 
			 unlink("system/cache/pictures/".$dateleFisierului['file_name']);				  
			 
			 _fnc("reload", 0, "?L=moderator.conturi_de_plata");
			 die;
		}
	}
	
 
########################################################
    /*
         Anularea fisierului in caz ca traducerea nu e calitativa
    */
########################################################
	
	if ( me('id') ) {	

	    if ( $_GET['anuleaza_traducerea']!='' ) {
			 
			$dateleFisierului = myF(myQ("
				SELECT `trans_name` 
				FROM `[x]files` 
				WHERE `id`='".$_GET['anuleaza_traducerea']."'
			"));

			 myQ("UPDATE `[x]files` 
			   	  SET   `timeaccept`='',  
				  		`approved`='5',  
				  		`trans_name`='',  
				  		`ideditor`='0',  
				  		`idtraduc`='0',  
				  		`fortraduc`='0'
				  WHERE `id`='".$_GET['anuleaza_traducerea']."'
			 ");
			 
			 unlink("system/cache/pictures/".$dateleFisierului['trans_name']);				  
			 
			 _fnc("reload", 0, "?L=moderator.conturi_de_plata");
			 die;
		}
	}
	

########################################################
    /*
         Punem la un fisier traducator separat
    */
########################################################
	
	if ( me('id') ) {	

	    if ( $_GET['selectTraducator']!='' && $_GET['fileTraducator'] != '' ) {
			 
			$selectFiledataSelect = myF(myQ("
				SELECT * 
				FROM `[x]files` 
				WHERE `id`='".$_GET['fileTraducator']."'
			"));
			
			 myQ("UPDATE `[x]files` 
			 	  SET 
				  		`fortraduc`='".$_GET['selectTraducator']."',  
				  		`salariu_traducator`='"._fnc("salariuTraducatori", $selectFiledataSelect['pretul'], $_GET['selectTraducator'])."'
				  
				  WHERE `id`='".$_GET['fileTraducator']."'");	
			 
			 _fnc("reload", 0, "?L=moderator.conturi_de_plata");
			 die;
		}
	}
	


########################################################
    /*
         Stergem contul din DB 
    */
########################################################
	
	if ( me('id') ) {	

	    if ( $_GET['cpDelete']!='' ) {
		     myQ("
			     DELETE 
			     FROM `[x]cont_plata` 
			     WHERE `id` = '".$_GET['cpDelete']."'
		     ");
			 
		     myQ("UPDATE `[x]files` SET `cont_plata`='0', `approved`='1'  WHERE `cont_plata`='".$_GET['cpDelete']."'");	
			 
			 _fnc("reload", 0, "?L=moderator.conturi_de_plata");
		}
	}
	

########################################################
    /*
         INcepem sa analizam statutul CONTURILE DE PLATA
		 si daca nu a venit timpul sa il stergem din DB 
		 sau sa il anulam 
         ANALIZAM CONTURILE DE PLATA CU STATUTUL 0
    */
########################################################
	
	if ( me('id') ) {	

		$contPlataSelectStatutZero = myQ("
			SELECT *
			FROM `[x]cont_plata`
			WHERE `achitat` = '0' OR `achitat` = '1' OR `achitat` = '2'  
			ORDER BY `id` DESC
		");
		
		/*
		    Analizam daca au trecut 3 zile de cind sa creat contul 
		*/
		$i=0;
		while ($contPlataZero = myF($contPlataSelectStatutZero)) {
		    
			if ( ((time()-_fnc("checkTime", $contPlataZero['time_creat'], 3, 'zile')) > 0) && $contPlataZero['achitat'] < 1 ) {
			
			     myQ("UPDATE `[x]cont_plata` SET `achitat`='1' WHERE `id`='".$contPlataZero['id']."' ");	
				 
				 /*
				     Trimite NEWSLETTRE la persoana care a creat cont si se anunta 
					 ca au trecut 3 zile de la crearea contului
					 ........
				 */		
			}
		}		
			
		/*
		    Analizam daca au trecut 5 zile de cind sa creat contul 
		*/
		$i=0;
		while ($contPlataZero = myF($contPlataSelectStatutZero)) {
		    
			if ( ((time()-_fnc("checkTime", $contPlataZero['time_creat'], 5, 'zile')) > 0) && $contPlataZero['achitat'] < 2 ) {
			
			     myQ("
				     DELETE 
				     FROM `[x]cont_plata` 
				     WHERE `id` = '".$contPlataZero['id']."'
			     ");
				 
			     myQ("UPDATE `[x]files` SET `cont_plata`='0', `approved`='1'  WHERE `cont_plata`='".$contPlataZero['id']."'  AND `company` = '".$contPlataZero['company']."' ");	
				
				 /*
				     Trimite NEWSLETTRE la persoana care a creat cont si se anunta 
					 ca au trecut 5 zile de la crearea contului si ca contul a fost sters
					 ........
				 */		
			}
		}			
	}
	

########################################################
    /*
         ANALIZAM CONTURILE DE PLATA CU STATUTUL 1
    */
########################################################
	
	if ( me('id') ) {	

		$contPlataSelectStatutUnu = myQ("
			SELECT *
			FROM `[x]cont_plata`
			WHERE `achitat` = '2' OR `achitat` = '3' OR `achitat` = '4'  
			ORDER BY `id` DESC
		");
		
		
		/*
		    Analizam daca au trecut 3 zile de cind sa ACHITAT contul 
		*/
		$i=0;
		while ($contPlataUnu = myF($contPlataSelectStatutUnu)) {
		    
			if ( ((time()-_fnc("checkTime", $contPlataUnu['time_achitat'], 3, 'zile')) > 0) && $contPlataUnu['achitat'] < 3 ) {
			
			     myQ("UPDATE `[x]cont_plata` SET `achitat`='3' WHERE `id`='".$contPlataUnu['id']."' ");	
				 
				 /*
				     Trimite NEWSLETTRE la persoana care a ACHITAT cont si se anunta 
					 ca au trecut 3 zile de la ACHITARE
					 ........
				 */		
			}
		}		
			
		
		$i=0;
		while ($contPlataUnu = myF($contPlataSelectStatutUnu)) {
		    
			if ( ((time()-_fnc("checkTime", $contPlataUnu['time_achitat'], 5, 'zile')) > 0) && $contPlataUnu['achitat'] < 4 ) {
			
			     myQ("
				     DELETE 
				     FROM `[x]cont_plata` 
				     WHERE `id` = '".$contPlataUnu['id']."'
			     ");
				 
			     myQ("UPDATE `[x]files` SET `cont_plata`='0', `approved`='1'  WHERE `cont_plata`='".$contPlataUnu['id']."'  AND `company` = '".$contPlataUnu['company']."' ");	
				
				 /*
				     Trimite NEWSLETTRE la persoana care a ACHITAT cont si se anunta 
					 ca au trecut 5 zile de la ACHITARE si ca contul a fost sters
					 ........
				 */		
			}
		}			
	}
	
########################################################
    /*
         Incepem sa analizam toate "CONTURILE DE PLATA"
    */
########################################################

	if ( me('id') ) {	
	
		if ( isset($_POST['idcontplataConfirm']) &&  $_SESSION['moderator_cont_plata'] != $_POST['idcontplataConfirm'] ) {
		    
            $_SESSION['moderator_cont_plata'] = $_POST['idcontplataConfirm'];
			
		    myQ("
			       UPDATE `[x]cont_plata` 
			       SET 
				       `achitat`='4',
					   `time_confirmat`='".date("U")."'
				   WHERE `id`='".$_POST['idcontplataConfirm']."'"
			);	
			
			/* 
			    Selectam lista cu datele de fisiere 
			*/
			$selectFileArray = myF(myQ("
				SELECT * 
				FROM `[x]cont_plata` 
				WHERE `id`='".$_POST['idcontplataConfirm']."'
			"));
			
			/*
			    PUT ARRAY 
			*/
			$arrayList    = explode(",", $selectFileArray['files_id'] );
			$allArrayList = implode(" OR `id`=", $arrayList);  
			
			myQ(" UPDATE `[x]files`  SET  `approved`='5'  WHERE `id`=  ".$allArrayList."  " );	
			
			/*
			     DACA TIPUL FISIERULUI e 1 => ADAUGAM la BANII AVANS + 
			*/
			if ( $selectFileArray['tipul'] == 1 ) { 
			    
				myQ(" UPDATE `[x]users`  SET  `money_check`='".( _fnc("user", $selectFileArray['company'], 'money_check') + $selectFileArray['pretul'] )."'  WHERE `id`=  ".$selectFileArray['company']."  " );	
			}
 		}
				
		$contPlataSelect = myQ("
			SELECT *
			FROM `[x]cont_plata`
			WHERE `achitat` >= '0' AND `achitat` <= '3'  
			ORDER BY `id` DESC
		");
		
		$i=0;
		while ($contPlata = myF($contPlataSelect)) {
            
			/*
			    COMPANY DATA 
			*/
			$company_data =  unpk(_fnc("user", $contPlata['company'], 'profile_data'));

			/*
			    Lista de fisiere din cont de plata
			*/
			$filesNAME = unpk($contPlata["files_name"]);
			if ( !is_array($filesNAME) ) { $filesNAME = array(); }			

		    $fisiereDinContPlata = myQ("
			    SELECT *
			    FROM `[x]files`
			    WHERE `cont_plata` = '".$contPlata['id']."'  
			    ORDER BY `id` DESC
		    ");
		
			$z=1;
			$addFiles = '';
		    while ($fiecareFisierSeparat = myF($fisiereDinContPlata)) {
			       
			       /*
			           Lista de traducatori
			       */
		           $fileSelectTrad = myQ("
			           SELECT *
			           FROM `[x]traducatori`
 			           ORDER BY `id_traducator` DESC
		           ");
			
		           $dataTrad = $fiecareFisierSeparat['from_lang']."-".$fiecareFisierSeparat['to_lang']; 
			
 		           $datatraducator='';
				   while ($fisierListTrad = myF($fileSelectTrad)) {
			
				       $arrayAllTested = array();
				      
		       	       //echo $fisierListTrad["username"];
					  
					   //print_r(unpk($fisierListTrad["trad_id_file"]));
					  
					   //_fnc("abilitatiTraducator", unpk($fisierListTrad["trad_id_file"]));
					   
					   
					   /* Selectam abilitatile acestui traducator */		 
					   $selectAbilitati = unpk(_fnc("traducatorEditor", $fisierListTrad['id_traducator'], "abilitati"));
					   if ( !is_array($selectAbilitati)) { $selectAbilitati = array(); } 
					   
					   
					   foreach ($selectAbilitati as $key => $val ) {
					   
					   		if ( $selectAbilitati[$key]['statut_file'] == 4 ) {
								
								$arrayAllTested[] = $key;
							}
					   }
					   

					   $numePrenume = explode(".", _fnc("user", $fisierListTrad['id_traducator'], "username"));
				  
			           if ( in_array($dataTrad, $arrayAllTested) ) {
					       
						   if ($fiecareFisierSeparat['fortraduc'] == $fisierListTrad['id_traducator'] ) {
						   
						       $datatraducator .= "<option selected value=\"".$fisierListTrad['id_traducator']."\">".ucwords($numePrenume[0])." ".ucwords($numePrenume[1])."</option>\r\n";
						   }
						   else {
						   
						       $datatraducator .= "<option value=\"".$fisierListTrad['id_traducator']."\">".ucwords($numePrenume[0])." ".ucwords($numePrenume[1])."</option>\r\n";
						   }
					   }
			       }
				   

			
				   
				   $fisierpath     = urlencode("system/cache/pictures/"); 
			       $fisierfilename = urlencode($fiecareFisierSeparat["file_name"]);
				  
				   $addFiles .= "<tr>
				                  <td width=10>".($z+1).".</td>
							      <td align=left>".$fiecareFisierSeparat['fname']."</td>
							      <td align=left><a href=?L=download.file&chromeless=1&path=".$fisierpath."&file=".$fisierfilename.">Descarca</a></td>
							      <td align=left>"._fnc("lang_data", $fiecareFisierSeparat['from_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." > "._fnc("lang_data", $fiecareFisierSeparat['to_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." > "._fnc("tip_file_data", $fiecareFisierSeparat['type_file'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</td>
							      <td>
                                      <select name=\"traducator\"  onchange=\"document.location.href='http://cubus.md/?L=moderator.conturi_de_plata&fileTraducator=".$fiecareFisierSeparat['id']."&selectTraducator=' + this.value;\">
								          <option>-</option>
										  ".$datatraducator."
						   			  </select>
								  </td>
							      <td></td>
								</tr>"; 
				   $z++;
		    }
			   

 			$repContPlata[$i]["contplata.id"]       = $contPlata["id"];
			$repContPlata[$i]["contplata.suma"]     = $contPlata["pretul"];
			$repContPlata[$i]["contplata.fileList"] = ($addFiles==''?$GLOBALS["OBJ"]["tipulContuluiPlata"]:$addFiles);
			
			
			if ( $contPlata["achitat"] >= 0 && $contPlata["achitat"] <= 1 ) {
                
				$repContPlata[$i]["ContPlata.Achitat"] = $GLOBALS["OBJ"]["ContPlataNeachitat"];
				$repContPlata[$i]["contplata.achitatColor"] = "#FF0F15";
				$repContPlata[$i]["contplata.confirmatColor"] = "#FF0F15";
				$repContPlata[$i]["picture.achitat.disabled"] = "";
		
			} else if ( $contPlata["achitat"] >= 2 && $contPlata["achitat"] <= 3 ) {
			
				$repContPlata[$i]["ContPlata.Achitat"] = $GLOBALS["OBJ"]["ContPlataAchitat"];
				$repContPlata[$i]["contplata.achitatColor"] = "#3969F9";
				$repContPlata[$i]["contplata.confirmatColor"] = "#FF0F15";
				$repContPlata[$i]["picture.achitat.disabled"] = "disabled";
			} 
			

			if ( $contPlata["achitat"] == 0) { 
				    
			    $nr_minute_ramase = (_fnc("checkTime", $contPlata['time_creat'], 5, 'zile') - time())/60;
				
				$timpRamasCP = array( 
			        "{timpRamas.ore}"    => _fnc("MinutesToHour", $nr_minute_ramase, 'ore'),
			        "{timpRamas.minute}" => _fnc("MinutesToHour", $nr_minute_ramase, 'minute')
			    );
				$repContPlata[$i]["ContPlata.statut"] = strtr($GLOBALS["OBJ"]["CPCreat"], $timpRamasCP); 
			}
			elseif ( $contPlata["achitat"] == 1) { 
			
			    $nr_minute_ramase = (_fnc("checkTime", $contPlata['time_creat'], 5, 'zile') - time())/60;
				
				$timpRamasCP = array( 
			        "{timpRamas.ore}"    => _fnc("MinutesToHour", $nr_minute_ramase, 'ore'),
			        "{timpRamas.minute}" => _fnc("MinutesToHour", $nr_minute_ramase, 'minute')
			    );
			    $repContPlata[$i]["ContPlata.statut"] = strtr($GLOBALS["OBJ"]["CPCreatTreiZile"], $timpRamasCP); 
			}
			elseif ( $contPlata["achitat"] == 2) { 
				    
			    $nr_minute_ramase = (_fnc("checkTime", $contPlata['time_achitat'], 5, 'zile') - time())/60;
				
				$timpRamasCP = array( 
			        "{timpRamas.ore}"    => _fnc("MinutesToHour", $nr_minute_ramase, 'ore'),
			        "{timpRamas.minute}" => _fnc("MinutesToHour", $nr_minute_ramase, 'minute')
			    );
			    $repContPlata[$i]["ContPlata.statut"] = strtr($GLOBALS["OBJ"]["CPAchitat"], $timpRamasCP); 
			}
			elseif ( $contPlata["achitat"] == 3 ) { 
				    
			    $nr_minute_ramase = (_fnc("checkTime", $contPlata['time_achitat'], 5, 'zile') - time())/60;
				
				$timpRamasCP = array( 
			        "{timpRamas.ore}"    => _fnc("MinutesToHour", $nr_minute_ramase, 'ore'),
			        "{timpRamas.minute}" => _fnc("MinutesToHour", $nr_minute_ramase, 'minute')
			    );
				$repContPlata[$i]["ContPlata.statut"] = strtr($GLOBALS["OBJ"]["CPAchitatTreiZile"], $timpRamasCP); 
			}
			
			$repContPlata[$i]["height.mouse.over"]    = 305 + 180 * $i;

			
			if ( _fnc("user", $contPlata['company'], 'email_verified') == 1 ) { 
			
				$dataCompanyArray  = array(
			   
			        "{company.statut}"            => 'Companie',
			        "{company.name}"              => $company_data['numele'],
			        "{company.pers.contact}"      => $company_data['persoanadecontact'],
			        "{company.adresa}"            => $company_data['adresa'],
			        "{company.tel}"               => $company_data['telefon'],
			        "{company.fax}"               => $company_data['fax'],
			        "{company.email}"             => _fnc("user", $contPlata['company'], 'email'),
			        "{company.codfiscal}"         => $company_data['codfiscal'],
			        "{company.codtva}"            => $company_data['codtva'],
			        "{company.codbancar}"         => $company_data['codbancar'],
			        "{company.denumireabancii}"   => $company_data['denumireabancii']
			    );
			   
			    $repContPlata[$i]["date.de.contact"]    = strtr($GLOBALS["OBJ"]["dateCompanie"], $dataCompanyArray);
			}
			elseif ( _fnc("user", $contPlata['company'], 'email_verified') == 2 ) { 
			    
				$dataPersoanaFizicaArray  = array(
			   
			        "{pers.statut}"               => 'Persoana Fizica',
			        "{pers.numele}"               => $company_data['numele'],
			        "{pers.prenumele}"            => $company_data['persoanadecontact'],
			        "{pers.adresa}"               => $company_data['adresa'],
			        "{pers.telMobil}"             => $company_data['telefon'],
			        "{pers.telFix}"               => $company_data['fax'],
			        "{pers.codPersonal}"          => $company_data['codPersonal'],
			        "{pers.email}"                => _fnc("user", $contPlata['company'], 'email')
			    );
			   
			    $repContPlata[$i]["date.de.contact"]    = strtr($GLOBALS["OBJ"]["datePersoanaFizica"], $dataPersoanaFizicaArray);
			}
			else {
			
			    $repContPlata[$i]["date.de.contact"]    = '-----//----//----//----';
			}
			
			
			
			
			
			$i++;
		}
		
  		
		if (isset($repContPlata)) {
			$tpl -> Zone("contPlata", "enabled");
			$tpl -> Loop("contPlata", $repContPlata);
		} 
		
		else $tpl -> Zone("contPlata", "empty");
	}



		
########################################################
    /*
         SELECTAM TOATE FISIERELE DIN db SI LE REPARTIZAM 
		 CA "aprobate" SI "neaprobate"
    */
########################################################
	
	if ( me('id') ) {	
	
		$fileSelect = myQ("
			SELECT *
			FROM `[x]files`
			WHERE `approved` >= '5' AND `approved` <= '10' 
			ORDER BY `id` DESC
		");
		
		$i=0;
		
 		while ($fisierList = myF($fileSelect)) {
		
			$selectTrad = ''; 

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
			$company_data    =  unpk(_fnc("user", $fisierList['company'],  'profile_data'));
			
			
			if ( $fisierList['idtraduc'] !='' )  $traducator_data =  unpk(_fnc("user", $fisierList['idtraduc'], 'profile_data')); 
			else                                 $traducator_data =  array();
			
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
			    Date despre traducator 
			*/
			$dataTraducatorArray  = array(
  
		        "{traducator.name}"              => $traducator_data['numele'],
		        "{traducator.prenume}"           => $traducator_data['prenumele'],
		        "{traducator.adresa}"            => $traducator_data['adresa'],
		        "{traducator.tel}"               => $traducator_data['telFix'],
		        "{traducator.mobil}"             => $traducator_data['telMobil'],
		        "{traducator.codPersonal}"       => $traducator_data['serieBuletin'].' '.$traducator_data['codPersonal']
		    );
		   
		    $fisier[$i]["date.de.traducator"] = strtr($GLOBALS["OBJ"]["dateTraducator"], $dataTraducatorArray);
			
			/*
			     Scoatem un mesaj in dependenta de STATUT
			*/
			    if ( $fisierList['approved'] == 5 )  { $statut_fisier_alarma = 'Contul a fost confirmat';     }
			elseif ( $fisierList['approved'] == 6 )  { $statut_fisier_alarma = 'Fisier ocupat de traducator'; }
			elseif ( $fisierList['approved'] == 7 )  { $statut_fisier_alarma = 'Traducator a incarcat traducerea'; }
			elseif ( $fisierList['approved'] == 8 )  { $statut_fisier_alarma = 'Traducator a aprobat traducerea'; }
			elseif ( $fisierList['approved'] == 9 )  { $statut_fisier_alarma = 'Editor adaugat automat'; }
			elseif ( $fisierList['approved'] == 10 ) { $statut_fisier_alarma = 'Editor incarca file Editat'; }
			
			$fisier[$i]["statut.fisier"] = $statut_fisier_alarma;
			

           
		    /*
			           Lista de traducatori
			*/
		    $fileSelectTrad = myQ("
			           SELECT *
			           FROM `[x]traducatori`
 			           ORDER BY `id_traducator` DESC
		    ");
			
		    $dataTrad = $fisierList['from_lang']."-".$fisierList['to_lang']; 
			
 		    $datatraducator='';
			
			while ($fisierListTrad = myF($fileSelectTrad)) {
			
				   $selectAbilitati = unpk($fisierListTrad["abilitati"]);
				   
				   $numePrenume = explode(".", _fnc("user", $fisierListTrad["id_traducator"], "username"));
			  
				   if ( $selectAbilitati[$dataTrad]['statut_file'] == 4 ) {
					   
					   if ($fisierList['fortraduc'] == $fisierListTrad['id_traducator'] ) {
					   
						   $datatraducator .= "<option selected value=\"".$fisierListTrad['id_traducator']."\">".ucwords($numePrenume[0])." ".ucwords($numePrenume[1])."</option>\r\n";
					   }
					   else {
						   
						   $datatraducator .= "<option value=\"".$fisierListTrad['id_traducator']."\">".ucwords($numePrenume[0])." ".ucwords($numePrenume[1])."</option>\r\n";
					   }
				   }
			}
		   
		    $selectTrad = "<select name=\"traducator\"  onchange=\"document.location.href='http://cubus.md/?L=moderator.conturi_de_plata&fileTraducator=".$fisierList['id']."&selectTraducator=' + this.value;\">
						       <option>-</option>
							   ".$datatraducator."
						   </select>";



            /*
			     Introducem lista de traducatori 
			*/
		    $fisier[$i]["data.traducator"] = $selectTrad;



            /*
			    Separam fisierele aprobate de cele neaprobate 
			*/
			    if ( $fisierList['approved'] >= 5 && $fisierList['approved'] <= 8 )  {  $fisiereTraducere[] = $fisier[$i]; }
			elseif ( $fisierList['approved'] >= 9 && $fisierList['approved'] <= 10 ) {  $fisiereEditare[]   = $fisier[$i]; }
			
			
			$i++;
		}


	    if (isset($fisiereTraducere)) {
			
		    $tpl -> Zone("fisiereTraducere", "enabled");
		    $tpl -> Loop("fisiereTraducereList", $fisiereTraducere);
	   
	    } else $tpl -> Zone("fisiereTraducere", "empty");

		if (isset($fisiereEditare)) {
		   
			$tpl -> Zone("fisiereEditare", "enabled");
			$tpl -> Loop("fisiereEditareList", $fisiereEditare);
		
		} else $tpl -> Zone("fisiereEditare", "empty");
		
	}
	


	$tpl -> CleanZones();
	$tpl -> Flush();
?>