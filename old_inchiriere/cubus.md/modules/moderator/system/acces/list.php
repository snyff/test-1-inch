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
	$tpl -> Load("list");
	
		
	$tpl -> Zone("contacteCubus",         "enabled");

	

	$selectam_links_acces = myQ("
		SELECT *
		FROM `[x]moderator_acces`
		WHERE `id_user`='".me("id")."'
	");
	
	/*
		Analizam daca au trecut 3 zile de cind sa creat contul 
	*/
	while ($selectam_links_ac = myF($selectam_links_acces)) {
	
		$selectLinkData = myF(myQ("
			SELECT * 
			FROM `[x]moderator_links` 
			WHERE `id_link`='".$selectam_links_ac['id_link']."'
		"));

		
		$links_sele[] = array(
			"link.id"   => $selectam_links_ac['id_acces'],
			"link.name" => $selectLinkData['descriere_link'],
			"link.link" => urldecode($selectLinkData['link']),
		);
	}
	
	
	if (isset($links_sele)) {
		
		$tpl -> Loop("links_s", $links_sele);
 	}
		    
	
	
	
	
 	
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