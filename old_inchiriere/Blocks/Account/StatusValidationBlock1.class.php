<?php
class StatusValidationBlock extends Block{
	function buildContent() {
		$html .= '
			<center>  
				<div class="content-main">
					<div class="warning">
						'.translate(104, LANG).'.
					</div>
				</div>
			</center>
		';
		echo $html;
	}
}
?>