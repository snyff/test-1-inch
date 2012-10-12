<?php
require_once 'include/data/flat.lib.php';
class DelAppBlock extends Block{
	function buildContent() {
		$nrApp	= getStringFromRequest('delApp');
		$nrRent	= getStringFromRequest('delRent');
		
		if($nrApp) {
			$success = delFlat($nrApp, getSessionVar('userid'));
		}
		if($nrRent) {
			$success = delRent($nrRent, getSessionVar('userid'));
		}
		httpRedirect(getUrl(array('pagePath' => 'Account', 'lang' => LANG)));
	}
}
?>