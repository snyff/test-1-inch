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
	$tpl -> Load("acces");
	
		
	$tpl -> Zone("contModerator",         "enabled");
	$tpl -> Zone("contacteCubus",         "enabled");

	
	$sysLanguages = explode(",", $CONF["LOCALE_SITE_LANGUAGES"]);
	
	// HANDLE THE UNLINK REQUEST //////////////////////////////////////////
	if (isset($_GET["unlink"]) ) {

		 myQ("UPDATE `[x]users` 
			  SET   `active`='0' 
			  WHERE `id`='".$_GET['unlink']."'
			  LIMIT 1
		 ");
	}
	
	// HANDLE ACTIVATE ///////////////////////////////////////////////////
	if (isset($_GET["activate"]) ) {

		 myQ("UPDATE `[x]users` 
			  SET   `active`='1' 
			  WHERE `id`='".$_GET['activate']."'
			  LIMIT 1
		 ");
	}
	
 	

	$totalModer = 0;
	$totalActivi = 0;

	
	$listaModer = myQ("
		SELECT *
		FROM `[x]users`
		WHERE `is_administrator` = '2' 
	");
	
	/*
		Analizam daca au trecut 3 zile de cind sa creat contul 
	*/
	while ($m_lista = myF($listaModer)) {
	
		$moderatori[] = array(
			"moderator.username" => _fnc("user", $m_lista["id"], 'username'),
			"moderator.default" => $m_lista["active"],
			"moderator.id"       => $m_lista["id"]			
		);
		
		$totalModer ++;
		
		if ( _fnc("user", $m_lista["id"], 'active') == 1 ) {
		
			$totalActivi++;
		} 
	}
	
	
	if (isset($moderatori)) {
		
		$tpl -> Loop("moderator", $moderatori);
	}
	
	$tpl -> AssignArray(array(
		"moder.total" => $totalModer,
		"moder.active" => $totalActivi
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