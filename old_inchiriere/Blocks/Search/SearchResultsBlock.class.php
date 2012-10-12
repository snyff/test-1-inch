<?php
require_once 'include/data/flat.lib.php';
class SearchResultsBlock extends Block{
//	function setCache() {
//		$this->pageNr = getStringFromRequest('page');
//		if(!$this->pageNr) {
//			$this->pageNr = 1;
//		}
//		$raionQ 		= getStringFromRequest('raion');
//		$nrRooms 		= getStringFromRequest('nr_rooms');
//		$fromPrice 		= getStringFromRequest('from_price');
//		$toPrice 		= getStringFromRequest('to_price');
//		$valuta 		= getStringFromRequest('currency');
//		$etaj	 		= getStringFromRequest('nr_etaj');
//		$this->cntAll 	= searchFlats($raionQ, $nrRooms, $fromPrice, $toPrice, $valuta, $etaj, true);
//		
//		$this->cachePath('MainContent/');
//		$this->setCacheTime(30);
//		$this->cache(array( 'lang' 		 => LANG,
//							'page' 		 => $this->pageNr,
//							'cnt'  		 => $this->cntAll,
//							'r'	   		 => $raionQ,
//							'nrRooms'	 => $nrRooms,
//							'fPrice'	 => $fromPrice,
//							'tPrice'	 => $toPrice,
//							'valuta'	 => $valuta,
//							'etaj'	   	 => $etaj
//						  ));
//	}
	function buildContent() {
		$raion = getRaions();
		$nrAppToDisp = 20;
		$this->pageNr = getStringFromRequest('page');
		if(!$this->pageNr) {
			$this->pageNr = 1;
		}
		$raionQ 	= getStringFromRequest('raion');
		$nrRooms 	= getStringFromRequest('nr_rooms');
		$fromPrice 	= getStringFromRequest('from_price');
		$toPrice 	= getStringFromRequest('to_price');
		$valuta 	= getStringFromRequest('currency');
		$etaj	 	= getStringFromRequest('nr_etaj');
		
		$this->cntAll 	= searchFlats($raionQ, $nrRooms, $fromPrice, $toPrice, $valuta, $etaj, true);
		
		$allApp = searchFlats($raionQ, $nrRooms, $fromPrice, $toPrice, $valuta, $etaj, false, $nrAppToDisp, ($this->pageNr-1)*$nrAppToDisp, true);
		$cnt = count($allApp);
		$js = jsAnnonce();
		$yesterday = date("Y-m-d", strtotime("-1 day"));
		if(isIE6) {
			$ieBr = '<br />';
		}
		for($i=0;$i<$cnt;$i++) {
			$phones = $daysAgo = false;
			if($allApp[$i]['agentie']) {
				$txtAgentie = '<br />'.translate(178, LANG, 'Agentie');
			} else {
				$txtAgentie = false;
			}
			if($allApp[$i]['fix']) {
				$phones = $allApp[$i]['fix']; 
			}
			if($allApp[$i]['nr_photos']) {
				$nbPhotos = ' <span class="textItalic textGreen textSize13">('.$allApp[$i]['nr_photos'].' '.translate(66, LANG, 'foto').')</span>';
			} else {
				$nbPhotos = false;
			}
			if($allApp[$i]['photo']) {
				$photo = getPhotoPath($allApp[$i]['photo'], 'jpg', 'min');
			} else {
				$photo = getPhotoPath('no_photo', 'jpg');
			}
			if($allApp[$i]['mobil']) {
				if($phones) {
					$phones .= '<br />';
				}
				$phones .= $allApp[$i]['mobil']; 
			}
			if($allApp[$i]['photo']) {
				$winHeight = 750;
			} else {
				$winHeight = 650;
			}
			
			if(substr($allApp[$i]['added'], 0, 10) == date("Y-m-d")) {
				$dateClass = ' colorRed textBold';
				$textDate = translate(148, LANG, 'Astazi');
			} elseif(substr($allApp[$i]['added'], 0, 10) == $yesterday) {
				$dateClass = false;
				$textDate = translate(165, LANG, 'Ieri');
			} else {
				$dateClass = false;
				$textDate = substr($allApp[$i]['added'], 0, 10);
				$daysAgo = time() - strtotime($allApp[$i]['added']);
				$daysAgo = round($daysAgo/60/60/24);
			}
			if($allApp[$i]['title']) {
				$title = $allApp[$i]['title'];
				$title = stripslashes($title);
			} else {
				$title = false;
			}
			$params = 'onMouseover="switchAnnOn('.$allApp[$i]['id'].');" id="main'.$allApp[$i]['id'].'" onMouseout="switchAnnOff('.$allApp[$i]['id'].');" id="main'.$allApp[$i]['id'].'" onClick="NewWindow(\'app?id='.$allApp[$i]['id'].'\', 770, '.$winHeight.'); return false;"';
//			$cont = '
//					<table border="0" class="fullWidth">
//							<tr>
//								<td width="1" valign="top">
//									<img src="'.$photo.'">
//								</td>
//								<td valign="top" class="positionRelative">
//									<div class="annonceDetHeader">
//										<div class="annTimePosted '.$dateClass.'">'.$textDate.'</div>
//										'.$title.'
//										'.translate(13, LANG, 'Odai').': <span class="textBold">'.$allApp[$i]['nr_rooms'].'</span>
//										&nbsp;&nbsp;
//										'.translate(147, LANG, 'Sector').': <span class="textBold">'.$raion[$allApp[$i]['raion']].'</span>
//										&nbsp;&nbsp;
//										'.translate(6, LANG, 'Pret').': <span class="textBold">'.$allApp[$i]['price'].' '.$allApp[$i]['valuta'].'</span>
//									</div>
//									<div class="annTitle">
//										'.$textTitle.'
//									</div>
//									<br />
//									<div class="annContacts">
//										'.translate(69, LANG, 'Contacte').': <span class="textBold">'.$phones.'</span>
//									</div>
//									<br />
//									'.$txtAgentie.'
//								</td>
//							</tr>
//						</table>
//			';
//			$content .= annonce($cont, $params, $allApp[$i]['id']);
//			$content .= '<div class="separator"> </div>';
			$annParams[$i]['title'] 	= $title;
			$annParams[$i]['photo'] 	= $photo;
			$annParams[$i]['date']  	= '<div class="'.$dateClass.'">'.$textDate.'</div>';
			$annParams[$i]['phone']  	= $phones;
			$annParams[$i]['sector'] 	= $raion[$allApp[$i]['raion']];
			$annParams[$i]['odai']  	= $allApp[$i]['nr_rooms'];
			$annParams[$i]['price']  	= $allApp[$i]['price'].' '.$allApp[$i]['valuta'];
			$annParams[$i]['id'] 		= $allApp[$i]['id'];
			$annParams[$i]['agentie'] 	= '<span class="colorRed">'.$txtAgentie.'</span>';
			
			if($daysAgo) {
				$annParams[$i]['daysAgo'] 	= '<span class="textItalic text10px">'.$daysAgo.' '.translate(192, LANG, 'zile in urma').'</span>';
			}
		}
		$content = getList($annParams);
		if(!$cnt) {
			$content = '<div class="textCenter textBold">'.translate(83, LANG, 'Nici un rezultat gasit').'.</div>';
			$content = annonce($content, false, false, false, 'H');
		}
		$queryStr = 'raion='.$raionQ.'&nr_rooms='.$nrRooms.'&from_price='.$fromPrice.'&to_price='.$toPrice.'&currenty='.$valuta;
		$html .= '
				'.$content.'
				<div class="separator"> </div>
				'.pagination($this->pageNr, $this->cntAll, $nrAppToDisp, PAGE_PATH, $queryStr).'
				<br />
		';
		echo $html.$js;
	}
}
?>