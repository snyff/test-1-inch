<?php
class SearchExplonationBlock extends Block{
	function buildContent() {
		$html .= '
			<center>
				<div class="content-main">
					<span class="colorBlue textBold text24px headerStyle">'.translate(103, LANG).'</span>
				</div>
			</center>
			<div class="separator"> </div>
		';
		echo $html;
	}
}
?>