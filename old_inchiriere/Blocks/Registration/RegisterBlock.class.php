<?php
class RegisterBlock extends Block {
	function buildContent() {
		@session_start();
		$error = $_SESSION['error'];
		if($error) {
			switch($error) {
				case 'captha'			: $errorMes = translate(72, LANG, 'Cod Securitate Incorect. Va rugam sa mai incercati.'); break;
				case 'fields_required'	: $errorMes = translate(56, LANG, 'Toate Cimpurile sint Obligatorii').'.'; break;
				case 'pass'				: $errorMes = translate(73, LANG, 'Parolele nu coincid').'.'; break;
				case 'len'				: $errorMes = translate(74, LANG, 'Parola trebuie sa contina minim 6 caractere').'.'; break;
				case 'exists'			: $errorMes = translate(122, LANG, 'Emailul acesta este deja inregistrat. Va rugam alegeti altul').'.'; break;
			}
			$errorMes = '<span class="textBold colorRed">'.$errorMes.'</span>';
			unsetSesssionVar('error');
		} else {
			$errorMes = '<div class="textBold text24px colorBlue textCenter marginBottom5">'.translate(64, LANG, 'Inregistrare').'</div>'; 
		}
		$html .= '
						<form method="post" action="'.getUrl(array('pagePath' => 'Registration', 'lang' => LANG, 'reste' => 'register-user')).'" id="registration_form">
							<table border="0">
								<tr>
									<td>
										<span class="colorBlue textVerdana textBold text12px">'.translate(48, LANG, 'Nume').':</span>
									</td>
									<td>
										<input type="text" name="name" id="name" class="inputText" value="'.getSessionVar('reg_name').'">
									</td>
								</tr>
								<tr>
									<td>
										<span class="colorBlue textVerdana textBold text12px">'.translate(49, LANG, 'Prenume').':</span>
									</td>
									<td>
										<input type="text" name="lastname" class="inputText" id="lastname" value="'.getSessionVar('reg_lastname').'">
									</td>
								</tr>
								<tr>
									<td>
										<span class="colorBlue textVerdana textBold text12px">'.translate(7, LANG, 'email').':</span>
									</td>
									<td>
										<input type="text" name="email" class="inputText" id="email" value="'.getSessionVar('reg_email').'">
									</td>
								</tr>
								<tr>
									<td>
										<span class="colorBlue textVerdana textBold text12px">'.translate(75, LANG, 'Parola').':</span>
									</td>
									<td>
										<input type="password" name="pass" class="inputText" id="pass">
									</td>
								</tr>
								<tr>
									<td>
										<span class="colorBlue textVerdana textBold text12px">'.translate(76, LANG, 'Inca odata').':</span>
									</td>
									<td>
										<input type="password" name="repass" class="inputText" id="repass">
									</td>
								</tr>
								<tr>
									<td>
										<span class="colorBlue textVerdana textBold text12px">'.translate(77, LANG, 'Cod Securitate').':</span>
									</td>
									<td>
										<div class="positionRelative">
											<img src="'.getUrl(array('pagePath'=>'CaptchaImg', 'lang'=>LANG, 'queryString'=>array('t',time()))).'" id="captcha">
											<div class="refresh" onclick="document.getElementById(\'captcha\').src=\'captcha.jpg?dd=\'+new Date().getTime();">
							 				</div>
							 			</div>
										<input type="text" name="captcha" class="inputText" id="captcha" class="captcha">
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>'.but(translate(64, LANG, 'Inregistrare')).'</td>
								</tr>
							</table>
						</form>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = $errorMes.$html;
		echo $html;
	}
}
?>