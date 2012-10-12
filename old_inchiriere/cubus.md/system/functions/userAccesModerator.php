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

	function userAccesModerator($id_user) {
		
		$explode = explode(".", $_GET['L']);
		$getData = $_GET;
					
		foreach ( $_GET as $key => $val ) {
				
			$str_get .= $key."=".$val."&";
		}
		$rest_get = md5(substr($str_get, 0, -1)); 
		
 		
		$rr=0;
		if ( _fnc("user", $id_user, "is_administrator") == 2 ) {
		

				if ( $_GET['L'] == '' || !isset($_GET['L']) ) {}	
			elseif ( $_GET['L'] == "download.file" )          {} 
			elseif ( $_GET['L'] == "pictures.print" )         {}

			elseif ( $explode[0] != 'moderator' && $explode[0] != 'moder' ) {

					 if ( _fnc("user", $id_user, "username") == 'moder')     { _fnc("reload", 0, "?L=moder.tools");          die(); }  
				else if ( _fnc("user", $id_user, "username") == 'moderator') { _fnc("reload", 0, "?L=moderator.tools");      die(); }  
				else 	                                                     { _fnc("reload", 0, "?L=moderator.acces.list"); die(); } 

			} 
			
			elseif ( ($explode[0] == 'moderator' && _fnc("user", $id_user, "username") == 'moderator') || ($explode[0] == 'moder' && _fnc("user", $id_user, "username") == 'moder') ) {}
			else {
			
			echo '====';
			
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
					
					
					$data_db = explode("?", urldecode($selectLinkData['link'])); 
					
					$compare_url = md5($data_db[1]); 
					
					
					if ( $compare_url == $rest_get && $data_db[1]!='' ) {$rr ++;  } 
				}
									
				
					if ( $_GET['L'] == 'moderator.acces.list' ) {}
				elseif ( $_GET['L'] == 'moder.tools' )          {}
				elseif ( $_GET['L'] == 'moderator.tools' )      {}
				elseif ( $rr != 1 )                             { _fnc("reload", 0, "?L=moderator.acces.list"); die(); } 					
				
				//print_r($all_links);
			}
			
		}  else {
		
			if ( $explode[0] == 'moderator' ) { _fnc("reload", 0, "?"); die(); }
			if ( $explode[0] == 'moder' )     { _fnc("reload", 0, "?"); die(); }
		}
	}

?>