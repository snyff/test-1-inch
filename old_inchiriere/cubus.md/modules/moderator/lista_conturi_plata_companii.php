<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  27.12.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("lista_conturi_plata_companii");
	$tpl -> GetObjects();
	
		     
	//_fnc("userAcces", $_GET['L']);

########################################################
    /*
         ACTIVAM ZONE
    */
########################################################
	if (me('id')) {	
		
		$tpl -> Zone("checkContPlata",      "enabled");
		$tpl -> Zone("cubusSteps",          "enabled");
		$tpl -> Zone("contacteCubus",       "enabled");
		$tpl -> Zone("contContabilitate",   "enabled");

	}
	else $tpl -> Zone("checkContPlata", "guest");
	
  	

########################################################
    /*
         Afisam conturi de plata
    */
########################################################

	if ( me('id') ) {
	
		/*
		    P{rofilul companiei sau a persoanei fizice
		*/
		if ( _fnc("user", $_GET['companyid'], 'email_verified') == 1 ) { 
	    		
	    		/*
	    		    COMPANY DATA 
	    		*/
	    		$company_data =  unpk(_fnc("user", $_GET['companyid'], 'profile_data'));
				
				//print_r($company_data);
				
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
			        "{company.contbancar}"        => $company_data['contbancar'],
			        "{company.denumireabancii}"   => $company_data['denumireabancii']
			    );
			   
			    $tpl -> AssignArray(array("date.de.contact" => strtr($GLOBALS["OBJ"]["dateCompanie"], $dataCompanyArray)));
		}
		elseif ( _fnc("user", $_GET['companyid'], 'email_verified') == 2 ) { 
			    
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
			   
			    $tpl -> AssignArray(array("date.de.contact" => strtr($GLOBALS["OBJ"]["datePersoanaFizica"], $dataPersoanaFizicaArray)));
		}
		else {
			
			    $repContPlata[$i]["date.de.contact"]    = '-----//----//----//----';
		}
			
		
		
		
		$contPlataSelect = myQ("
			SELECT *
			FROM `[x]cont_plata`
			WHERE `achitat` = '4' AND `company` = '".$_GET['companyid']."'
			ORDER BY `id` DESC
		");
		

		$i=0;
		while ($contPlata = myF($contPlataSelect)) {
			
			/*
			    Lista de fisiere din cont de plata
			*/
		    $filesNAME = unpk($contPlata["files_name"]);
			if ( !is_array($filesNAME) ) { $filesNAME = array(); }
			
			$addFiles = '';
			for ( $z=0; $z<count($filesNAME); $z++)  {

				   $addFiles .= "<tr>
				                  <td width=10>".($z+1).".</td>
							      <td>".$filesNAME[$z]."</td>
							      <td>----</td>
								  <td width=200></td>
								</tr>"; 
		    }
			
			$dataAboutCont = unpk($contPlata['moderator']);
			if ( !is_array($dataAboutCont) ) { $dataAboutCont = array(); } 
			
			if ( $dataAboutCont['contconfirmat'] == 1 ) { $statut_contconfirmat = 0; $contconfirmat_img = 'ok.png'; }
			else                                        { $statut_contconfirmat = 1; $contconfirmat_img = 'notok.png'; }
			
			if ( $dataAboutCont['factura'] == 1 )  { $statut_factura = 0; $factura_img = 'ok.png'; }
			else                                   { $statut_factura = 1; $factura_img = 'notok.png'; }
			
			if ( $dataAboutCont['contract'] == 1 ) { $statut_contract = 0; $contract_img = 'ok.png'; }
			else                                   { $statut_contract = 1; $contract_img = 'notok.png'; }
			
			if ( $dataAboutCont['act'] == 1 )      { $statut_act = 0; $act_img = 'ok.png'; }
			else                                   { $statut_act = 1; $act_img = 'notok.png'; }
			
			   
 			$repContPlata[$i]["contplata.id"]         = $contPlata["id"];
			$repContPlata[$i]["contplata.suma"]       = $contPlata["pretul"];
			$repContPlata[$i]["contplata.data"]       = date('d-m-Y',$contPlata["time_creat"]);
			$repContPlata[$i]["contplata.fileList"]   = ($addFiles==''?$GLOBALS["OBJ"]["tipulContuluiPlata"]:$addFiles);
			
 			$repContPlata[$i]["contplata.id"]         = $contPlata["id"]; 
 			
			$repContPlata[$i]["company.id"]           = $contPlata['company']; 
			
			$repContPlata[$i]["cont.contconfirmat.statut"]  = $statut_contconfirmat;
			$repContPlata[$i]["cont.contconfirmat.img"]     = $contconfirmat_img;
			
			$repContPlata[$i]["cont.factura.statut"]  = $statut_factura;
			$repContPlata[$i]["cont.factura.img"]     = $factura_img;
			
			$repContPlata[$i]["cont.contract.statut"] = $statut_contract;
			$repContPlata[$i]["cont.contract.img"]    = $contract_img;
			
			$repContPlata[$i]["cont.act.statut"]      = $statut_act;
			$repContPlata[$i]["cont.act.img"]         = $act_img;
			
			$repContPlata[$i]["height.mouse.over"]    = 305 + 180 * $i;
			
			$i++;
		}
		
  		
		if (isset($repContPlata)) {
			$tpl -> Zone("contPlata", "enabled");
			$tpl -> Loop("contPlata", $repContPlata);
		} 
		
		else $tpl -> Zone("contPlata", "empty");
	}


	$tpl -> CleanZones();
	$tpl -> Flush();
?>