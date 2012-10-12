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
	$tpl -> Load("contabilitate");
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

	}
	else $tpl -> Zone("checkContPlata", "guest");
	

########################################################
    /*
         Schimbam STATUT 
    */
########################################################
	
	if ( me('id')  && $_GET['ch'] != '' ) {
	
	    $SelectDataFactura = myF(myQ("
		    SELECT * 
			FROM `[x]cont_plata` 
			WHERE `id` = '".(int)$_GET['id']."'   
		"));
		
		$dataStats = unpk($SelectDataFactura['moderator']);
		if ( !is_array($dataStats) ) { $dataStats = array(); }
		
		$dataStats[$_GET['ch']] = $_GET['statut'];
		
		myQ("
		     UPDATE `[x]cont_plata` 
			 SET `moderator`='".pk($dataStats)."' 
			 WHERE `id`='".$_GET['id']."'  
		");	
		
		_fnc("reload", 2, "?L=moderator.lista_conturi_plata_companii&companyid=".$_GET['company']);
		die;
	}	
	
	
	

########################################################
    /*
         Afisam lista de companii care au conturi de plata 
    */
########################################################

	if ( me('id') ) {
	
		$listaCompanii = myQ("
			SELECT *
			FROM `[x]cont_plata`
			WHERE `achitat` = '4' 
			GROUP BY `company`
		");
		
		$i=1;
		while ($listaCompaniiCP = myF($listaCompanii)) {
		    
			
			$eroareFactura = myQ("
    			SELECT *
	    		FROM `[x]cont_plata`
		    	WHERE `achitat` = '4' AND `company` = '".$listaCompaniiCP['company']."'
    			ORDER BY `id` DESC
	    	");
		
			$alleroare['contconfirmat'] = '';
			$contconfirmateroare = '';
			$facturaeroare = '';
	    	while ($eroareFacturadata = myF($eroareFactura)) {
			    
				 $alleroare = unpk($eroareFacturadata['moderator']); 
				 
				 if ($alleroare['factura']=='' || $alleroare['factura']==0) {
				 
				     $facturaeroare = 'eroare';
				 } 				  
			 
				 if ($alleroare['contconfirmat']=='' || $alleroare['contconfirmat']==0) {
				 
				     $contconfirmateroare = 'eroare';
				 } 				  
			}           

			/*
			    COMPANY LIST DATA 
			*/
			$arr_cp  = array(

		        "{point.companie}" => $i,
		    );
			
			$company_list_data =  unpk(_fnc("user", $listaCompaniiCP['company'], 'profile_data'));
			$company_list_user =  _fnc("user", $listaCompaniiCP['company'], 'username');
			
 			$repListaCompanii[$i]["nume.companie"]         = $company_list_data['numele']." (".$company_list_user.")"; 			
 			$repListaCompanii[$i]["eroare.contconfirmat"]  = ($contconfirmateroare=='eroare')?strtr($GLOBALS["OBJ"]["newcp"], $arr_cp):strtr($GLOBALS["OBJ"]["cp"], $arr_cp); 			
 			$repListaCompanii[$i]["eroare.companie"]       = ($facturaeroare=='eroare')?'<font color=red><b>factura</b></font>':''; 			
 			$repListaCompanii[$i]["id.companie"]           = $listaCompaniiCP['company']; 			
			
			$i++;
		}
            
		if (isset($repListaCompanii)) {
			$tpl -> Zone("dateCompanii", "enabled");
			$tpl -> Loop("dateCompaniiloop", $repListaCompanii);
		} 
 	}



	$tpl -> CleanZones();
	$tpl -> Flush();
?>