<?php
class ExplonationBlock extends Block{
	function buildContent() {
		$text = translate(96, LANG);
		$text = str_replace('@url_register@', getUrl(array('pagePath'=>'Registration', 'lang'=>LANG)), $text);
		$html .= '
				<div class="content-main">
					'.$text.'
					<div class="lineHeight17">
						'.translate(127, LANG).':
						<ul>
							<li>'.translate(128, LANG, 'Plasati anunturi pe site folosind SMS').'<a class="statutHelp" href="'.getUrl(array('pagePath'=>'HomePage', 'lang'=>LANG, 'reste'=>'sms')).'" title="'.translate(131, LANG, 'Apasati pentru detalii').'"></a></li>
							<li>'.translate(129, LANG).'</li>
						</ul>
					</div>
				</div>
			<div class="separator"> </div>
		';
		echo $html;
	}
}
?>