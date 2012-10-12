<?php
class LoginBlock extends Block{
	function buildContent() {
		$error = getStringFromRequest('error');
		if($error == 'wrong_data') {
			$errorMess = '<span class="colorRed textBold">'.translate(62, LANG, 'Email sau Parola Incorecta').'</span>
							<br />';
		}
		if(LANG != 'eng') {
			$paddingLeft = 'paddingLeft14';
		}
		$header = '<span class="colorBlue textVerdana textBold text13px">'.translate(63, LANG, 'Intrare Cont').'</span><!--/<a href='.getUrl(array('pagePath' => 'Registration', 'lang' => LANG)).' class="colorRed textVerdana textBold text13px">'.translate(64, LANG, 'Inregistrare').'</a>-->';
		$html .= '
			<div class="'.$paddingLeft.' paddingTop14">
				<form method="post" action="'.getUrl(array('pagePath' => 'Registration', 'lang' => LANG, 'reste' => 'login')).'">
					'.$errorMess.'
					<table border="0">
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(7, LANG).':</span>
							</td>
							<td>
								<input type="text" name="email" id="user" class="width150 inputText" value="">
							</td>
						</tr>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(75, LANG).':</span>
							</td>
							<td>
								<input type="password" name="pass" id="pass" class="width150 inputText">
							</td>
						</tr>
					</table>
					<div class="paddingRight11 textRight">
						'.but(translate(65, LANG, 'Intrare')).'
					</div>
				</form>
			</div>
		';
		$html = box($header, $html, 'blueBorder', false, 'defaultHeader');
		if((isIE7 || isIE6) && (LANG=='rus')) {
			$additionalParams = ' style="margin-top: 25px!important;"';
			$html = '<div '.$additionalParams.'>'.$html.'</div>';
		}
		echo $html;
	}
}
?>