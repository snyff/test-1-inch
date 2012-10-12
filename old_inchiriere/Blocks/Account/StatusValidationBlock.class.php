<?php
class StatusValidationBlock extends Block{
	function buildContent() {
		if($this->getParameter('firstTimeRegister')) {
			$additional = translate(173, LANG);
			$additional .= '<br />';
			$additional .= '<ul>';
				$additional .= '<li>';
					$additional .= translate(168, LANG);
				$additional .= '</li>';
				$additional .= '<li>';
					$additional .= translate(169, LANG);
				$additional .= '</li>';
				$additional .= '<li>';
					$additional .= translate(170, LANG);
				$additional .= '</li>';
				$additional .= '<li>';
					$additional .= translate(171, LANG);
				$additional .= '</li>';
			$additional .= '</ul>';
		}
		$html .= '
			<center>  
				<div class="content-main">
					<div class="warning">
						'.translate(104, LANG).'.
						<br />
					</div>
					<div class="textLeft">
						'.$additional.'
					</div>
					<br clear="all">
				</div>
			</center>
		';
		$html = annonce($html, false, false, false, 'H');
		echo $html;
	}
}
?>