<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  13.01.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
 
	$tpl =  new template;
	$tpl -> Load("registration");
 
	if (me('id') != "") {
		$tpl -> Zone("regform", "success");
	 	_fnc("reload", 3, "?");
	} 
	
	if ($_GET['user']=='translator') $tpl -> Zone("translator", "enabled");
	
 	session_unregister("REG_ID");


	/* Handle Submit */
	if (isset($_POST["Submit"]) || isset($_POST["Correct"])) {
		
		$errBreak = false;
		
		/* toate valorile din POST trec in SESSION */
		foreach ($_POST as $var => $val) {
			$_SESSION["REGISTER"][$var] = $val;
		}
		
		/* se controleaza datele cu email */		
	    if ( $_SESSION["REGISTER"]["email"] ) { $tpl->AssignArray(array("user.email"=> $_SESSION["REGISTER"]["email"])); } 
		else {  $tpl->AssignArray(array("user.email"=> '')); }

		
 		/* Check email address */
		if (
			!isset($_SESSION["REGISTER"]["email"]) 
			|| $_SESSION["REGISTER"]["email"] == "" 
			|| !preg_match($CONF["REGEXP_EMAIL"], $_SESSION["REGISTER"]["email"])) 
			
		{			
			$tpl -> Zone("regform", "regformm");
			$tpl -> Zone("error", "email");
						
		} else {
			
			/* Check Cloned email addresses */
			if (!$CONF["REGISTRATION_ALLOW_DUPLICATE_EMAIL"] && myNum(myQ("
				SELECT `email` 
				FROM `[x]users` 
				WHERE `email`='{$_SESSION["REGISTER"]["email"]}'
			")) > 0) {

				$tpl -> Zone("regform", "regformm");
				$tpl -> Zone("error", "emailClone");
				
				session_unregister("REGISTER");
			
			} else {

				/* Check Password form */
				if (
					!isset($_SESSION["REGISTER"]["password"]) 
					|| $_SESSION["REGISTER"]["password"] == "" 
					|| strlen($_SESSION["REGISTER"]["password"]) < $CONF["USERS_PASSWORD_MIN_LEN"] 
					|| strstr($_SESSION["REGISTER"]["password"], " ")) {
					
					$tpl -> Zone("regform", "regformm");
					$tpl -> Zone("passworderror", "lenghterr");
				
				} else {
					
					/* Check password against passcheck */
					if (
						!isset($_SESSION["REGISTER"]["passcheck"]) 
						|| $_SESSION["REGISTER"]["passcheck"] != $_SESSION["REGISTER"]["password"]) {
						
						$tpl -> Zone("regform", "regformm");
						$tpl -> Zone("passworderror", "nomatch");
					
					} else {
						
						/* Check verification code */
						if (
							!isset($_SESSION["REGISTER"]["code"]) || 
							!isset($_SESSION["REGISTER"]["syscode"]) || 
							$_SESSION["REGISTER"]["code"] != $_SESSION["REGISTER"]["syscode"]) {
							
							$tpl -> Zone("regform", "regformm");
							$tpl -> Zone("error", "code");
						
						} else {
							
							/* Check contactperson */
							if ( $_SESSION["REGISTER"]["contactperson"]=='' ) {
							
								$tpl -> Zone("regform", "regformm");
								$tpl -> Zone("contactperson", "nperror");
							
							} elseif ( $_SESSION["REGISTER"]["phone"]=='' ) {
							
								$tpl -> Zone("regform", "regformm");
								$tpl -> Zone("phone", "perror");
							
							} else {
								
								/* Form was correctly filled */
								if (!isset($_SESSION["REG_ID"])) {
									
									/* Save to database */
									myQ("
										INSERT INTO `[x]users` 
										(
											`email`,
 											`password`,
											`active`,
											`registration_date`,
											`user_type`
										)
										VALUES
										(
											'{$_SESSION["REGISTER"]["email"]}',
 											'".md5($_SESSION["REGISTER"]["password"])."',
											'1',
											'".date("U")."',
											'".$_SESSION["REGISTER"]["user_type"]."'
										)
									");
									
									$id = mysql_insert_id();
 									
									
									if ( $_SESSION["REGISTER"]["user_type"]==1 || $_SESSION["REGISTER"]["user_type"]==2 ) {
									
										myQ("
											INSERT INTO `[x]companies` (
												`company_id`,
												`contact_person`,
												`phone`
												
											) VALUES (
												'".$id."',
												'".$_SESSION["REGISTER"]["contactperson"]."',
												'".$_SESSION["REGISTER"]["phone"]."'
											)
										");
										
 									} elseif ( $_SESSION["REGISTER"]["user_type"]==3 ) {
									
										myQ("
											INSERT INTO `[x]translators` (
												`id`,
												`name`,
												`phone`
												
											) VALUES (											
												'".$id."',
												'".$_SESSION["REGISTER"]["contactperson"]."',
												'".$_SESSION["REGISTER"]["phone"]."'
											)
										");
									}
									
									$dataToMailArray = array(
										"siteName" => $CONF["SITE_NAME"],
										"siteURL" => "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']),
									) + $_SESSION["REGISTER"];
									
									_fnc("sendMail", "registration.tpl", $dataToMailArray, $_SESSION["REGISTER"]["email"]);


									$_SESSION["REG_ID"] = $id;
									session_unregister("REGISTER");
									
									$_SESSION["id"] = $id;
									
									$tpl -> Zone("regform", "success");
									_fnc("reload", 3, "?");

								}
							}
						}
					}
				}
			}
		}
	
	} else {
	
		$tpl -> Zone("regform", "regformm");	
 	    $tpl->AssignArray(array("user.email"=>'')); 
	}

	/* Username min/max len values */
	$replace["password_minlen"] = $CONF["USERS_PASSWORD_MIN_LEN"];


	/* Generate the random verification code */
	$replace["vcode"] = rand(1000,2400);
 	$tpl -> AssignArray($replace);
	
	$tpl -> CleanZones();
	$tpl -> Flush();
	
?>