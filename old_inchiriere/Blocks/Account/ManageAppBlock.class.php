<?php
require_once 'include/data/flat.lib.php';
class ManageAppBlock extends Block{
	function buildContent() {
		$userid = getSessionVar('userid');
		$statut = array();
		$statut['w'] = '<span class="inactiv textBold textItalic">'.translate(107, LANG, 'In asteptare').'</span>';
		$statut['a'] = '<span class="colorGreen textBold textItalic">'.translate(105, LANG, 'Acceptat').'</span>';
		$statut['r'] = '<span class="textBold textItalic">'.translate(106, LANG, 'Refuzat').'</span>';
		
		$page = getStringFromRequest('page');
		if(!$page) {
			$page = 1;
		}
		if($userid) {
			$nrAppToDisp = 10;
			$userApp = getFlat($userid, false, false, $nrAppToDisp, ($page-1)*$nrAppToDisp, false, true);
			$cnt = count($userApp);
			$cntAll = getFlat($userid, true);
		}
		if($cnt == 0) {
			$content = '<div class="textCenter textBold">'.translate(109, LANG, 'Nu aveti nici un anunt...').'.</div>';
			$content = annonce($content, false, false, false, 'H');
		}
		$js = jsAnnonce();
		$raion = getRaions();
		for($i=0;$i<$cnt;$i++) {
			$visits = getFlatStats($userApp[$i]['id']);
			$textVisits = translate(138, LANG, '(@nr@/@nr1@) vizitatori');
			$textVisits = str_replace('@nr@', $visits['total_today'], $textVisits);
			$textVisits = str_replace('@nr1@', $visits['total_today_unique'], $textVisits);
			$textBulle = translate(139, LANG, 'Astazi:<br/ >Total Visitatori: @nr@<br />Vizitatori Unici:@nr1@');
			$textBulle = str_replace('@nr@', $visits['total_today'], $textBulle);
			$textBulle = str_replace('@nr1@', $visits['total_today_unique'], $textBulle);
			if($userApp[$i]['photo']) {
				$photo = getPhotoPath($userApp[$i]['photo'], 'jpg', 'min');
			} else {
				$photo = getPhotoPath('no-photo', 'jpg');
			}
//			$content .= '
//				<div class="cursorPointer positionRelative" onmouseover="this.className=\'annonce color cursorPointer positionRelative\'" onmouseout="this.className=\'annonce cursorPointer positionRelative\'" onClick="window.location=\''.getUrl(array('pagePath' => 'Account', 'reste' => 'add-app', 'lang' => LANG, 'queryString' => array('numApp' => $userApp[$i]['id']))).'\'">
//					<div class="displayRight textBold colorRed">'.$userApp[$i]['added'].'</div>
//					<span class="textBold">'.$userApp[$i]['title'].'</span>
//					<br />
//					'.$userApp[$i]['annonce'].'
//					<div class="textRight"><span class="textSize11" onmouseover="$(\'#stats_'.$userApp[$i]['id'].'\').show();">'.$textVisits.'</span>&nbsp;&nbsp;|&nbsp;&nbsp;'.$statut[$userApp[$i]['accept_status']].'</div>
//					<div class="appStatsBulle" id="stats_'.$userApp[$i]['id'].'" onmouseout="$(this).hide();">
//						'.$textBulle.'
//					</div>
//				</div>
//			';
			if(strlen($userApp[$i]['annonce']) > 50) {
				$textAnnonce = substr($userApp[$i]['annonce'], 0, 50).'...';
			} else {
				$textAnnonce = $userApp[$i]['annonce'];
			}
			$textAnnonce = stripslashes($textAnnonce);
			$params = 'onMouseover="switchAnnOn('.$userApp[$i]['id'].');" id="main'.$userApp[$i]['id'].'" onMouseout="switchAnnOff('.$userApp[$i]['id'].');" id="main'.$userApp[$i]['id'].'" onClick="window.location=\''.getUrl(array('pagePath' => 'Account', 'reste' => 'add-app', 'lang' => LANG, 'queryString' => array('numApp' => $userApp[$i]['id']))).'\'"';
			$cont = '
					<table border="0" class="fullWidth">
							<tr>
								<td width="1">
									<img src="'.$photo.'">
								</td>
								<td valign="top" class="positionRelative">
									<div class="annonceDetHeader">
										<div class="annTimePosted">'.$userApp[$i]['added'].'</div>
										'.translate(13, LANG, 'Odai').': <span class="textBold">'.$userApp[$i]['nr_rooms'].'</span>
										&nbsp;&nbsp;
										'.translate(147, LANG, 'Sector').': <span class="textBold">'.$raion[$userApp[$i]['raion']].'</span>
										&nbsp;&nbsp;
										'.translate(6, LANG, 'Pret').': <span class="textBold">'.$userApp[$i]['price'].' '.$userApp[$i]['valuta'].'</span>
									</div>
									<div class="annTitle">
										'.stripslashes($userApp[$i]['title']).'
										<br />
										'.$textAnnonce.'
									</div>
									<div class="displayRight text12px marginRight5 statutStats">
										<span onmouseover="$(\'#stats_'.$userApp[$i]['id'].'\').show();">'.$textVisits.'</span>&nbsp;&nbsp;|&nbsp;&nbsp;'.$statut[$userApp[$i]['accept_status']].'
									</div>
									<div class="appStatsBulle" id="stats_'.$userApp[$i]['id'].'" onmouseout="$(this).hide();">
										'.$textBulle.'
									</div>
								</td>
							</tr>
						</table>
			';
			$content .= annonce($cont, $params, $userApp[$i]['id']);
			$content .= '<div class="separator"> </div>';
		}
		
		$html .= '
				<div class="textBold colorBlue text24px textCenter marginBottom5 headerStyle">'.translate(140, LANG, 'Ofertele mele de inchiriere').'</div>
				'.$content.'
				<br />
				'.pagination($page, $cntAll, $nrAppToDisp).'
				<br />
		';
		echo $html.$js;
	}
}
?>