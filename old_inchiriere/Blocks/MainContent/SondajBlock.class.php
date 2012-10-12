<?php
class SondajBlock extends Block{
	function buildContent() {
                return;
		if($_COOKIE['sondCompleted'] == 'ok') {
			return false;
		}
		$err = getStringFromRequest('err');
		if($err == 'sond_captcha') {
			$errCap = '<br /><span class="colorRed">'.translate(72, LANG, 'Cod securitate gresit').'</span>';
			$err = true;
		}
		if($err == 'sond_data') {
			$errText = '<br /><span class="colorRed">'.translate(188, LANG, 'Va rugam completati cimpul').'</span>';
			$err = true;
		}
		if(!$err) {
			$hidClass = 'displayNone';
		}
		$html .= '
				<div class="textBold text24px colorBlue textCenter marginBottom5 headerStyle">'.translate(189, LANG, 'Sondaj').'</div>
				<div>
					<span style="font-size: 11px">'.translate(187, LANG, 'In curind pe www.inchiriere.md se va lansa un nou serviciu de notificare prin sms, toti abonatiii vor avea posibilitatea sa primeasca anunturile de inchiriere a apartamentelor direct pe telefonul mobil cu ajutorul unui simplu sms, care este parerea Dvs. referitor la initierea acestei optiuni?').'</span>
					<div class="separator"></div>
					<div class="textCenter">
						<a href="javascript:;" class="textBold decoration" onClick="$(\'#sond\').toggle(400);">'.translate(190, LANG, 'Participa').'</a>
					</div>
					<div class="separator"></div>
					<div class="'.$hidClass.'" id="sond">
						<form action="'.getUrl(array('pagePath'=>'HomePage', 'lang'=>LANG, 'reste'=>'sondaj')).'" method="post">
							<table align="center">
								<tr>
									<td>
										<textarea name="opinion" style="width: 400px;"></textarea>'.$errText.'
									</td>
								</tr>
								<tr>
									<td align="center">
										<img src="'.getUrl(array('pagePath'=>'CaptchaImg', 'lang'=>LANG, 'queryString'=>array('t'=>time()))).'">
										<br />
										<div class="separator"></div>
										<input type="text" name="captcha">'.$errCap.'
									</td>
								</tr>
								<tr>
									<td align="center">
										'.but(translate(52, LANG, 'Trimite')).'
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
				<div class="separator"> </div>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = '<div class="marginLeft5">'.$html.'</div>';
		echo $html;
	}
}
?>