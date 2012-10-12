<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  09.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////
 
 
 	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function addFilePart($file_id) {
		
		/* Scoatem datele despre fisierul care se da in traducere */
 		$selectF = myF(myQ("SELECT * FROM `[x]files` WHERE `file_id`='".$file_id."' LIMIT 1"));
		
		if ($selectF['translation_status']==0 && $selectF['translator_id']>0) {
		
			/* Se genereaza un cod UNIC care se va folosi ca ID in Tabela */
			$unic_id = rand(100,999).rand(100,999).rand(100,999).time();
			
			// !!!!!!!!!!!!
			$translation_deadline = time() + _fnc("file_deadline", $selectF['characters_nr']);
			
			
			/* insert to database a new file */
			myQ("INSERT INTO `[x]files_to_translator` (			
					`unic_id`, `company_id`, `original_name`, `original_file`, `parent_file_id`, `parent_file_to_translator_id`, `translator_id`, `languages_type`, `status_file`,  
					`addtime`, `translation_deadline`, `ft_price`, `ft_price_discount`, `salary_translator`, `translation_type`, `translation_method`				
				) VALUES (				 
					'".$unic_id."', '".$selectF['company_id']."', '".$selectF['original_name']."', '".$selectF['original_file']."', '".$selectF['file_id']."', '0', '".$selectF['translator_id']."', '".$selectF['languages_type']."', '20', 
					'".time()."', '".$translation_deadline."', '".$selectF['price']."', '".$selectF['price_discount']."', '".$selectF['salary_translator']."', '0', '1'
				)
			");	
	  
			/* Adaugam si in tabela FILES metoda prin care are loc traducerea fisierului */
			myQ("UPDATE `[x]files` SET `translation_status`='1', `translation_method`='1' WHERE `file_id`='".$file_id."' LIMIT 1");
		}
   	}
	
?>