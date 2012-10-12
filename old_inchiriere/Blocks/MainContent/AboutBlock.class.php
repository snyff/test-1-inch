<?php
class AboutBlock extends Block{
	function buildContent() {
		$welcomeText = translate(96, LANG);
		$registerUrl = getUrl(array('pagePath'=>'Registration', 'lang'=>LANG));
		$welcomeText = str_replace('@url_register@', $registerUrl, $welcomeText);
		$addAnnonce = getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG));
		$welcomeText .= '<br />'.translate(172, LANG);
		$welcomeText = str_replace('@add_annonce@', $addAnnonce, $welcomeText);
		$html .= '
			'.$welcomeText.'
			<div class="separator"> </div>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = '<div class="textBold text24px colorBlue textCenter marginBottom5 headerStyle">'.translate(70, LANG, 'Despre noi').'</div>'.$html;
		echo $html;
	}
}
?>