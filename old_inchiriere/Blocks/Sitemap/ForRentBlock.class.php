<?php
require_once 'include/data/flat.lib.php';
class ForRentBlock extends Block{
	function buildContent() {
		$raion = getRaions();
		$page = getStringFromRequest('page');
		if(!$page) {
			$page = 1;
		}
		$nrAppToDisp = 10;
		$allApp = getFlat(false, false, false, $nrAppToDisp, ($page-1)*$nrAppToDisp, 1, true);
		$cnt = count($allApp);
		$cntAll = getFlat(false, true, false, false, false, 1);
		$js = jsAnnonce();
		for($i=0;$i<$cnt;$i++) {
			$phones = false;
			if($allApp[$i]['fix']) {
				$phones = $allApp[$i]['fix'];
			}
			if($allApp[$i]['photo']) {
				$photo = getPhotoPath($allApp[$i]['photo'], 'jpg', 'min');
			} else {
				$photo = getPhotoPath('no-photo', 'jpg');
			}
			if($allApp[$i]['mobil']) {
				if($phones) {
					$phones .= ' - ';
				}
				$phones .= $allApp[$i]['mobil']; 
			}
			if(!$phones) {
				$phones = '-';
			}
			if(strlen($allApp[$i]['title']) > 100) {
				$textTitle = substr($allApp[$i]['title'], 0, 100).'...';
			} else {
				$textTitle = $allApp[$i]['title'];
			}
			
			$cont .= '<a href="'.getUrl(array('pagePath'=>'Flat', 'lang'=>LANG, 'queryString'=>array('id'=>$allApp[$i]['id']))).'">'.translate(13, LANG, 'Odai').': <span class="textBold">'.$allApp[$i]['nr_rooms'].'</span>
					&nbsp;
					'.translate(147, LANG, 'Sector').': <span class="textBold">'.$raion[$allApp[$i]['raion']].'</span>
					&nbsp;
					'.translate(6, LANG, 'Pret').': <span class="textBold">'.$allApp[$i]['price'].' '.$allApp[$i]['valuta'].'</span>
					'.$textTitle.'
					</a>
					<br />
			';
		}
		$content = $cont;
		$html .= '
				<div class="content-main">
					<div class="textBold colorBlue text24px textCenter marginBottom5">'.translate(40, LANG, 'Oferte inchiriere').'</div>
					'.$content.'
					<br />
					'.pagination($page, $cntAll, $nrAppToDisp).'
					<br />
				</div>
		';
		echo $html.$js;
	}
}
?>