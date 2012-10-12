<?php

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function traducatori_price( $pret_fisier, $id_user ) {
		

			/*
			    Tipul pretului
			*/
			if ( $id_user >= 576 ) { $coeficient_pret = 4/10; }
			else                   { $coeficient_pret = 5/10; }

 			/*
			    Arata pretul 
			*/
			return bcdiv(($pret_fisier * $coeficient_pret), 1, 2);
	}

?>