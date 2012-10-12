<?php
class PrivacyBlock extends Block{
	function buildContent() {
		$html .= '
			<center>
				<div class="content-main">
					<div class="textBold textSize19 textGreen textCenter marginBottom5">'.translate(126, LANG).'</div>
					'.translate(111, LANG).'
				</div>
			</center>
			<div class="separator"> </div>
		';
		echo $html;
	}
}
?>