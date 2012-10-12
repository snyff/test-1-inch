<?php
///////////////////////////////////////////////////////////////////////////////////////
// PHPizabi 0.848b C1 [ALICIA]                               http://www.phpizabi.net //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         Claude Desjardins, R - feedback@realitymedias.com        //
// Last modification date:  August 13th 2006                                         //
// Version:                 PHPizabi 0.848b C1                                       //
//                                                                                   //
// (C) 2005, 2006 Real!ty Medias / PHPizabi - All rights reserved                    //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");


	$tpl = new template;
	$tpl -> Load("languages");
	
		
	$tpl -> Zone("contModerator",         "enabled");
	$tpl -> Zone("contacteCubus",         "enabled");

	
	$sysLanguages = explode(",", $CONF["LOCALE_SITE_LANGUAGES"]);
	
	// HANDLE THE UNLINK REQUEST //////////////////////////////////////////
	if (isset($_GET["unlink"]) && in_array(strtolower($_GET["unlink"]), $sysLanguages)) {
		foreach ($sysLanguages as $key => $lang) {
			if ($lang == strtolower($_GET["unlink"])) {
				unset($sysLanguages[$key]);
				_fnc("saveConfig", "LOCALE_SITE_LANGUAGES", implode(",", $sysLanguages));
				break;
			}
		}
	}
	
	// HANDLE ACTIVATE ///////////////////////////////////////////////////
	if (isset($_GET["activate"]) && !in_array(strtolower($_GET["activate"]), $sysLanguages)) {
		$sysLanguages[] = strtolower($_GET["activate"]);
		_fnc("saveConfig", "LOCALE_SITE_LANGUAGES", implode(",", $sysLanguages));
	}
	
	// HANDLE SET DEFAULT ////////////////////////////////////////////////
	if (isset($_GET["default"]) && in_array(strtolower($_GET["default"]), $sysLanguages)) {
		$CONF["LOCALE_SITE_DEFAULT_LANGUAGE"] = strtolower($_GET["default"]);
		_fnc("saveConfig", "LOCALE_SITE_DEFAULT_LANGUAGE", strtolower($_GET["default"]));
	}
	
	// HANDLE POSTED LANGUAGE ////////////////////////////////////////////
	if (isset($_POST["Submit"], $_POST["name"])) {
	
		$_POST["name"] = strtolower($_POST["name"]);
		$_POST["clone"] = strtolower($_POST["clone"]);
	
		/* 
			Make sure a language by the same name does NOT
			already exist
		*/
		if (!is_file($CONF["LOCALE_LANGUAGEPACK_LOCATION"]."/{$_POST["name"]}.php")) {
			
			/*
				Let's find out if we got a file
			*/
			if (is_uploaded_file($_FILES["file"]["tmp_name"]) && strstr(strtolower(basename($_FILES["file"]["name"])), ".php")) {
				move_uploaded_file($_FILES["file"]["tmp_name"], $CONF["LOCALE_LANGUAGEPACK_LOCATION"]."/{$_POST["name"]}.php");
			}
			
			/*
				A clone?
			*/
			elseif (
				isset($_POST["clone"]) && 
				$_POST["clone"] != "" && 
				is_file("{$CONF["LOCALE_LANGUAGEPACK_LOCATION"]}/{$_POST["clone"]}.php")
			) {
				copy($CONF["LOCALE_LANGUAGEPACK_LOCATION"]."/{$_POST["clone"]}.php", $CONF["LOCALE_LANGUAGEPACK_LOCATION"]."/{$_POST["name"]}.php");
			}
			/*
				No file, no clone ... How bad. Let's create a blank
				file
			*/
			else touch($CONF["LOCALE_LANGUAGEPACK_LOCATION"]."/{$_POST["name"]}.php");
			
						
			// Aici trebuie sa se faca si alter la baza de date 
			myQ("ALTER TABLE `[x]languages` ADD ".$_POST["name"]." VARCHAR(250) NOT NULL AFTER `en`");
			myQ("ALTER TABLE `[x]texttype`  ADD ".$_POST["name"]." VARCHAR(250) NOT NULL AFTER `en`");
		}
	}


	$totalLanguages = 0;
	$totalSupported = 0;

	if ($handle = opendir($CONF["LOCALE_LANGUAGEPACK_LOCATION"])) {
		while (false !== ($fileName = readdir($handle))) {

			$file = explode(".", $fileName, 2);
			if ($file[1] == "php") {
			
				$totalLanguages ++;
				if (in_array(strtolower($file[0]), $sysLanguages)) $totalSupported ++;
			
				$languages[] = array(
					"language.id" => ucfirst($file[0]),
					"language.supported" => (in_array(strtolower($file[0]), $sysLanguages) ? 1 : 0),
					"language.size" => round(filesize($CONF["LOCALE_LANGUAGEPACK_LOCATION"]."/{$fileName}")/1024, 2),
					"language.default" => ($CONF["LOCALE_SITE_DEFAULT_LANGUAGE"] == $file[0] ? 1 : 0),
				);
				
				$langDropDown[] = array(
					"language.id" => ucfirst($file[0])
				);
			}
		}
	}
	
	
	if (isset($languages)) {
		
		$tpl -> Loop("languages", $languages);
		$tpl -> Loop("langDropDown", $langDropDown);
	}
	
	$tpl -> AssignArray(array(
		"langCount.total" => $totalLanguages,
		"langCount.active" => $totalSupported
	));
	
	// TEMPLATE REPROCESS & FLUSH ////////////////////////////////////////////////////
	$tpl -> CleanZones();

	/* Get the frame templates, flush the TPL result into it */
	$frame = new template;
	$frame -> Load("!theme/{$GLOBALS["THEME"]}/frame.tpl");
	$frame -> AssignArray(array(
		"jump" => $tpl->Flush(1)
	));
	
	/* Assign Location Value */
	$locationArray = explode(".", $_GET["L"]);
	for ($i=0; $i<count($locationArray); $i++) {
		$locationAppendResult[] = $locationArray[$i];
		if ($i > 0) $location[] = "<a href=\"?L=".implode(".", $locationAppendResult)."\">{$locationArray[$i]}</a>";
	}
	$frame -> AssignArray(array("location" => implode(" &raquo; ", $location)));
	
	/* Set the forced chromeless mode, flush the template */
	$GLOBALS["CHROMELESS_MODE"] = 1;
	
	$tpl -> CleanZones();
	$frame -> Flush();
	
?>