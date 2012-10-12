<?php
class ConfirmationExplBlock extends Block{
	function buildContent() {
		$html .= '
			<center>
				<div class="textBold">
					'.translate(121, LANG).'
				</div>
			</center>
		';
		$html = annonce($html, false, false, false, 'H');
		echo $html;
	}
}
?>