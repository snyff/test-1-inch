<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  24.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("traducatori_test");
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
		$tpl -> Zone("traducatorLista",       "test");
	} 
	else {
	
	    $tpl -> Zone("traducatorLista",      "guest");
		_fnc("reload", 2, "?");
	}
	
	
	
	
/*	
	
	if ($_GET['rr']==1) {
	
		$fileSelect = myQ("
			SELECT *
			FROM `[x]users`
			WHERE `is_administrator` = '3'
			ORDER BY `id` DESC
		");
		
		$bonusuri[] = "15|700|1599";
		$bonusuri[] = "30|1600|10000";
		

		$i=0;
		
		while ($lisFis = myF($fileSelect)) {
		
		    //print_r(unpk($lisFis['trad_id_file'])); echo '\r\n\r\n <BR><BR> <BR><BR> <BR><BR>';
			
			//dddd
		    
			if ( $lisFis['id'] >= 576 ) { $procent = 40; $bunus_tot = ''; } else { $procent = 50; $bunus_tot = pk($bonusuri); }
			
			
			
			myQ("
		        INSERT INTO `[x]traducatori` 
		        (
			        `id_traducator`,
			        `procent`,
			        `bonusuri`,
			        `abilitati`,
					`abilitati_testate`
		        )
		        VALUES
		        (
			        '".$lisFis['id']."',
			        '".$procent."',
			        '".$bunus_tot."',
			        '".$lisFis['account_type']."',
			        '".$lisFis['trad_id_file']."'
		        )
		    ");
			
			
		}			
	} 
	
	*/
	
	
	
	
	
	
	
	

########################################################
	/*
		Schimbam procentele pentru acest traducator
	*/ 
########################################################
	if ( me('id') ) {	
     
		if ( $_GET["addddddccept"] == 1 ) {
		   
			/*
				Scoatem datele despre traducator
				Cit a fost platit la o anumita perioada
			*/
		    $dataTraducator = _fnc("user", $_GET['idTraducator'], 'procentTraducator');
			if ( !is_array($dataTraducator) ) { $dataTraducator = array(); } 
			
			$dataTraducator[]['update']      = time();
			$dataTraducator[]['procent']     = $_GET['procentTraducator'];
			$dataTraducator[]['tipbonusuri'] = '';
		}			
	}
		

	

########################################################
	/*
	    ACCEPTAM TRADUEREA 
		AEST TRADUCATOR A TRECUT TEST PENTRU LIMBA REPECTIVA
	*/ 
########################################################
	if ( me('id') ) {	
     
	    ///////////// Modified Main Picture Delete (hack) by Thunder ////////////////////
		if ( $_GET["accept"] == 1 ) {
		   
		    $acceptUserTrad = myF(myQ("
			    SELECT * 
				FROM `[x]users` 
				WHERE `id` = '".(int)$_GET['id_trad']."'
			"));
			
			
			$dataUserTrad = unpk($acceptUserTrad["trad_id_file"]);
			
			$dataUserTrad[$_GET['trad']]['statut_file'] = 4; 
						
			
			myQ("
	             UPDATE `[x]users` 
	             SET 
				       `trad_id_file`='".pk($dataUserTrad)."'
	             WHERE `id`='".$_GET['id_trad']."' 
	        ");					
			
			_fnc("reload", 0, "?L=moderator.traducatori.traducatori_test#middle");
 		}
	}
		


########################################################
	/*
	    RESPINGEM TRADUEREA 
		AEST TRADUCATOR NU A TRECUT TEST PENTRU LIMBA REPECTIVA
	*/ 
########################################################
	if ( me('id') ) {	
     
	    ///////////// Modified Main Picture Delete (hack) by Thunder ////////////////////
		if ( $_GET["respinge"] == 1 ) {
		   
		    $acceptUserTrad = myF(myQ("
			    SELECT * 
				FROM `[x]users` 
				WHERE `id` = '".(int)$_GET['id_trad']."'
			"));
			
			
			$dataUserTrad = unpk($acceptUserTrad["trad_id_file"]);
			
			$dataUserTrad[$_GET['trad']]['statut_file'] = 5; 
						
			
			myQ("
	             UPDATE `[x]users` 
	             SET 
				       `trad_id_file`='".pk($dataUserTrad)."'
	             WHERE `id`='".$_GET['id_trad']."' 
	        ");					
			
			_fnc("reload", 0, "?L=moderator.traducatori_test#middle");
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
			FROM `[x]users`
			WHERE `is_administrator` = '3'
			ORDER BY `id` DESC
		");
		

		/*
		     Afisam lista cu documente
		*/
		$i=0;
		
		while ($lisFis = myF($fileSelect)) {
		
			/*
			     Datele care sunt introduse in HTML 
			*/
			$numePrenume = explode(".", $lisFis["username"]);
			
            /*
			    LISTA DE TRADUCERI EFECTUATE 
				sau NEEFECTUATE 
			*/
			$filesList = explode(",", $lisFis["account_type"]);
			
            $filesTestate = unpk($lisFis["trad_id_file"]);
			
			//print_r($filesTestate);
			
			//print_r($filesList);
			
			$addFiles = '';
			for ( $z=0; $z<count($filesList); $z++)  {

				  $abilitatiFromLangToLang = explode("-", $filesList[$z]);
				  
				  /*
				        Controlam daca acest file are statutul 3 
						ceea ce inseamna ca fisierul a fost tradus de catre traducator si asteapta moderare 
				  */
				  $link_download_file = '';
				  $link_download_traducere = '';
				  $link_accepta_traducere = '';
				  $link_respinge_traducere = '';
				  
				  if ( $filesTestate[$filesList[$z]]['statut_file'] == 3 ) { 
				  
		              $fisierNumeServer = myF(myQ("
		                  SELECT * 
		                  FROM `[x]traducatori_fisiere_test` 
		                  WHERE `lang_id`='".$filesTestate[$filesList[$z]]['from_lang']."'   
	                  "));		

					 
					  $link_download_file       = "<a href=?L=download.file&chromeless=1&path=".urlencode("system/cache/traducatori_test")."&file=".urlencode($fisierNumeServer['file_name']).">Download file</a>"; 
				      $link_download_traducere  = "<a href=?L=download.file&chromeless=1&path=".urlencode("system/cache/traducatori_test_tradus")."&file=".urlencode($filesTestate[$filesList[$z]]['trans_name']).">Download traducere</a>"; 
				      $link_accepta_traducere   = "<a href=?L=moderator.traducatori.traducatori_test&accept=1&id_trad=".$lisFis["id"]."&trad=".$filesList[$z].">Accepta traducere</a>"; 
				      $link_respinge_traducere  = "<a href=?L=moderator.traducatori.traducatori_test&respinge=1&id_trad=".$lisFis["id"]."&trad=".$filesList[$z].">Respinge traducere</a>"; 
				  }
				  else if ( $filesTestate[$filesList[$z]]['statut_file'] == 4 ) { 
				  
				      $link_download_file       = "<font color=#009900><b>Acceptat</b></a>"; 
				  }
				  else if ( $filesTestate[$filesList[$z]]['statut_file'] == 5 ) { 
				  
				      $link_download_file       = "<font color=red><b>Respins</b></a>"; 
				  }
				  

				 
				  $addFiles .= "<tr>
								  <td width=10>".($z+1).".</td>
								  <td width=70>"._fnc("lang_data", $abilitatiFromLangToLang[0], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</td>
								  <td width=15>-></td>
								  <td width=70>"._fnc("lang_data", $abilitatiFromLangToLang[1], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</td>
								  <td>&nbsp;".$link_download_file."</td>
								  <td>&nbsp;".$link_download_traducere."</td>
								  <td>&nbsp;".$link_accepta_traducere."</td>
								  <td>&nbsp;".$link_respinge_traducere."</td>
								  <td>&nbsp;</td>
								</tr>";  
		    }
			
			
			if ( $_GET['list']=='complet' ) { 
			
				  $addFilesNew = "<tr>
									<td>
										<table cellpadding=\"0\" cellspacing=\"3\" border=\"0\" width=\"100%\" style=\" margin:5px; padding-left:10px; padding-top:5px; padding-bottom:5px; border:1px #CCCCCC solid; background-color:#f5f5f5\">
										
										".$addFiles." 
										
										</table>
									</td>
								</tr>";  
			}
			
			$repFis[$i]["traducator.id.inc"]           = ($i+1);
			$repFis[$i]["id.trad"]                     = $lisFis["id"];
			$repFis[$i]["traducator.nume"]             = ucwords($numePrenume[0]);
			$repFis[$i]["traducator.prenume"]          = ucwords($numePrenume[1]);
			$repFis[$i]["traducator.listaTestare"]     = $addFilesNew!=''?$addFilesNew:'';
			   
			
			$i++;
		}
			

        /*
		    AFISAM Lista pentru CALCUL PRET 
		*/
		if (isset($repFis) ) {
			
			$tpl -> Zone("listaTrad",   "enabled");
			$tpl -> Loop("tradActivam", $repFis);
		
		}  else $tpl -> Zone("listaTrad", "empty");

  	}
 
 


	$tpl -> CleanZones();
	$tpl -> Flush();
?>