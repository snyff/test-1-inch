<?php
@session_start();
class SondajProcessBlock extends Block{
	function buildContent() {
		require_once 'include/data/sondaj.lib.php';
		$sondajText = getStringFromRequest('opinion');
		$captcha = getStringFromRequest('captcha');
		if($captcha != $_SESSION['security_code']) {
			httpRedirect(getUrl(array('pagePath'=>'HomePage', 'lang'=>LANG, 'queryString'=>array('err'=>'sond_captcha'))));
		}
		if(trim($sondajText) == "") {
			httpRedirect(getUrl(array('pagePath'=>'HomePage', 'lang'=>LANG, 'queryString'=>array('err'=>'sond_data'))));
		}
		$rez = setSondaj($sondajText);
		setcookie("sondCompleted", "ok", time()+36000000000, '/');
		httpRedirect(getUrl(array('pagePath'=>'HomePage', 'lang'=>LANG)));
		
	}
}
?>