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
		if (isset($_POST["SubmitEditPass"])) {
 			
			/* toate valorile din POST trec in SESSION */
			foreach ($_POST as $var => $val) {
				$_SESSION["REGISTER"][$var] = $val;
			}
		
			/* Check contactperson */
			if ( $_SESSION["REGISTER"]["oldpass"]=='' || 
				myNum(myQ("
					SELECT `password` 
					FROM `[x]users` 
					WHERE `password`='".trim(md5($_SESSION["REGISTER"]["oldpass"]))."'
				")) == 0 ) 
			{
			
				_fnc("reload", 0, "?L=translator.editProfile&error=oldpasserror");
				die;
			
			} elseif ( $_SESSION["REGISTER"]["newpass"]!= $_SESSION["REGISTER"]["rnewpass"] || 
					   $_SESSION["REGISTER"]["rnewpass"]=='' ||
					   $_SESSION["REGISTER"]["newpass"]==''  
			) {
			
				_fnc("reload", 0, "?L=translator.editProfile&error=newpasserror");
				die;
			
			} else {
				
				myQ("UPDATE `[x]users` 
					 SET `password`='".md5($_SESSION["REGISTER"]["newpass"])."' 
					 WHERE `id`='".$_SESSION["REGISTER"]['translatorid']."' 
					 LIMIT 1
				");			
				
				_fnc("reload", 0, "?L=translator.editProfile&update=succesP");
				die;
			}
				  
		} else {
		
			_fnc("reload", 0, "?L=translator.editProfile&error=noPostData");
			die;
		}
		
	} else {
	
		_fnc("reload", 0, "?");
		die;
	}
 
 	
	$tpl -> CleanZones();
	$tpl -> Flush();
?>