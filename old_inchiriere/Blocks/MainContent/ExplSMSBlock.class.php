
<?php
class ExplSMSBlock extends Block{
	function buildContent() {
		$text = translate(132, LANG);
		$text = str_replace('@number@', '069506296', $text);
		$html .= '
				<div class="textCenter">
					'.$text.'
				</div>
				<br />
				<span class="textBold">'.translate(150, LANG).':</span>
				<br />
				<ol>
					<li>
						'.translate(181, LANG).'
					</li>
					<li>
						'.translate(151, LANG).'
					</li>
					<li>
						'.translate(152, LANG).'
					</li>
					<li>
						'.translate(154, LANG).'
					</li>
					<li>
						'.translate(153, LANG).'
					</li>
				</ol>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = '<div class="textBold text24px colorBlue textCenter marginBottom5">'.str_replace('@url_sms@', '', translate(128, LANG)).'</div>'.$html;
		echo $html;
	}
}
?>