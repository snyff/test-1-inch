<?php  
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  05.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


//echo date("d-m-Y" , 1255020309);

// INITIALIZE SYSTEM //////////////////////////////////////////////////////////////////
	
 	/* System Internal Check */
	define("CORE_STRAP", true);
	
	//echo md5('marianairpmd');
	

	/* Check System installation and/or include the configuration file */
	@include("system/conf.inc.php");
	if (!defined("INSTALLED")) header("Location: install/index.php");
	
	
	/* Database configurations alternative inclusion */
	@include("system/db.inc.php");
 
 	
 	/* UTF8 Header Override */
	($CONF["LOCALE_FORCE_UTF8_HEADER_OVERRIDE"]?header('Content-type: text/html; charset=utf-8'):false);
	
	
	/* Set globalized variables */
	$GLOBALS["SYSTEM_VERSION"] = "CUBUS Translation";
	$GLOBALS["CHROMELESS_MODE"] = false;
	

	/* Set session parameters */
	session_start();
	
	
	/* Include core-level functions and classes */
	require("system/functions/classes/template.class.php");
	require("system/functions/database/mysql.fnc.php");
	require("system/functions/classes/class.ezpdf.php");
	
	
// ERROR HANDLING AND REPORTING PROCEDURE CALL ////////////////////////////////////////
	/* Set error reporting values */
	 
	error_reporting(
		($CONF["ERROR_REPORT_ERRORS"]?		E_ERROR:	false) | 
		($CONF["ERROR_REPORT_WARNINGS"]?	E_WARNING:	false) | 
		($CONF["ERROR_REPORT_PARSES"]?		E_PARSE:	false) | 
		($CONF["ERROR_REPORT_NOTICES"]?		E_NOTICE:	false)
	); 
	
	
// SQL INJECTIONS / XSS HACKS PROTECTION //////////////////////////////////////////////
	$entities = array(";"=>"&#059;", "\""=>"&quot;", "'"=>"&#039;", "<"=>"&lt;", ">"=>"&gt;", "\\"=>"&#092;", "^"=>"&#094;", "{"=>"&#123;", "}"=>"&#125;");
	
	if (isset($_POST)) foreach($_POST as $var => $val) 
		if (!is_array($val) and substr($var, 0, 1) != "_")
			$_POST[$var] = trim(strtr(stripslashes($val), $entities));

	if (isset($_GET)) foreach($_GET as $var => $val)
		if (!is_array($val) and substr($var, 0, 1) != "_")
			$_GET[$var] = trim(strtr(stripslashes($val), $entities));

	unset ($var, $val, $entities);


// SELF USER DATA PREPARATION CALL ////////////////////////////////////////////////////
	me('id');
	
	/* Schimbam limba pentru datele din DB */	
	if ( $_SESSION['currentlang']!='' ) { $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"] = $_SESSION['currentlang']; }
	elseif ( me("language")!='' )       { $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"] = me("language"); }                           
	

// LOGIN & LOGOUT SYSTEM //////////////////////////////////////////////////////////////		
	if (isset($_POST["email"], $_POST["password"], $_POST[$CONF["LOGIN_SIGNAL_TRIGGER"]])) {
		
		/*
			If we got a login signal, a password and a username, we will
			proceed to check login information. We will first extract
			the user row from the db.
		*/
		$user = myF(myQ("
			SELECT `email`,`password`,`id`,`disable_until`,`active`
			FROM `[x]users` 
			WHERE LCASE(`email`)='".strtolower($_POST["email"])."'
		"));
		
		if (!$user["id"]) $GLOBALS["LOGIN_FAIL_TYPE"] = "e.user";
		elseif ($user["active"] != 1 && $CONF["LOGIN_REQUIRE_ACTIVE"]) $GLOBALS["LOGIN_FAIL_TYPE"] = "e.active";

		else {
			/*
				If the user's account 'disabled' value is greater than 
				the actual date value, and that the bruteforce protection
				system is enabled, we will show an error message
			*/
			if (($user["disable_until"] > date("U")) && ($CONF["LOGIN_BRUTEFORCE_PROTECT:ENABLE"])) {
				 $GLOBALS["LOGIN_FAIL_TYPE"] = "e.bruteforce";
				(isset($_SESSION["loginFailCount"])?session_unregister('loginFailCount'):false);
			}

			/*
				Account is not disabled
			*/
			else {
				if ((isset($_SESSION["loginFailCount"])) && ($_SESSION["loginFailCount"] > $CONF["LOGIN_BRUTEFORCE_FAILCOUNT"])) {
						
					myQ("UPDATE `[x]users`
						SET `disable_until` = ".(date("U")+$CONF["LOGIN_BRUTEFORCE_DISABLE_DURATION"])."
						WHERE LCASE(`email`)='".strtolower($_POST["email"])."'
						LIMIT 1"
					);
					
					(isset($_SESSION["loginFailCount"])?session_unregister('loginFailCount'):false);
					$GLOBALS["LOGIN_FAIL_TYPE"] = "e.bruteforce";
				}
					
				else {
						
					/*
						All the information correct, we will proceed to login
					*/
					if ($user["password"] == md5(trim($_POST["password"]))) {
						$_SESSION["id"] = (integer)$user["id"];
						
						session_write_close();
												
						/*
							Update the last login key
						*/
						$me_last_login = me("last_login");
						myQ("UPDATE `[x]users` SET `last_login`='".date("U")."' WHERE `id`='".me('id')."'");
						
            			
						if ($_SESSION['currentlang']!='') {
						
				    		myQ("UPDATE `[x]users`
                 				SET `language` = '".$_SESSION['currentlang']."'
                				WHERE `id`='".me("id")."'
                				LIMIT 1"
                			);
						}
						
						/*
							Route the user
						*/
						if (!$GLOBALS["WAP_MODE"]) {
							header("Location: ".(!$me_last_login?$CONF["LOGIN_FIRST_ROUTE_TO"]:$CONF["LOGIN_ROUTE_TO"]));
						} else header("Location: {$CONF["WAP_LOGIN_ROUTE_TO"]}");
					} 
						
					else {
						(isset($_SESSION["loginFailCount"])?$_SESSION["loginFailCount"]++:$_SESSION["loginFailCount"]=1);
						$GLOBALS["LOGIN_FAIL_TYPE"] = "e.password";
					}
				}
			}
		}
	}
	
//  Acces moderator ////////////////////////////////////////////////////
	/* Acces moderator */
	if ( me("id") ) {
	
		//_fnc("userAccesModerator", me("id"));		
	} 
	
	
//  LOGOUT_SIGNAL_TRIGGER ////////////////////////////////////////////////////
	if ((isset($_GET[$CONF["LOGOUT_SIGNAL_TRIGGER"]])) && (!isset($_POST[$CONF["LOGIN_SIGNAL_TRIGGER"]]))) {
		
		/*
			Handle admin swapping
		*/
		if (isset($_SESSION["swap_id"])) {
			
			//echo '111111';

			$_SESSION["id"] = $_SESSION["swap_id"];
			session_unregister("swap_id");
			header("Location: ?L=moderator.files.filesList");
		}
		
		else {
			
			(isset($_SESSION["id"])?session_unregister('id'):false);
			(isset($_SESSION["SELF_USER_DATA"])?session_unregister('SELF_USER_DATA'):false);

			header("Location: {$CONF["LOGOUT_ROUTE_TO"]}");	
		}
		die;
	}

	
  
// ROUTING & ACCESS CONTROL ///////////////////////////////////////////////////////////

	// THEME HANDLING /////////////////////////////////////////////////////////////////
	if (($CONF["ALLOW_THEME_OVERRIDE"]) && (me('use_theme'))) $GLOBALS["THEME"] = me('use_theme');
	else ($CONF["DEFAULT_THEME"]?$GLOBALS["THEME"]=$CONF["DEFAULT_THEME"]:$GLOBALS["THEME"]="default");

	// BANNING CHECK SYSTEM ///////////////////////////////////////////////////////////
	if ($CONF["BAN_ENABLE_BANCHECK"]) {
		
		$ip = ip2long( 
			($CONF["BAN_CHECK_PROXY"] && isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != ""
				?$_SERVER['HTTP_X_FORWARDED_FOR']
				:$_SERVER['REMOTE_ADDR']
			)
		);

		/* Ban Layer 1 (Persistant cookie) */
		if ($CONF["BAN_ENFORCE"] && isset($_COOKIE["b_expire"]) && $_COOKIE["b_expire"] > date("U")) {
			$GLOBALS["BANNED"] = true;
		}
		
		/* Ban layer 2 (IP Based) */
		$banArray = unpk(file_get_contents($CONF["BAN_INFOFILE"]));

		if (is_array($banArray)) {
			foreach($banArray as $banEntity) {
				if (($banEntity["FROM"] <= $ip && $banEntity["TO"] >= $ip) && ($banEntity["EXPIRE"] > date("U"))) {

					$GLOBALS["BANNED"] = true;
					$GLOBALS["BANARRAY"] = $banEntity;
					break;
		}	}	}

		if (isset($GLOBALS["BANNED"]) && $GLOBALS["BANNED"]) {
			
			if ($CONF["BAN_ENFORCE"]) {
				setcookie("b_expire", $expire=(isset($GLOBALS["BANARRAY"])&&is_array($GLOBALS["BANARRAY"]?$GLOBALS["BANARRAY"]["EXPIRE"]:date("U")+3600)), $expire);
			}
			
			$banTemplate = new template;
			$banTemplate -> LoadThis(file_get_contents("theme/{$GLOBALS["THEME"]}/templates/GLOBALS/banned.tpl"));
			$banTemplate -> AssignArray(array(
				"expire" => date($CONF["LOCALE_LONG_DATE_TIME"], $GLOBALS["BANARRAY"]["EXPIRE"]),
				"body" => $GLOBALS["BANARRAY"]["BODY"],
				"by" => $GLOBALS["BANARRAY"]["BY"]
			));
			$banTemplate -> Flush();
			
			if ($CONF["BAN_FORCE_SUICIDE"]) { 
				die($CONF["BAN_FORCE_SUICIDE_MESSAGE"]);
			}
		}	
	}
	

	// CHROME CONTROL /////////////////////////////////////////////////////////////////
	if (isset($_GET["chromeless"]) and $CONF["ALLOW_CHROME_CONTROL"]) $GLOBALS["CHROMELESS_MODE"] = true;

	// MAINTENANCE MODE HANDLING //////////////////////////////////////////////////////
	if ($CONF["MAINTENANCE_MODE_ON"]) {
		if (!$GLOBALS["CHROMELESS_MODE"] and (me('is_administrator') or me('is_super_administrator'))) {
			
			$tpl = new template;
			$tpl -> Load($CONF["MAINTENANCE_MODE_ADMIN_TEMPLATE"]);
			$tpl -> Flush();
		} 
		
		else if (!$GLOBALS["CHROMELESS_MODE"]) {
			$tpl = new template;
			$tpl -> Load($CONF["MAINTENANCE_MODE_TEMPLATE"]);
			$tpl -> Flush();
			(isset($_GET["L"])?$_GET["L"]="":false);
			$GLOBALS["CHROMELESS_MODE"] = true;
			die();
		}
	}
	
	// SWAP MODE HEADER HANDLING //////////////////////////////////////////////////////
	if (isset($_SESSION["swap_id"]) && !$GLOBALS["CHROMELESS_MODE"]) {
		$tpl = new template;
		$tpl -> Load("!theme/{$GLOBALS["THEME"]}/templates/GLOBALS/swap_mode.tpl");
		$tpl -> Flush();
	}


	// READ THE CALLED PAGE INTO AN OB BUFFER /////////////////////////////////////////
	ob_start("theme_ob_callback");

	/* Check if the user is banned */
	if (!(isset($GLOBALS["BANNED"]) && $GLOBALS["BANNED"])) {
		
		/* Run against the "L" call and form a path to the file to be loaded */
		if (isset($_GET["L"]) && $_GET["L"] != "") { 

			$file = NULL;
			for ($i=0; $i <= count($load = explode(".", $_GET["L"]))-1; $i++) {
				if (($i != 0) && ($i != count($load))) { $file .= "/"; }
				$file .= $load[$i];
			}
		}
		
		/* Home Page */
		elseif ($GLOBALS["WAP_MODE"]) $file = $CONF["WAP_HOME_FILE"];
		else $file = $CONF["HOME_THEME_FILE"];

		/*
			Check access restrictions - If the user is an admin or a superadmin,
			it is defaulted to $grant. All other users are checked against
			the access database through the checkaccess function
		*/
		if (me('is_administrator') or me('is_superadministrator') or !isset($_GET["L"])) $grant = true;
		elseif (isset($load) && is_array($load) && in_array("admin", $load)) $grant = false;
		else $grant = checkaccess();
		
		if ($grant) {
			
			/* User is allowed to load the requested page. Let's try to do it. */
			if (!is_file("modules/{$file}.php")) echo $CONF["404_NOT_FOUND_ERROR_MESSAGE"]."\n";
			else {
				$GLOBALS["THIS_PATH"] = (isset($_GET["L"])?$_GET["L"]:"HOME");
				include ("modules/{$file}.php");
			}
  		}
		
		else {
			/* 
				User is NOT allowed to load the requested page. We will try to find
				an appropriate error template and throw it to the buffer. If we can't
				get one, we will just use the generic error message.
			*/
			if (isset($_GET["L"]) and is_file($errFile = "theme/templates/GLOBALS/errors/{$_GET["L"]}.tpl")) {
				echo "!";
				$tpl = new template;
				$tpl -> Load("!{$errFile}");
				$tpl -> Flush();
			}
			
			elseif (is_file($errFile = "theme/templates/GLOBALS/errors/generic.tpl")) {
				$tpl = new template;
				$tpl -> Load("!{$errFile}");
				$tpl -> Flush();
			}
			
			else echo $CONF["NO_ACCESS_MESSAGE"]."\n";
		}
				
	} else echo $GLOBALS["BANTEMPLATE"];
	
	
	
	ob_end_flush();
	
	

	// INCLUDE THE MAIN THEME FRAME AND PARSE IT //////////////////////////////////////
	function theme_ob_callback($buffer) {
		global $CONF;
		
		/*
			Some web servers (e.g. Apache) change the working directory of a script 
			when calling the callback function. Removing the following on those
			servers will change the global path thus prevent PHPizabi from getting
			the theme file thus producing an error output. The following function 
			will change the working directory back to its original value. 
		*/
		
		
		
		if (!ckbool($CONF["IIS_COMPATIBILITY_MODE"])) 
			@chdir(@dirname((strstr($_SERVER["SCRIPT_FILENAME"], $_SERVER["PHP_SELF"]) 
				? $_SERVER["SCRIPT_FILENAME"] 
				: $_SERVER["PATH_TRANSLATED"]
			)));
		
		/*
			in WAP mode, no theme is required, each template constitutes
			the theme AND the template content. We will just flush the
			buffer to our WAP client.
		*/
		if ($GLOBALS["WAP_MODE"]) return $buffer;
				
		/*
			Handle the chromeless & WAP calls
		*/
		if ($GLOBALS["CHROMELESS_MODE"]) {
			$tpl = new template;
			$tpl -> LoadThis($buffer);
		}

		else {
			/*
				Handle unshared frame file for home
			*/
			if (!$CONF["SHARE_FRAME_FILE_WITH_HOME"] && (!isset($_GET["L"]) or $_GET["L"] == "" or $_GET["L"] == "HOME")) {
				$tpl = new template;
				$tpl -> LoadThis($buffer);
			}
			
			else {

				if (is_file("theme/".$GLOBALS["THEME"]."/".$CONF["FRAME_THEME_FILE"])) {

					/*
						The THEME file is loaded into the template conversion
						system and procesed. The following will create the new
						template object and push the theme file content into
						its buffer
					*/
					$tpl = new template;
					$tpl -> LoadThis(file_get_contents("theme/".$GLOBALS["THEME"]."/".$CONF["FRAME_THEME_FILE"]));
				}

				/* 
					There has been an error trying to load the theme file... Throw it. 
				*/
				else return "Failed to load the theme frame and / or home file";
			}
		}
		
		/*
			We will now assign the generic theme-related replacement 
			items, the JUMP call and the ThemePath values are passed
			with the next line.
		*/
			if ($_GET['L']=='' || $_GET['ld']==1) $bodyLoad = " onload=\"initListGroup('languages', document.languages.from_languages, document.languages.to_languages, document.languages.file_types, '')\"";
		elseif ($_GET['ld']==2                  ) $bodyLoad = " onload=\"initListGroup('languages', document.languages.from_languages, document.languages.to_languages, document.languages['file_types[]'], '')\"";
		else                                      $bodyLoad = ""; 
		
		if ($_GET['cDetails']>0) {
		
			$client_data = _fnc("company", $_GET['cDetails'], '', 'html');		
			/* contact data */
			$clientDataArray = $client_data;
			$clientDataArray["{email}"] = (_fnc("user", $_GET['cDetails'], 'email')!='')?_fnc("user", $_GET['cDetails'], 'email')!='':'---';
 		
			if (_fnc("user", $_GET['cDetails'], 'user_type')==1) {
				$clientdata = strtr($GLOBALS["OBJ"]["companyData"], $clientDataArray);
			} else {
				$clientdata = strtr($GLOBALS["OBJ"]["personData"], $clientDataArray);
			}
			
		} elseif ( isset($_GET['cDetails']) ) $clientdata = $GLOBALS["OBJ"]["noCompanyPersonData"];		
		  else                                $clientdata = '';
		
		
		if ($_GET['fDetails']>0) {
			
			$file_d = _fnc("files", '', $_GET['fDetails'], '', 'html');
			if ($file_d["{price_discount}"]=='') $file_d["{price_discount}"] = 0;
			if ($file_d["{description}"]=='') $file_d["{description}"] = '---';
			$file_d["{pages_nr}"] = _fnc("pages_nr", $file_d["{characters_nr}"]);
			
			$filedetails  = strtr($GLOBALS["OBJ"]["fileDetails"], $file_d);
			
			
		} else                     $filedetails = '';	
                
                $slider[] = '<a href="http://google.com" target="_blank"><img src="'.$CONF["img_files"].'/clients/google.jpg" alt="Google" border="0"></a>';
                $slider[] = '<a href="http://www.undp.md" target="_blank"><img src="'.$CONF["img_files"].'/clients/undp.jpg" alt="UNDP" border="0"></a>';
                $slider[] = '<a href="http://www.romstal.md/www/index.html" target="_blank"><img src="'.$CONF["img_files"].'/clients/romstal.jpg" alt="Romstal Moldova" border="0"></a>';
                $slider[] = '<a href="http://www.raiffeisen-leasing.md/" target="_blank"><img src="'.$CONF["img_files"].'/clients/raiffeisen.jpg" alt="Raiffeisen Leasing Moldova" border="0"></a>';
                $slider[] = '<a href="http://www.btl.cz/" target="_blank"><img src="'.$CONF["img_files"].'/clients/btl.jpg" alt="BTL" border="0"></a>';
                $slider[] = '<a href="http://www.imprimsistem.com/" target="_blank"><img src="'.$CONF["img_files"].'/clients/imprim.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://arhiconi.com/site/eng/" target="_blank"><img src="'.$CONF["img_files"].'/clients/arhiconi.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://www.mobiteam.com/en/" target="_blank"><img src="'.$CONF["img_files"].'/clients/mobiteam.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://www.pickupunivers.md/" target="_blank"><img src="'.$CONF["img_files"].'/clients/pickup.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://www.pericoli.com/" target="_blank"><img src="'.$CONF["img_files"].'/clients/termo.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://www.fitofilter.com/" target="_blank"><img src="'.$CONF["img_files"].'/clients/fitofilter.jpg" alt="Fito Filter" border="0"></a>';
                $slider[] = '<a href="http://credo.md" target="_blank"><img src="'.$CONF["img_files"].'/clients/credo.jpg" alt="Credo" border="0"></a>';
                $slider[] = '<a href="http://www.protv.md/" target="_blank"><img src="'.$CONF["img_files"].'/clients/protv.jpg" alt="ProTV" border="0"></a>';
                $slider[] = '<a href="http://www.dai.com/" target="_blank"><img src="'.$CONF["img_files"].'/clients/dai.jpg" alt="DAI" border="0"></a>';
                $slider[] = '<a href="http://www.uti.md" target="_blank"><img src="'.$CONF["img_files"].'/clients/uti.jpg" alt="UTI" border="0"></a>';
                $slider[] = '<img src="'.$CONF["img_files"].'/clients/cast.jpg" alt="" border="0"> ';
                $slider[] = '<a href="http://www.trimaran.md/" target="_blank"><img src="'.$CONF["img_files"].'/clients/trimaran.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://www.louisbergerfrance.com/" target="_blank"><img src="'.$CONF["img_files"].'/clients/lb.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://www.moldatsa.md/" target="_blank"><img src="'.$CONF["img_files"].'/clients/moldatsa.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://www.reclamservice.md/" target="_blank"><img src="'.$CONF["img_files"].'/clients/reclam.jpg" alt="" border="0"></a>';
                $slider[] = '<a href="http://blog.businessbroker.md/" target="_blank"><img src="'.$CONF["img_files"].'/clients/bbc.jpg" alt="Raiffeisen Leasing Moldova" border="0"></a>';
//                $slider[] = '<a href="?L=page.clients"><img src="'.$CONF["img_files"].'/clients/vezi'.($_SESSION['currentlang']=='ru')?'_ru':(($_SESSION['currentlang']=='en')?'_en':'').'.jpg" alt="" border="0"></a>';
                shuffle($slider);
                $cnt = count($slider);

                for($i=0;$i<$cnt;$i++) {
                    $slider_str .= '<li>'.$slider[$i].'</li>';
                }

		$tpl->AssignArray(array(
			"jump"=>             $buffer,
			"body.load"=>        $bodyLoad,
			"page.count"=>       ($_GET['L']=='c.calcPrice')?" class='active' ":'',
			"page.clients"=>     ($_GET['L']=='page.clients')?" class='active' ":'',
			"page.about"=>       ($_GET['L']=='page.about')?" class='active' ":'',
			"page.home"=>        ($_GET['L']=='')?" class='active' ":'',
			"page.services"=>    ($_GET['L']=='page.services')?" class='active' ":'',
			"page.newsletter"=>  ($_GET['L']=='page.newsletter')?" class='active' ":'',
			"themePath"=>        "theme/{$GLOBALS["THEME"]}",
			"systemVersion"=>    $GLOBALS["SYSTEM_VERSION"],
			"siteName"=>         $CONF["SITE_NAME"],
			"siteURL"=>          "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']),
			"cssFiles"=>         $CONF["css_files"],
			"jsFiles" =>         $CONF["js_files"],
			"imgFiles"=>         $CONF["img_files"],			
			"newFiles"=>         $CONF["new_files"],			
			"editedFiles"=>      $CONF["edited_files"],			
			"translatedFiles" => $CONF["translated_files"],	
			"client.data"     => $clientdata,		
			"file.data"       => $filedetails,	
			"language"	      => ($_SESSION['currentlang']=='ru')?'_ru':(($_SESSION['currentlang']=='en')?'_en':''),
			"slider_str"	      => $slider_str,
		));
		
		
			
		/*
			Include the theme-based bufferProcParse function file if
			it exists, and run it on the buffer.
		*/
		if (is_file("theme/{$GLOBALS["THEME"]}/proc.inc.php") && include("theme/{$GLOBALS["THEME"]}/proc.inc.php")) {
			if (function_exists("bufferProcParse")) $buffer_flush_value = bufferProcParse($tpl->Flush(1));
		}
		if (!isset($buffer_flush_value)) $buffer_flush_value = $tpl->Flush(1);
		
		/*
			The following is the output compression and cleanup
			process. It will at first clean unnecessary codes
			from the output, then gunzip the buffer.
		*/
		if (!$GLOBALS["CHROMELESS_MODE"]) {

			if (ckbool($CONF["POST_PROCESS_CLEAN_OUTPUT"])) {
				$characters_entities = array('/\\r/', '/\\n/', '/\\t/', ' {2,}+/');
				$replacement_values = array('', '', '', ' ');
				$buffer_flush_value = preg_replace($characters_entities, $replacement_values, $buffer_flush_value);
			}

			if (ckbool($CONF["POST_PROCESS_COMPRESS_OUTPUT"]) and strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
				header("Content-Encoding: gzip");
				$buffer_flush_value = gzencode(
					$buffer_flush_value."",
					$CONF["POST_PROCESS_COMPRESSION_RATE"]
				);
			}
			else $buffer_flush_value .= "";
		}
		
		/*
			The template buffer is flushed and passed back to
			the OB system.
		*/		
		return (!is_null($buffer_flush_value)?$buffer_flush_value:false);

	}

	// ACCESS CONTROL CHECKUP AND VALIDATION PROCEDURE ////////////////////////////////
	function checkaccess() {
		global $CONF;
		
		/*
			Automatically allow admins to load any page
			without any verification.
		*/
		if (me("is_administrator") || me("is_superadministrator")) return true;
		
		else {
			
			/*
				Make sure we got a L key or return true...
			*/
			if (!isset($_GET["L"]) or $_GET["L"] == "") return true;
			
			/*
				Lane is a bit special... let's let it go
			*/
			if ($_GET["L"] == "lane.lane") return true;
			
			/* 
				Load the user's page loads history and
				set the actual date ustamp
			*/
			if (!is_array($history = unpk(me("act_history")))) $history = array();
			$uStamp = date("U", mktime(0,0,0,date("m"),date("d"),date("Y")));

			/*
				Load the access control array
			*/
			if (!is_array($accessControl = unpk(file_get_contents("system/cache/access.dat")))) $accessControl = array();
			
			/*
				Check if the user's account type is 
				a part of the access control array
			*/
			if (me("account_type") != 0 && isset($accessControl[me("account_type")])) {
				if (isset($accessControl[me("account_type")][$_GET["L"]])) {
					if (
						($accessControl[me("account_type")][$_GET["L"]]["ALLOW"])
						&&
						(
							(
								$accessControl[me("account_type")][$_GET["L"]]["BYCOUNT"] != 0
								&&
								$accessControl[me("account_type")][$_GET["L"]]["BYCOUNT"] > $history[$_GET["L"]][$uStamp]
							) 
							||
							$accessControl[me("account_type")][$_GET["L"]]["BYCOUNT"] == 0
						)
					) return true;
					else return false;
				} else return ($CONF["DEFAULT_ACCESS_RULE:ALLOW"] ? true : false);
			}
			
			/*
				If we got no account type, we will check
				if we're logged in or not
			*/
			elseif (isset($_SESSION["id"]) && isset($accessControl["U"])) {
				if (isset($accessControl["U"][$_GET["L"]])) {
					if (
						($accessControl["U"][$_GET["L"]]["ALLOW"])
						&&
						(
							(
								$accessControl["U"][$_GET["L"]]["BYCOUNT"] != 0
								&&
								$accessControl["U"][$_GET["L"]]["BYCOUNT"] > $history[$_GET["L"]][$uStamp]
							)
							||
							$accessControl["U"][$_GET["L"]]["BYCOUNT"] == 0
						)
					) return true;
					else return false;
				} else return ($CONF["DEFAULT_ACCESS_RULE:ALLOW"] ? true : false);
			}
			
			elseif (isset($accessControl["G"])) {
				if (isset($accessControl["G"][$_GET["L"]])) {
					if ($accessControl["G"][$_GET["L"]]["ALLOW"]) return true;
					else return false;
				} else return ($CONF["DEFAULT_ACCESS_RULE:ALLOW"] ? true : false);
			}
			
			/*
				No access restriction value found. Return the default
				access value instead.
			*/
			else return ($CONF["DEFAULT_ACCESS_RULE:ALLOW"] ? true : false);
		}
	}

	myQ("
		UPDATE `[x]users` 
		SET 
			`last_load` = '".date("U")."'
		WHERE `id`='".me('id')."'
	");
	
  
	// CLOSE DATABASE LINK ////////////////////////////////////////////////////////////
	myClose();
	
	// CORE LEVEL FUNCTIONS ///////////////////////////////////////////////////////////
	function _fnc() {
		$args = func_get_args(); 
		$path = "system/functions/";
		
		if ($loc = strrpos($args[0], '/')) list($path, $func) = split('-l-', chunk_split($args[0], $loc+1, '-l-'));
		else $func = $args[0];
		
		unset($args[0]);

		if (!function_exists($func)) include_once($path.$func.'.php');
		return call_user_func_array($func, $args);
	}
	
	function me($content) {
		global $CONF;
		
		if ($content == "flush") {
			unset($GLOBALS["SELF_USER_DATA"]);
			session_unregister("SELF_USER_DATA");
			return true;
		}
		else {
			if (isset($GLOBALS["SELF_USER_DATA"])) { 
				if (isset($GLOBALS["SELF_USER_DATA"][$content])) return $GLOBALS["SELF_USER_DATA"][$content];

				else {
					$me = myF(myQ("SELECT `{$content}` FROM `[x]users` WHERE `id`='{$_SESSION["id"]}' LIMIT 1"));
					return ($GLOBALS["SELF_USER_DATA"][$content] = $me[$content] ? $me[$content] : NULL);
				}
			}
			else if (isset($_SESSION["id"])) {
				$GLOBALS["SELF_USER_DATA"] = myF(myQ("
					SELECT `id`, `last_load`, `last_login`, `password`, `email`, `user_type`, `is_administrator`
					FROM [x]users 
					WHERE `id`='{$_SESSION["id"]}'
					LIMIT 1
				"));
				return me($content);
			} 
		}
		return false;
	}
	
	/*
	function files($content, $fileID) {
		global $CONF;
		
		if ($content == "flush") {
			unset($GLOBALS["SELF_FILES_DATA"]);
			session_unregister("SELF_FILES_DATA");
			return true;
		}
		else {
			if (isset($GLOBALS["SELF_FILES_DATA"])) { 
				if (isset($GLOBALS["SELF_FILES_DATA"][$fileID][$content])) return $GLOBALS["SELF_FILES_DATA"][$fileID][$content];
				else {
					$files = myF(myQ("SELECT `{$content}` FROM `[x]files` WHERE `id`='{$fileID}' LIMIT 1"));
					return ($GLOBALS["SELF_FILES_DATA"][$fileID][$content] = $files[$content] ? $files[$content] : NULL);
				}
			}
			else if (isset($fileID)) {
				$GLOBALS["SELF_FILES_DATA"][$fileID] = myF(myQ("
					SELECT `id`, `fname`
					FROM [x]files 
					WHERE `id`='{$fileID}'
					LIMIT 1
				"));
				return files($content, $fileID);
			} 
		}
		return false;
	}*/
	
	function pk($data) {
		return urlencode(serialize($data));
	}

	function unpk($data) {
		return unserialize(urldecode($data));
	}
	
	function ckbool(&$var) { 
		if (!isset($var)) return false;
		elseif ((bool)$var) return true;
		return false;		
	}
	
	function is_op($id=NULL) {
		if (is_null($id)) 
			$id = me("id");

		$row = myF(myQ("
			SELECT `is_administrator`, `is_superadministrator` 
			FROM `[x]users` 
			WHERE `id` = '{$id}' 
			LIMIT 1
		"));

		if ($row["is_administrator"] or $row["is_superadministrator"]) 
			return true;

		return false;
	}
	
	function is_translator($id=NULL) {
		if (is_null($id)) 
			$id = me("id");

		$row = myF(myQ("
			SELECT `user_type` FROM `[x]users` WHERE `id` = '{$id}' LIMIT 1"));

		if ( $row["user_type"]==3 ) 
			return true;

		return false;
	}
	
	function is_mop($id=NULL) {
		if (is_null($id)) 
			$id = me("id");

		$row = myF(myQ("
			SELECT `is_moderator`, `is_administrator`, `is_superadministrator` 
			FROM `[x]users` 
			WHERE `id` = '{$id}' 
			LIMIT 1
		"));

		if ($row["is_moderator"] or $row["is_administrator"] or $row["is_superadministrator"]) 
			return true;

		return false;
	}
	
?>
<?php 
    for($i=0;$i<count($_SESSION['templates']);$i++) {
        echo $_SESSION['templates'][$i].'<br />';
    }
    unset($_SESSION['templates']);

?>