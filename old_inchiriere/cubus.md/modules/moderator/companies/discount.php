<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  10.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");

$tpl = new template;
$tpl -> Load("discount");
$tpl -> GetObjects(); 

	// activam zonele in dependenta de AJAX sau NU. 	
	if ( me('id') && !$GLOBALS["CHROMELESS_MODE"] ) {	
		
		$tpl -> Zone("islogin",             "enabled");
		$tpl -> Zone("moderatorRightBlock", "enabled");
		$tpl -> Zone("mCompaniesDiscount",  "discount");
 	}
	
	
	if ( me('id') ) {
	
		
		// Adauga reduceri companii %  ////////////////////////////////////////////
		if (isset($_POST["discount"]) && is_numeric($_POST["discount"]) && $_POST["discount"]>0  && $_POST["discount"]<100  ) {
 			
		    $select = myF(myQ("SELECT * FROM `[x]company_discount` WHERE `company_discount`='".$_POST["discount"]."'"));
			
			if ($select['id_company_discount']=='') {			
			
 				myQ("INSERT INTO `[x]company_discount` (`company_discount`)
					 VALUES                            ('".$_POST['discount']."')
				");
				
				_fnc("reload", 0, "?L=moderator.companies.discount&insert_p=ok");
				die();
				
			} else {
			
				/* aici trebuie sa apara o eroare care sa anunte ca deja este in DB */
 				_fnc("reload", 0, "?L=moderator.companies.discount&insert_p=error1");
				die();
			}
 		
		} elseif ( isset($_POST["discount"]) ) {
		
			/* aici trebuie sa apara o eroare care sa anunte de ce nu a merg bine*/
 			_fnc("reload", 0, "?L=moderator.companies.discount&insert_p=error2");
			die();
 		}
	
	
	
		/* selctam procent reduceri companii */
		$selectD = myQ("SELECT * FROM `[x]company_discount` ORDER BY `company_discount`");
		
		while ($select = myF($selectD)) $list[] = array("discount" => $select['company_discount']);
	
		if (isset($list)) {
			$tpl -> Zone("discount", "enabled");
			$tpl -> Loop("loopDiscount", $list);
		} else $tpl -> Zone("discount", "empty");
	}
	  
	
	// daca nu etse logat incarcam modulul care scoate alerta pentru logare
	if ( !me("id") ) $tpl -> Zone("islogin", "guest");


$tpl -> CleanZones();
$tpl -> Flush();
	
?>