<?php
require_once 'include/data/flat.lib.php';
class MainBlock extends Block{
//	function setCache() {
//		$this->pageNr = getStringFromRequest('page');
//		if(!$this->pageNr) {
//			$this->pageNr = 1;
//		}
//		$this->cntAll = getFlat(false, true, false, false, false, 1);
//		
////		$this->cachePath('MainContent/');
////		$this->setCacheTime(30);
////		$this->cache(array( 'page' => $this->pageNr, 
////							'lang' => LANG, 
////							'cnt'  => $this->cntAll)
////		);
//	}
	function buildContent() {
		$raion = getRaions();
		$this->pageNr = getStringFromRequest('page');
		if(!$this->pageNr) {
			$this->pageNr = 1;
		}
		$this->cntAll = getFlat(false, true, false, false, false, 1);
		$nrAppToDisp = 20;
		$allApp = getFlat(false, false, false, $nrAppToDisp, ($this->pageNr-1)*$nrAppToDisp, 1, true);
		$cnt = count($allApp);
		$js = jsAnnonce();
		$yesterday = date("Y-m-d", strtotime("-1 day"));
		if(isIE6) {
			$ieBr = '<br />';
		}
		for($i=0;$i<$cnt;$i++) {
			$phones = $daysAgo = false;
			if($allApp[$i]['fix']) {
				$phones = $allApp[$i]['fix'];
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
			if(!$phones) {
				$phones = '-';
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
			if(!isIE6 && !isIE7) {
				$params = 'onMouseover="switchAnnOn('.$allApp[$i]['id'].');" id="main'.$allApp[$i]['id'].'" onMouseout="switchAnnOff('.$allApp[$i]['id'].');" id="main'.$allApp[$i]['id'].'" onClick="NewWindow(\'app?id='.$allApp[$i]['id'].'\', 770, '.$winHeight.'); return false;"';
			} else {
				$params = 'onClick="NewWindow(\'app?id='.$allApp[$i]['id'].'\', 770, '.$winHeight.'); return false;"';
			}
			$annParams[$i]['title'] 	= $title;
			$annParams[$i]['photo'] 	= $photo;
			$annParams[$i]['photo_alt'] = $title;
			$annParams[$i]['date']  	= '<div class="'.$dateClass.'">'.$textDate.'</div>';
			$annParams[$i]['phone']  	= $phones;
			$annParams[$i]['sector'] 	= $raion[$allApp[$i]['raion']];
			$annParams[$i]['odai']  	= $allApp[$i]['nr_rooms'];
			$annParams[$i]['price']  	= $allApp[$i]['price'].' '.$allApp[$i]['valuta'];
			$annParams[$i]['id'] 		= $allApp[$i]['id'];
			if($daysAgo) {
				$annParams[$i]['daysAgo'] 	= '<span class="textItalic text10px">'.$daysAgo.' '.translate(192, LANG, 'zile in urma').'</span>';
			}
			
		}
		$content = getList($annParams, false, true);
		$html .= '
				<div class="content-main">
					<div class="textBold colorBlue text24px textCenter marginBottom5 headerStyle">'.translate(40, LANG, 'Oferte inchiriere').'</div>
					'.$content.'
					<div class="separator"> </div>
					'.pagination($this->pageNr, $this->cntAll, $nrAppToDisp).'
					<br />
				</div>
		';
		echo $html.$js;
	}
}
?>