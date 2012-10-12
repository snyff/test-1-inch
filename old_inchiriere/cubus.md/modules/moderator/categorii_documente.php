<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  26.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("categorii_documente");
	$tpl -> GetObjects();
	
		     
	//_fnc("userAcces", $_GET['L']);


########################################################
    /*
         Activam modulele stabile pentru pagina data
    */
########################################################

	if (me('id')) {	
		
		$tpl -> Zone("cubusSteps",             "enabled");
		$tpl -> Zone("contacteCubus",          "enabled");
		$tpl -> Zone("categoriiDocumente",     "enabled");
		$tpl -> Zone("contModerator",          "enabled");

	} 
	else {
	
	    $tpl -> Zone("categoriiDocumente",     "guest");
		_fnc("reload", 2, "?");
	}
	

########################################################
    /*
         Activam lista cu LIMBI
    */
########################################################

	if (me("id") != "" ) {

		/*
		    Selectam datele din DB
		*/
		if ( $_GET['edit'] != '' ) {							
		                   
			$editCategData = myF(myQ("
			    SELECT * 
				FROM `[x]categorii_documente` 
				WHERE `id` = '".(int)$_GET['edit']."'
		    "));
			
		    setcookie("tabber", 0);
		
		    $tpl -> Zone("editeazaCategorie", "ok");
		
            $tpl -> AssignArray(array(
			    "fisier.id"      => $editCategData["id"],
			    "categ.default"  => $editCategData["default"],
			    "categ.romana"   => $editCategData["romanian"],
			    "categ.rusa"     => $editCategData["russian"],
			    "categ.engleza"  => $editCategData["english"],
			));
			
			$activEdit = 'disabled';
		
		}	
		else  {
		     
			 $tpl -> Zone("creazaCategorie", "ok"); 
            
			 $tpl -> AssignArray(array(
			    "fisier.id"      => '',
			    "categ.default"  => '',
			    "categ.romana"   => '',
			    "categ.rusa"     => '',
			    "categ.engleza"  => '',
			 ));
			 
			 $activEdit = '';
		}
		
		/*
	         Facem LOOP la Lista cu LIMBI 	 
		*/
	}
	 
		
########################################################
    /*
         Procesul de INSEERT a unei categorii ......
    */
########################################################
	
	if (me("id") != "" ) {

		if ( $_POST['romana']!='' && $_POST['rusa'] && $_POST['engleza']!='' && $_POST['categ_name']!=''  ) {
		
		    //dddd
		    myQ("
		        INSERT INTO `[x]categorii_documente` 
		        (
			        `parent`,
			        `default`,
			        `romanian`,
			        `russian`,
			        `english`,
			        `statut`
		        )
		        VALUES
		        (
			        '".$_POST["categSelect"]."',
			        '".$_POST["categ_name"]."',
			        '".$_POST["romana"]."',
			        '".$_POST["rusa"]."',
			        '".$_POST["engleza"]."',
			        '1'
		        )
		    ");
			
			_fnc("reload", 0, "?L=moderator.categorii_documente&a=1#middle");	
		}
		else if ( $_POST['edit'] != '' ) {
		
            myQ("
			      UPDATE `[x]categorii_documente` 
			      SET 
			          `default`='".$_POST["categ_name"]."', 
					  `romanian`='".$_POST["romana"]."', 
					  `russian`='".$_POST["rusa"]."', 
				 	  `english`='".$_POST["engleza"]."'
	              WHERE `id`='".$_POST['edit']."' 
		    ");
			
			_fnc("reload", 0, "?L=moderator.categorii_documente&a=2#middle");	
		}
		
		$array_categ = _fnc("listaCategoriiDocumente", $_GET['edit'], $activEdit);
		
		$tpl -> Loop("categSelect",     $array_categ);
		$tpl -> Loop("categListSelect", $array_categ);
	
	
		$tpl -> Zone("listafisiere", "enabled");
	}	
	
	
	

########################################################
	/*
	    Stergem un FISIER 
	*/ 
########################################################
	if ( me('id') ) {	
     
		if (isset($_GET["rm"]) && $_GET['statut'] == 0 ) {
		   
            myQ("
			      UPDATE `[x]categorii_documente` 
			      SET 
				 	  `statut`='0'
	              WHERE `id`='".$_GET["rm"]."' 
		    ");
			
			
		    $fileSelect = myQ("
			    SELECT *
			    FROM `[x]categorii_documente`
			    WHERE `parent` = '".$_GET["rm"]."' 
			    ORDER BY `id` ASC
		    ");
		

		    while ( $lisCateg = myF($fileSelect) ) {
			
                myQ("
			          UPDATE `[x]categorii_documente` 
			          SET 
				 	      `statut`='0'
	                  WHERE `id`='".$lisCateg['id']."' 
		        ");
			}
		
			
			
			_fnc("reload", 0, "?L=moderator.categorii_documente&a=3#middle");	
 		}
		elseif (isset($_GET["rm"]) && $_GET['statut'] == 1 ) {
		   
            myQ("
			      UPDATE `[x]categorii_documente` 
			      SET 
				 	  `statut`='1'
	              WHERE `id`='".$_GET["rm"]."' 
		    ");
			
			_fnc("reload", 0, "?L=moderator.categorii_documente&a=3#middle");	
 		}
	}
		


	$tpl -> CleanZones();
	$tpl -> Flush();
?>