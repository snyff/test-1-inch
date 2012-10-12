<?php
class PrivacyBlock extends Block{
	function buildContent() {
		$html .= '
				'.translate(111, LANG).'
			<div class="separator"> </div>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = '<div class="textBold text24px colorBlue textCenter marginBottom5">'.translate(126, LANG).'</div>'.$html;
		echo $html;
	}
}
?>