<?php
require_once 'include/data/flat.lib.php';
class ManageRentBlock extends Block{
	function buildContent() {
		$userid = getSessionVar('userid');
		$statut = array();
		$statut[1] = '<span class="textGreen textBold textItalic">'.translate(14, LANG, 'Activ').'</span>';
		$statut[2] = '<span class="inactiv textBold textItalic">'.translate(15, LANG, 'Inactiv').'</span>';
		$statut[3] = '<span class="textBold textItalic">'.translate(16, LANG, 'Invizibil').'</span>';
		
		$page = getStringFromRequest('page');
		if(!$page) {
			$page = 1;
		}
		$nrAppToDisp = 10;
		$userApp = getRent($userid, false, false, $nrAppToDisp, ($page-1)*$nrAppToDisp);
		$cnt = count($userApp);
		$cntAll = getRent($userid, true);
		
		if($cnt) {
			for($i=0;$i<$cnt;$i++) {
				$content .= '
					<div class="annonce cursorPointer positionRelative" onmouseover="this.className=\'annonce color cursorPointer positionRelative\'" onmouseout="this.className=\'annonce cursorPointer positionRelative\'" onClick="window.location=\''.getUrl(array('pagePath' => 'Account', 'reste' => 'rent', 'lang' => LANG, 'queryString' => array('numApp' => $userApp[$i]['id']))).'\'">
						<div class="displayRight textBold textRed">'.$userApp[$i]['added'].'</div>
						<span class="textBold">'.$userApp[$i]['title'].'</span>
						<br />
						'.$userApp[$i]['annonce'].'
						<div class="textRight">'.$statut[$userApp[$i]['statut']].'</div>
					</div>
				';
			}
			$pagination = pagination($page, $cntAll, $nrAppToDisp); 
		} else {
			$content = translate(109, LANG);
		}
		
		$html .= '
			<center>  
				<div class="content-main">
					<div class="textBold textSize19 textGreen textCenter marginBottom5">'.translate(0, LANG, 'Anunturile mele de inchiriere').'</div>
					'.$content.'
					<br />
					'.$pagination.'
				</div>
			</center>
		';
		echo $html;
	}
}
?>