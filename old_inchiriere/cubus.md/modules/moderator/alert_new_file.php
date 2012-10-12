<?php

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
########################################################
    /*
         SELECTAM TOATE FISIERELE DIN db SI LE REPARTIZAM 
		 CA "aprobate" SI "neaprobate"
    */
########################################################

		$fileSelect = myF(myQ("
			SELECT *
			FROM `[x]files`
			WHERE `approved` = '0' OR ( `type_system`='1' AND `approved`='30' ) 
			ORDER BY `id` DESC
			LIMIT 1 
		"));
		
		/*
		     tipul fisierului 
		*/
		if ( $fileSelect["file_name"] != '' ) {
		 
		    $type_file = _fnc("file_extension", "system/cache/pictures/".$fileSelect["file_name"]);
		}
		

		if ( $fileSelect['file_name'] == '' )  {
		    echo 0; 
		}
		elseif ( ($type_file == 'doc' || $type_file == 'rtf' || $type_file == 'txt') && $fileSelect['file_name'] != '' ) {
		    echo $fileSelect['file_name'];
		}
		else {
		    echo 1;
		}
?>