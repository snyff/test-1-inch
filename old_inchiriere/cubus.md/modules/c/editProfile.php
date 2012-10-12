<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  19.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
 	$tpl = new template;
	$tpl -> Load("editProfile");
	$tpl -> GetObjects(); 
		
  		/**/
  		if (me("id")) $tpl->Zone("islogin", "login"); 
 		
		/* Conturi de plata */
		if ( me('id') ) { 
 
			$tpl -> AssignArray(array(
 				"company.name"        => _fnc("company",  me("id"), 'name', ''),
 				"name.contact.person" => _fnc("company",  me("id"), 'contact_person', ''),
 				"company.phone"       => _fnc("company",  me("id"), 'phone', ''),
 				"company.email"       => _fnc("user",     me("id"), 'email', ''),
 				"company.id"          => _fnc("company",  me("id"), 'company_id', '')
 			));
			
			if ($_GET['error']=='nerror')       $tpl->Zone("companyname", "cnerror"); 
			if ($_GET['error']=='perror')       $tpl->Zone("phone", "perror"); 
			if ($_GET['error']=='nperror')      $tpl->Zone("contactperson", "nperror"); 
			if ($_GET['error']=='emailNone')    $tpl->Zone("error", "email"); 

			if ($_GET['error']=='oldpasserror') $tpl->Zone("oldpass", "olderror"); 
			if ($_GET['error']=='newpasserror') $tpl->Zone("newpass", "nperror"); 
		
			if ($_GET['update']=='succesD') $tpl->Zone("updateD", "enabled"); 
			if ($_GET['update']=='succesP') $tpl->Zone("updateP", "enabled"); 
 		}
				
		
		// daca nu etse logat incarcam modulul care scoate alerta pentru logare
		if ( !me("id") ) $tpl -> Zone("islogin", "guest");
		
  
	$tpl -> CleanZones();
	$tpl -> Flush();

?>