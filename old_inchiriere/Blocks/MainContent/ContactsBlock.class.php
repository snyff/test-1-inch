<?php
class ContactsBlock extends Block{
	function buildContent() {
		$html .= '
			<center>
				<div class="content-main">
					'.translate(99, LANG).'
				</div>
			</center>
			<div class="separator"> </div>
		';
		echo $html;
	}
}
?>