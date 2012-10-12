<?php
class RegisterBlock extends Block {
	function buildContent() {
		$error = getSessionVar('error');
		if($error) {
			switch($error) {
				case 'captha'			: $errorMes = translate(72, LANG, 'Cod Securitate Incorect. Va rugam sa mai incercati.'); break;
				case 'fields_required'	: $errorMes = translate(56, LANG, 'Toate Cimpurile sint Obligatorii').'.'; break;
				case 'pass'				: $errorMes = translate(73, LANG, 'Parolele nu coincid').'.'; break;
				case 'len'				: $errorMes = translate(74, LANG, 'Parola trebuie sa contina minim 6 caractere').'.'; break;
				case 'exists'			: $errorMes = translate(122, LANG, 'Emailul acesta este deja inregistrat. Va rugam alegeti altul').'.'; break;
			}
			$errorMes = '<span class="textBold textRed">'.$errorMes.'</span>';
			unsetSesssionVar('error');
		} else {
			$errorMes = '<span class="textBold textGreen textSize15">'.translate(64, LANG, 'Inregistrare').'</span>'; 
		}
		$html .= '
			<center>  
				<div class="content-main">
					'.$errorMes.'
					<div class="annonce">
						<form method="post" action="'.getUrl(array('pagePath' => 'Registration', 'lang' => LANG, 'reste' => 'register-user')).'" id="registration_form">
							<table border="0">
								<tr>
									<td>
										'.translate(48, LANG, 'Nume').':
									</td>
									<td>
										<input type="text" name="name" id="name" value="'.getSessionVar('reg_name').'">
									</td>
								</tr>
								<tr>
									<td>
										'.translate(49, LANG, 'Prenume').':
									</td>
									<td>
										<input type="text" name="lastname" id="lastname" value="'.getSessionVar('reg_lastname').'">
									</td>
								</tr>
								<tr>
									<td>
										'.translate(7, LANG, 'email').':
									</td>
									<td>
										<input type="text" name="email" id="email" value="'.getSessionVar('reg_email').'">
									</td>
								</tr>
								<tr>
									<td>
										'.translate(75, LANG, 'Parola').':
									</td>
									<td>
										<input type="password" name="pass" id="pass">
									</td>
								</tr>
								<tr>
									<td>
										'.translate(76, LANG, 'Inca odata').':
									</td>
									<td>
										<input type="password" name="repass" id="repass">
									</td>
								</tr>
								<tr>
									<td>
										'.translate(77, LANG, 'Cod Securitate').':
									</td>
									<td>
										<div class="positionRelative">
											<img src="captcha.jpg" id="captcha">
											<div class="refresh" onclick="document.getElementById(\'captcha\').src=\'captcha.jpg?dd=\'+new Date().getTime();">
							 				</div>
							 			</div>
										<input type="text" name="captcha" id="captcha" class="captcha">
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><input type="submit" value="'.translate(64, LANG, 'Inregistrare').'" class="but"></td>
								</tr>
							</table>
						</form>
					</div> 
				</div>
			</center>
		';
		echo $html;
	}
}
?>