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
	$tpl -> Load("edit");
	
	$tpl -> Zone("contModerator",         "enabled");
	$tpl -> Zone("contacteCubus",         "enabled");
	
	$cubArr = array("{" => "&#123;", "}" => "&#125;");
	
	$langContent = file_get_contents($CONF["LOCALE_LANGUAGEPACK_LOCATION"]."/ro.php");
	
	
	
	$i=0;
	for( $i=1000; $i<10000; $i++ ) {
		
			$id = $i;

			preg_match('/'.$id.' ?=> ?"(.*)"/i', $langContent, $value);
			
			if ( isset($value[1]) && $value[1] !='') {
			
				echo $id.":GLOBAL:".strtr($value[1], $cubArr)."\r\n";
			}
			
			/*
			$mapReplace[] = array(
				"string.id" => $id,
				"string.location" => $at,
				"string.newlang" => $_GET["id"],
				"string.mapBody" => strtr($string, $cubArr),
				"string.langBody" => (isset($value[1])?strtr($value[1], $cubArr):NULL)
			);
			*/
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
	

 	$frame -> Flush();
	
?>