<?php
require_once 'include/data/flat.lib.php';
class AddRentFinalBlock extends Block{
	function buildContent() {
		$title 		= getStringFromRequest('title');
		$annonce 	= getStringFromRequest('annonce');
		$price 		= getStringFromRequest('price');
		$valuta 	= getStringFromRequest('currency');
		$fix 		= getStringFromRequest('fix');
		$mobil 		= getStringFromRequest('mobil');
		$email 		= getStringFromRequest('email');
		$modif		= getStringFromRequest('modif');
		$statut		= getStringFromRequest('statut');
		 
		if($modif && is_numeric($modif)) {
			$success = updateRent($title, $annonce, $price, $valuta, $fix, $mobil, $email, $statut, $modif);
		} else {
			$success = setRent($title, $annonce, $price, $valuta, $fix, $mobil, $email, $statut);
		}
		httpRedirect(getUrl(array('pagePath' => 'Account', 'reste' => 'manage-rent', 'lang' => LANG)));
	}
}
?>