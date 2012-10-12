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
	
	if (me('id')) { 
	
 		/*	Submit occured? Let's handle that! */
		if (isset($_POST["SubmitEditData"])) {
			
			/* toate valorile din POST trec in SESSION */
			foreach ($_POST as $var => $val) {
				$_SESSION["REGISTER"][$var] = $val;
			}
					
			/* Check email address */
			if (
				!isset($_SESSION["REGISTER"]["email"]) 
				|| $_SESSION["REGISTER"]["email"] == "" 
				|| !preg_match($CONF["REGEXP_EMAIL"], $_SESSION["REGISTER"]["email"])) 
				
			{			
				_fnc("reload", 0, "?L=c.editProfile&error=emailNone");
				die;
										
			} else {
				
				/* Check contactperson */
				if ( $_SESSION["REGISTER"]["contactperson"]=='' ) {
				
					_fnc("reload", 0, "?L=c.editProfile&error=nperror");
					die;
				
				} elseif ( $_SESSION["REGISTER"]["phone"]=='' ) {
				
					_fnc("reload", 0, "?L=c.editProfile&error=perror");
					die;
				
				} elseif ( $_SESSION["REGISTER"]["name"]=='' ) {
				
					_fnc("reload", 0, "?L=c.editProfile&error=nerror");
					die;
				
				} else {
					
					myQ("UPDATE `[x]companies` 
						 SET `phone`='".$_SESSION["REGISTER"]["phone"]."', 
							 `contact_person`='".$_SESSION["REGISTER"]["contactperson"]."', 
							 `name`='".$_SESSION["REGISTER"]["name"]."'								 
						 WHERE `company_id`='".$_SESSION["REGISTER"]['companyid']."' 
						 LIMIT 1
					");			
					
					myQ("UPDATE `[x]users` 
						 SET `email`='".$_SESSION["REGISTER"]["email"]."' 
						 WHERE `id`='".$_SESSION["REGISTER"]['companyid']."' 
						 LIMIT 1
					");			
					
 					_fnc("reload", 0, "?L=c.editProfile&update=succesD");
					die;
  				}
			}
				  
		} else {
		
			_fnc("reload", 0, "?L=c.editProfile&error=noPostData");
			die;
		}
		
	} else {
	
		_fnc("reload", 0, "?");
		die;
	}
 
 	
	$tpl -> CleanZones();
	$tpl -> Flush();
?>