<?php
require_once 'include/data/flat.lib.php';
class ManageAppBlock extends Block{
	function buildContent() {
		$userid = getSessionVar('userid');
		$statut = array();
		$statut['w'] = '<span class="inactiv textBold textItalic">'.translate(107, LANG, 'In asteptare').'</span>';
		$statut['a'] = '<span class="textGreen textBold textItalic">'.translate(105, LANG, 'Acceptat').'</span>';
		$statut['r'] = '<span class="textBold textItalic">'.translate(106, LANG, 'Refuzat').'</span>';
		
		$page = getStringFromRequest('page');
		if(!$page) {
			$page = 1;
		}
		if($userid) {
			$nrAppToDisp = 10;
			$userApp = getFlat($userid, false, false, $nrAppToDisp, ($page-1)*$nrAppToDisp);
			$cnt = count($userApp);
			$cntAll = getFlat($userid, true);
		}
		if($cnt == 0) {
			$content = translate(109, LANG, 'Nu aveti nici un anunt...').'.';
		}
		for($i=0;$i<$cnt;$i++) {
			$visits = getFlatStats($userApp[$i]['id']);
			$textVisits = translate(138, LANG, '(@nr@/@nr1@) vizitatori');
			$textVisits = str_replace('@nr@', $visits['total_today'], $textVisits);
			$textVisits = str_replace('@nr1@', $visits['total_today_unique'], $textVisits);
			$textBulle = translate(139, LANG, 'Astazi:<br/ >Total Visitatori: @nr@<br />Vizitatori Unici:@nr1@');
			$textBulle = str_replace('@nr@', $visits['total_today'], $textBulle);
			$textBulle = str_replace('@nr1@', $visits['total_today_unique'], $textBulle);
			$content .= '
				<div class="annonce cursorPointer positionRelative" onmouseover="this.className=\'annonce color cursorPointer positionRelative\'" onmouseout="this.className=\'annonce cursorPointer positionRelative\'" onClick="window.location=\''.getUrl(array('pagePath' => 'Account', 'reste' => 'add-app', 'lang' => LANG, 'queryString' => array('numApp' => $userApp[$i]['id']))).'\'">
					<div class="displayRight textBold textRed">'.$userApp[$i]['added'].'</div>
					<span class="textBold">'.$userApp[$i]['title'].'</span>
					<br />
					'.$userApp[$i]['annonce'].'
					<div class="textRight"><span class="textSize11" onmouseover="$(\'#stats_'.$userApp[$i]['id'].'\').show();">'.$textVisits.'</span>&nbsp;&nbsp;|&nbsp;&nbsp;'.$statut[$userApp[$i]['accept_status']].'</div>
					<div class="appStatsBulle" id="stats_'.$userApp[$i]['id'].'" onmouseout="$(this).hide();">
						'.$textBulle.'
					</div>
				</div>
			';
		}
		
		$html .= '
			<center>  
				<div class="content-main">
					<div class="textBold textSize19 textGreen textCenter marginBottom5">'.translate(140, LANG, 'Ofertele mele de inchiriere').'</div>
					'.$content.'
					<br />
					'.pagination($page, $cntAll, $nrAppToDisp).'
				</div>
			</center>
		';
		echo $html;
	}
}
?>