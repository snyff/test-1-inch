<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  13.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("list");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin", "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
	}

	include("addLink.php");
	include("addDiscount.php");
	include("addTranslator.php");
	include("deleteLink.php");

########################################################
	/* Afisam lista de companii  */ 
########################################################
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
	  
	    /* Selectam din nou file pentru a le folosi aranja in LISTA */
		$selectC = myQ("SELECT * FROM `[x]companies` ORDER BY `company_id` DESC");
		
		/* Afisam lista cu documente */
		$i=0;
		while ($select = myF($selectC)) {
					
 			/* Selectam abilitatile traducatorului */
			$selectLinks = myQ("SELECT * FROM `[x]links` WHERE `company_id`='".$select['company_id']."' ORDER BY `link_type` ASC");
 			/* Afisam lista cu abilitati */
			$links_str ='';
			$y=0;
 			while ($selectL = myF($selectLinks)) {
				$y++;
				
				if ($selectL['link_type']==5) $link5_srt = " - <font size=\"1\"> "._fnc("discount", $selectL['discount'], 'company_discount')."% </font>"; 
				else                          $link5_srt = '';
				
				if ($selectL['link_type']==6) $link6_srt = " - <font size=\"1\"> "._fnc("translator_editor_data", $selectL['translator_id'], 'name')." &nbsp; [".(($selectL['sms_alert']==1)?$GLOBALS["OBJ"]["sms"]:'').(($selectL['email_alert']==1)?$GLOBALS["OBJ"]["email"]:'')."]</font>"; 
				else                          $link6_srt = '';
				
				if ($selectL['languages_type']!=0) $languages = " <font size=\"1\">( "._fnc("languages", _fnc("translation", $selectL['languages_type'], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." &raquo; "._fnc("languages", _fnc("translation", $selectL['languages_type'], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." ) : "._fnc("file_type", _fnc("translation", $selectL['languages_type'], 'file_type'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</font>".$link5_srt.$link6_srt;
				else                               $languages = $GLOBALS["OBJ"]["allTypes"].$link5_srt.$link6_srt;
				$links_str .= "<tr><td>&nbsp; ".$GLOBALS["OBJ"]["linkStr".$selectL['link_type']]. $languages. " </td><td> &nbsp;&nbsp;&nbsp;<a href='?L=moderator.companies.list&l=".$selectL['link_id']."&c=".$select['company_id']."&action=deleteLink&chromeless=1'><img src=".$CONF["img_files"]."/delete3.png ></a></font></td></tr>";
			}	
 			$links = array("{links}" => $links_str);
			
			$list[$i]["cid"]          = $select['company_id'];
 			$list[$i]["name"]         = ($select['name']=='')?'[NO COMPANY]':$select['name'];
 			$list[$i]["person.name"]  = $select['contact_person'];
			$list[$i]["links"]        = ($links_str=='')?$GLOBALS["OBJ"]["linksNone"]:strtr($GLOBALS["OBJ"]["linksOk"], $links); 
			$i++;
		}
			
        /* AFISAM Lista pentru CALCUL PRET */
		if (isset($list) ) {
			$tpl -> Zone("list", "enabled");
			$tpl -> Loop("list", $list);
		}  else $tpl -> Zone("list", "empty");
  	}
 
	
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") && !$GLOBALS["CHROMELESS_MODE"] ) $tpl -> Zone("islogin", "guest");


$tpl -> CleanZones();
$tpl -> Flush();
	
?>