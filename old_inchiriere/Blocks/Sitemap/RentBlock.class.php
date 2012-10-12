<?php
require_once 'include/data/flat.lib.php';
class RentBlock extends Block{
	function buildContent() {
		$raion = getRaions();
		$page = getStringFromRequest('page');
		if(!$page) {
			$page = 1;
		}
		$nrAppToDisp = 10;
		$allApp = getRent(false, false, false, $nrAppToDisp, ($page-1)*$nrAppToDisp, 1);
		$cnt = count($allApp);
		$cntAll = getRent(false, true, false, false, false, 1);
		$js = jsAnnonce();
		for($i=0;$i<$cnt;$i++) {
			$phones = false;
			if($allApp[$i]['fix']) {
				$phones = $allApp[$i]['fix']; 
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

			$cont .= '<a href="'.getUrl(array('pagePath'=>'RentDetails', 'lang'=>LANG, 'queryString'=>array('id'=>$allApp[$i]['id']))).'">'.translate(6, LANG, 'Pret').': <span class="textBold">'.$allApp[$i]['price'].' '.$allApp[$i]['valuta'].'</span> '.$allApp[$i]['title'].'</a><br />';
		}
		$content = $cont;
		$html .= '
				<div class="content-main">
					<div class="textBold text24px colorBlue textCenter marginBottom5">'.translate(42, LANG, 'Inchiriez').'</div>
					'.$content.'
					'.pagination($page, $cntAll, $nrAppToDisp).'
					<br />
				</div>
		';
		echo $html.$js;
	}
}
?>