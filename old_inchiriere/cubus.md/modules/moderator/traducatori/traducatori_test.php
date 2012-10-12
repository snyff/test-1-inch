<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Translation, CUBUS - info@cubus.md                 //
// Last modification date:  01.07.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007 - 2008  CUBUS Translation - All rights reserved                          //
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
				FROM `[x]traducatori` 
				WHERE `id_traducator` = '".(int)$_GET['id_trad']."'
			"));			
			
			$dataUserTrad = unpk($acceptUserTrad["abilitati"]);
			
			$dataUserTrad[$_GET['trad']]['statut_file'] = 4; 						
			
			myQ("
	             UPDATE `[x]traducatori` 
	             SET 
				       `abilitati`='".pk($dataUserTrad)."'
	             WHERE `id_traducator`='".$_GET['id_trad']."' 
	        ");					
			
			_fnc("reload", 0, "?L=moderator.traducatori.traducatori_test&list=complet&t=12");
			die();
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
				FROM `[x]traducatori` 
				WHERE `id_traducator` = '".(int)$_GET['id_trad']."'
			"));
			
			$dataUserTrad = unpk($acceptUserTrad["abilitati"]);
			
			$dataUserTrad[$_GET['trad']]['statut_file'] = 5; 
			
			myQ("
	             UPDATE `[x]traducatori` 
	             SET 
				       `abilitati`='".pk($dataUserTrad)."'
	             WHERE `id_traducator`='".$_GET['id_trad']."' 
	        ");					
			
			_fnc("reload", 0, "?L=moderator.traducatori.traducatori_test&list=complet&t=21");
			die();
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
		$listaTraducatori = myQ("
			SELECT *
			FROM `[x]traducatori`
 			ORDER BY `id_traducator` DESC
		");
		

		/*
		     Afisam lista cu documente
		*/
		$i=0;
		
		while ($lis_Traducatori = myF($listaTraducatori)) {
		
			
			$z=1;
			/*
			     Datele care sunt introduse in HTML 
			*/
			$numePrenume = explode(".", _fnc("user", $lis_Traducatori['id_traducator'], "username"));
			
            /*
			    LISTA DE TRADUCERI EFECTUATE 
				sau NEEFECTUATE 
			*/
            $selectAbilitati = unpk($lis_Traducatori["abilitati"]);
			
			//print_r($selectAbilitati); echo "<br><br>";
			
			$addFiles = '';
			foreach ($selectAbilitati as $key => $val) {
			
				// cream WHERE pentru select 
				if ( $key !='lucrezCuTraducerea' ) {
	
					  $abilitatiFromLangToLang = explode("-", $key);
					  
					  /*
							Controlam daca acest file are statutul 3 
							ceea ce inseamna ca fisierul a fost tradus de catre traducator si asteapta moderare 
					  */
					  $link_download_file = '';
					  $link_download_traducere = '';
					  $link_accepta_traducere = '';
					  $link_respinge_traducere = '';
					  
					  if ( $selectAbilitati[$key]['statut_file'] == 3 ) { 
					  
						  $fisierNumeServer = myF(myQ("
							  SELECT * 
							  FROM `[x]traducatori_fisiere_test` 
							  WHERE `lang_id`='".$selectAbilitati[$key]['from_lang']."'   
						  "));		
	
						 
						  $link_download_file       = "<a href=?L=download.file&chromeless=1&path=".urlencode("system/cache/traducatori_test")."&file=".urlencode($fisierNumeServer['file_name']).">Download file</a>"; 
						  $link_download_traducere  = "<a href=?L=download.file&chromeless=1&path=".urlencode("system/cache/traducatori_test_tradus")."&file=".urlencode($selectAbilitati[$key]['trans_name']).">Download traducere</a>"; 
						  $link_accepta_traducere   = "<a href=?L=moderator.traducatori.traducatori_test&accept=1&id_trad=".$lis_Traducatori["id_traducator"]."&trad=".$key.">Accepta traducere</a>"; 
						  $link_respinge_traducere  = "<a href=?L=moderator.traducatori.traducatori_test&respinge=1&id_trad=".$lis_Traducatori["id_traducator"]."&trad=".$key.">Respinge traducere</a>"; 
					  }
					  else if ( $selectAbilitati[$key]['statut_file'] == 4 ) { 
					  
						  $link_download_file       = "<font color=#009900><b>Acceptat</b></a>"; 
					  }
					  else if ( $selectAbilitati[$key]['statut_file'] == 5 ) { 
					  
						  $link_download_file       = "<font color=red><b>Respins</b></a>"; 
					  }
					  

					  $addFiles .= "<tr>
									  <td width=10>".($z).".</td>
									  <td width=70>"._fnc("lang_data", $abilitatiFromLangToLang[0], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</td>
									  <td width=15>-></td>
									  <td width=70>"._fnc("lang_data", $abilitatiFromLangToLang[1], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</td>
									  <td>&nbsp;".$link_download_file."</td>
									  <td>&nbsp;".$link_download_traducere."</td>
									  <td>&nbsp;".$link_accepta_traducere."</td>
									  <td>&nbsp;".$link_respinge_traducere."</td>
									  <td>&nbsp;</td>
									</tr>";  
				
				
					$z++;
				}
		    }
			
			
			if ( $_GET['list']=='complet' ) { 
			
				  $addFilesNew = "<tr>
									<td colspan=3>
										<table cellpadding=\"0\" cellspacing=\"3\" border=\"0\" width=\"100%\" style=\" margin:5px; padding-left:10px; padding-top:5px; padding-bottom:5px; border:1px #CCCCCC solid; background-color:#f5f5f5\">
										
										".$addFiles." 
										
										</table>
									</td>
								</tr>";  
			}
			
			$repFis[$i]["traducator.id.inc"]           = ($i+1);
			$repFis[$i]["id.trad"]                     = $lis_Traducatori["id_traducator"];
			$repFis[$i]["traducator.nume"]             = ucwords($numePrenume[0]);
			$repFis[$i]["traducator.prenume"]          = ucwords($numePrenume[1]);
			$repFis[$i]["traducator.listaTestare"]     = $addFilesNew!=''?$addFilesNew:'';  
			$repFis[$i]["editor.active"]               = _fnc("traducatorEditor", $lis_Traducatori["id_traducator"], "editor_active")==0?' color:#FF0000 ':' color:#009900 ';  
			   
			
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