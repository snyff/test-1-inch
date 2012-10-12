<?php
require_once 'include/data/flat.lib.php';
class SubscribeBlock extends Block{
	function buildContent() {
		$nrRooms 	= getStringFromRequest('nr_rooms');
		$etaj 		= getStringFromRequest('etaj');
		$raion 		= getStringFromRequest('raion');
		$fromPrice 	= getStringFromRequest('from_price');
		$toPrice 	= getStringFromRequest('to_price');
		$valuta 	= getStringFromRequest('currency');
		$email 		= getStringFromRequest('email');
		$subsLang	= getStringFromRequest('subs_lang');
		
		$success = setSubs($nrRooms, $etaj, $raion, $fromPrice, $toPrice, $valuta, $email, $subsLang);
		if($success) {
			echo translate(84, LANG, 'Abonarea a avut loc cu succes').".";
		} else {
			echo translate(85, LANG, 'Eroare necunoscuta').".";
		}
		die;
//		httpRedirect(getUrl(array('pagePath' => 'HomePage', 'lang' => LANG)));
	}
}
?>