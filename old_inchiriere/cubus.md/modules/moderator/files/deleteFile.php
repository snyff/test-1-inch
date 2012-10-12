<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  16.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP")) die("Out of structure call");


########################################################
    /*
         Stergem fisierul daca acest lucru este cerut 
    */
########################################################
	
	if ( me('id') && $_GET['delete_file']!='' && $_GET['chromeless']==1 ) {	
	
		myQ("UPDATE `[x]files` SET `status_file`='20', `time20`='".time()."' WHERE `unic_id`='".$_GET['delete_file']."' LIMIT 1");			
		
		/* punem banii inapoi in cash_advance daca este necesar */
		_fnc("cash_advance", $_GET['delete_file']);
		
		/*
		    Trimite NEWSLETTRE la persoana care a creat cont si se anunta 
		    ca au trecut 3 zile de la crearea contului
			........
		*/		
		_fnc("reload", 0, "?L=moderator.files.filesList");
		die;
	}
	
	
########################################################
    /*
         Fisier care sa incarcat dar timp de 10 zile nu sa facut nimic cu el =>  se sterge
		 ANALIZAM fisierele care trebuie sa se stearga automat din lista LISTA FISIERE RECENTE
    */
########################################################
	
	if ( me('id') && $_GET['chromeless'] == 0  ) {	

		$fisiereRecenteStergere = myQ("
			SELECT *
			FROM `[x]files`
			WHERE `status_file` = '10' 
		");
		
		/* Analizam daca au trecut 10 zile de cind sa incarcat fisierul */
		$i=0;
		while ($fisiereCStergere = myF($fisiereRecenteStergere)) {
			
			if ( ((time()-_fnc("checkTime", $fisiereCStergere['time0'], 10, 'zile')) > 0)  ) {
			
				/* punem banii inapoi in cash_advance daca este necesar */
				_fnc("cash_advance", $fisiereCStergere['unic_id']);
				 
				 myQ("
				     DELETE 
				     FROM  `[x]files` 
				     WHERE `unic_id` = '".$fisiereCStergere['unic_id']."'
					 LIMIT 1
			     ");
				 
		 		 @unlink($CONF["files_folder"].$CONF["new_files"]."/".$fisiereCStergere['original_file']);
				
				 /*
				     Trimite NEWSLETTRE la persoana care a Incarcat fisierul se anunta 
					 ca fisierul a fost sters din baza de date din motiv ca nu sa creat CONT de PLATA
					 ........
				 */		
			}
		}		
	}
	
	
########################################################
    /*
         ANALIZAM fisierele care trebuie sa se stearga automat
		 Se executa in cazul in care fisierul a fost sters anterior si acus se sterge complet din DB
    */
########################################################
	
	if ( me('id') && $_GET['chromeless'] == 0 ) {	

		$fisiereCatreStergere = myQ("
			SELECT *
			FROM `[x]files`
			WHERE `status_file` = '20' 
		");
		
		/* Analizam daca au trecut 3 zile de cind sa sters fisierul contul */
		$i=0;
		while ($fisiereStergere = myF($fisiereCatreStergere)) {
		    
			if ( ((time()-_fnc("checkTime", $fisiereStergere['time20'], 2, 'zile')) > 0)  ) {
			
			     myQ("
				     DELETE 
				     FROM `[x]files` 
				     WHERE `unic_id` = '".$fisiereStergere['unic_id']."'
					 LIMIT 1
			     ");
				 
		 		 @unlink($CONF["files_folder"].$CONF["new_files"]."/".$fisiereStergere['original_file']);
				 
				 /*
				     Trimite NEWSLETTRE la persoana care a Incarcat fisierul se anunta 
					 ca au in timp de 2 zile comanda va fi stearsa
					 ........
				 */		
			}
		}		
	}

?>