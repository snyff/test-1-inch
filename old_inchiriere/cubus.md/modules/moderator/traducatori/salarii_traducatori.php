<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  06.12.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	$tpl = new template;
	$tpl -> Load("salarii_traducatori");
	$tpl -> GetObjects();
	
	//_fnc("userAcces", $_GET['L']);

	// SELECT files from server => put to browser. 	
	if ( me('id') && $_GET['chromeless'] == 0 ) {	
		
		$tpl -> Zone("salariiTrad",   "enabled");
		$tpl -> Zone("cubusSteps",    "enabled");
		$tpl -> Zone("contacteCubus", "enabled");
		$tpl -> Zone("contModerator", "enabled");
		
		$tpl -> AssignArray(array("id.trad"=> $_GET['idtrad']));
		

	} else {
	
		$tpl -> Zone("salariiTrad", "guest");
	}


	/*CReam selectul */
	
	if ( me("id")!='' ) {
	
		$year      = date("Y");  // cifre  1998 .. 2008
		$month     = date("n"); //  cifre 1 .. 12
		
		if ( ($month-10) <= 0 ) {
		
			$year =  $year -1;
			$month = 12 - 10 + $month;
		}
		
		
		for ($i=1; $i<=20; $i++) {
		
			if ( $month == 13 ) { $month =1; $year = $year + 1; }
			
			$dataSelect[$i]["anul.luna"]     = $year.".".$month;
			
			$generateMonthName = mktime(0, 0, 0, $month, 5, $year);
			
			$dataSelect[$i]["anul.luna.put"] = $year."  ".date("F", $generateMonthName);
			
			if ( $year == date("Y") &&  $month == date("n") ) { $dataSelect[$i]["select.selected"] = ' selected="selected" ';	} 
			else		                                      { $dataSelect[$i]["select.selected"] = ''; }
			
			$month++;
		}	
		
		$tpl -> Loop("selectYear", $dataSelect);		
	}
	
	
	if ( me('id') && $_GET['chromeless'] == 0 && isset($_GET['achitat']) && $_GET['achitat'] != '' ) {	

		
		/*
	     UPLOAD file 
		 Se face UPDATE la FISIER
		*/
        myQ("
             UPDATE `[x]files` 
             SET 
                   `trad_achitat`='0'
             WHERE `id`='".$_GET['achitat']."'"
        );	
		
		_fnc("reload", 0, "?L=moderator.traducatori.salarii_traducatori&list_files=all&idtrad=".$_GET['idtrad']."&as=31");
		die();

	}	
	
	
		
	/*
	    Se activeaza fisierele ca Achitate
	*/
	if ( me("id")!='' && count($_POST['check']) > 0 ) {
	
		for ( $r=0; $r < count($_POST['check']); $r++ ) {
		
			myQ("
				 UPDATE `[x]files` 
				 SET 
					   `trad_achitat`='1'
				 WHERE `id`='".$_POST['check'][$r]."'"
			);	
		}
		
		_fnc("reload", 0, "?L=moderator.traducatori.salarii_traducatori&idtrad=".$_GET['idtrad']."&as=1");
		die();
	}
							
		

	if ( me('id') && $_GET['chromeless'] == 0 ) {	


		$salariiTraducatori = myQ("
			SELECT *
			FROM `[x]users`
			WHERE `is_administrator` = '3' AND `id` = '".$_GET['idtrad']."'
		");
		

		/*
		    Analizam daca au trecut 15 zile de cind sa incarcat fisierul
		*/
		$i=0;
		$data_precedenta = (int)date("j", time());
		$luna_precedenta = (int)date("m", time());
		
		
		while ($listaSalariiTraducatori = myF($salariiTraducatori)) {
		
		    $nameTrad[] = $listaSalariiTraducatori['username'];
			
			$dataContactTrad = unpk($listaSalariiTraducatori['profile_data']);
		    

    		if ( $_GET['list_files']!='all' ) {
			
				$list_file = " AND `trad_achitat`='0' ";
			
			}  
			
			
			$listaFisiere = myQ("
	    		SELECT *
    			FROM `[x]files`
    			WHERE `idtraduc` = ".$listaSalariiTraducatori['id']." AND `approved`='11' ".$list_file."
				ORDER BY `id` DESC
    		");
		
    		/*
    		    Analizam daca au trecut 15 zile de cind sa incarcat fisierul
    		*/
			$listaFisTradPut = '';	
			$count_price = 0;		
			
			while ($listaFisiereTrad = myF($listaFisiere)) {
						
			     
				 if ( $listaFisiereTrad['trad_achitat'] == 0) {
				 
				     $caz_achitat = "<td width=40>
									    <input type=\"checkbox\" name=\"check[]\" value=\"".$listaFisiereTrad['id']."\" /> 
									</td>";				 
				 } else {
				 
				     $caz_achitat = "<td width=40>
									    <a href=?L=moderator.traducatori.salarii_traducatori&idtrad=".$_GET['idtrad']."&achitat=".$listaFisiereTrad['id']."><img src=\"theme/default/images/icons/alert/green_alert.gif\" /></a>
									</td>";				 
				 }
				 

				 /*
				 if ( ((int)date("j", $listaFisiereTrad['timeaccept']) <= 25 && (int)$data_precedenta > 25 ) || ( (int)date("j", $listaFisiereTrad['timeaccept']) <= 25 && (int)date("m", $listaFisiereTrad['timeaccept']) != $luna_precedenta ) ) {
				     
					 
					      if ( $count_price < 699 )                        { $bonus = 0; } 
					 else if ( $count_price > 700 && $count_price < 1599 ) { $bonus = bcdiv(($count_price*0.15),1,2); } 
					 else if ( $count_price > 1600 )                       { $bonus = bcdiv(($count_price*0.3 ),1,2); } 
					 
					 $total_count_data = 				   "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:1px #CCCCCC solid; padding:5px; margin-top:5px; background-color:#FFFF00;\">
                                                                <tr>
																	<td align=right>
																	    <font class=\"black_text_content_bold\">Total traduceri: ".$count_price."</font>
																	</td>
																	<td align=right>
																	    <font class=\"black_text_content_bold\">BONUS.: ".$bonus."</font>
																	</td>
																	<td align=right>
																	    <font class=\"black_text_content_bold\">TOTAL.: ".($count_price + $bonus)."</font>
																	</td>
                                                                </tr>          
                                                            </table>"; 
					 $count_price = 0;
					
  				 } else {
				 
				     $total_count_data = '';
					 $count_price += bcdiv(_fnc("calc_price",  'traducator', $listaFisiereTrad["nr_caractere"], $listaFisiereTrad["from_lang"], $listaFisiereTrad["to_lang"], $listaFisiereTrad["type_file"], $listaFisiereTrad['id']), 1, 2 );
				 }
				 */
				 
				 $data_precedenta =  date("j", $listaFisiereTrad['timeaccept']);
				 $luna_precedenta =  date("m", $listaFisiereTrad['timeaccept']);
				 
				 
				 $listaFisTradPut .=  $total_count_data. " 
														    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:1px #CCCCCC solid; padding:5px; margin-top:5px; background-color:#FFFFFF;\">
                                                                <tr>
																    ".$caz_achitat."
																	<td width=\"140\">
																	    <font class=\"black_text_content_bold\">Fisier nr.: ".$listaFisiereTrad['id']." </font>
																	</td>
                                                                    <td width=\"220\">
																	    <font class=\"black_text_content_bold\">din data: ".date('d-m-Y', $listaFisiereTrad['timeaccept'])." </font>
																	</td>
                                                                    <td>
																	    <font class=\"black_text_content_bold\">Pretul: ".(_fnc("traducatori_price", $listaFisiereTrad["pretul"], $listaFisiereTrad['idtraduc']))." LEI MD </font>
																	</td>
                                                                </tr>   
																<tr>
                                                                    <td></td>
																	<td colspan=4>
																	    <font><b>Nume fisier: ".$listaFisiereTrad['fname']." Traducere din : "._fnc("lang_data", $listaFisiereTrad['from_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." in  "._fnc("lang_data", $listaFisiereTrad['to_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])."</b></font>
																	</td>
																</tr>       
                                                            </table>";         
			}
			
			
			$dataTradGen[$i]["nume.prenume"]     = $dataContactTrad['numele']." ".$dataContactTrad['prenumele'];
			$dataTradGen[$i]["tel.mobil"]        = $dataContactTrad['telMobil'];
			$dataTradGen[$i]["tel.fix"]          = $dataContactTrad['telFix'];
			$dataTradGen[$i]["seria.buletin"]    = $dataContactTrad['serieBuletin'];
			$dataTradGen[$i]["cod.personal"]     = $dataContactTrad['codPersonal'];
			$dataTradGen[$i]["lista.traduceri"]  = $listaFisTradPut;
			
			$i++;
		
		}
		
		$listTradPut = '"'.implode('", "', $nameTrad).'"';
		
		$tpl -> AssignArray(array("lista.Trad"=> $listTradPut));
		
	    $tpl -> Loop("tradList", $dataTradGen);
	}

	

	$tpl -> CleanZones();
	$tpl -> Flush();
?>