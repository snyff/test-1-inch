<?php
require_once 'include/data/flat.lib.php';
require_once 'include/data/upload.lib.php';
require_once 'include/data/registration/registration.lib.php';
class AddAppFinalBlock extends Block{
	function buildContent() {
		if($this->getParameter('emailCheck')) {
			$email 		 = getStringFromRequest('email');
			$emailExists = checkMail($email);
			if($emailExists) {
				die('exists');
			} else {
				die('ok');
			}
			die;
		}
		$photos		= $_FILES['photos'];
		$title 		= getStringFromRequest('title');
		$annonce 	= getStringFromRequest('annonce');
		$nrRooms 	= getStringFromRequest('nr_rooms');
		$etaj 		= getStringFromRequest('etaj');
		$raion 		= getStringFromRequest('raion');
		$price 		= getStringFromRequest('price');
		$valuta 	= getStringFromRequest('valuta');
		$fix 		= getStringFromRequest('fix');
		$mobil 		= getStringFromRequest('mobil');
		$email 		= getStringFromRequest('email');
		$from 		= getStringFromRequest('from');
		$to 		= getStringFromRequest('to');
		$televizor 	= getStringFromRequest('televizor');
		$frigider 	= getStringFromRequest('frigider');
		$mobila 	= getStringFromRequest('mobila');
		$masinaSpalat = getStringFromRequest('masina_spalat');
		$modif		= getStringFromRequest('modif');
		$statut		= getStringFromRequest('statut');
//		$details	= getStringFromRequest('details');
		$pass		= getStringFromRequest('pass');
		$annType 	= getStringFromRequest('annonce_type');
		$agentie	= getStringFromRequest('ann_type');
		
		if($annType == 'for_rent') {
			if($televizor) {
				$televizor = 1;
			}
			if($frigider) {
				$frigider = 1;
			}
			if($mobila) {
				$mobila = 1;
			}
			if($masinaSpalat) {
				$masinaSpalat = 1;
			}
			$statut = 1;
			if($agentie == 2) {
				$agentie = 1;
			} else {
				$agentie = 0;
			}
			$success = setFlatSimple($title, $annonce, $nrRooms, $etaj, $raion, $price, $valuta, $fix, $mobil, $email, $from, $to, $televizor, $frigider, $mobila, $masinaSpalat, $statut, $pass, $agentie);
			httpRedirect(getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG, 'reste'=>'status_w')));
		} elseif($annType == 'rent') {
			$statut = 1;
			if(!$details) {
				$televizor		= 5;
				$frigider		= 5;
				$mobila			= 5;
				$masinaSpalat	= 5;
			}
			setRentSimple($title, $annonce, $price, $valuta, $fix, $mobil, $email, $statut, $pass);
			httpRedirect(getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG, 'reste'=>'status_w')));		
		} else {
			if($televizor) {
				$televizor = 1;
			}
			if($frigider) {
				$frigider = 1;
			}
			if($mobila) {
				$mobila = 1;
			}
			if($masinaSpalat) {
				$masinaSpalat = 1;
			}
			if($modif && is_numeric($modif)) {
				if($agentie == 2) {
					$agentie = 1;
				} else {
					$agentie = 0;
				}
				$success = updateFlat($title, $annonce, $nrRooms, $etaj, $raion, $price, $valuta, $fix, $mobil, $email, $from, $to, $televizor, $frigider, $mobila, $masinaSpalat, $statut, $modif, $agentie);
			} else {
				if($agentie == 2) {
					$agentie = 1;
				} else {
					$agentie = 0;
				}
				$success = setFlat($title, $annonce, $nrRooms, $etaj, $raion, $price, $valuta, $fix, $mobil, $email, $from, $to, $televizor, $frigider, $mobila, $masinaSpalat, $statut, $agentie);
				if($success) {
					for($i=0;$i<count($photos['name']);$i++) {
						insertPhoto($photos['tmp_name'][$i], $photos['name'][$i], 'a', $success, $photos['type'][$i]);
					}
				}
			}
			httpRedirect(getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste'=>'status_w')));
		}
	}
}
?>