<?php
class MainMenuBlock extends Block{
	function buildContent() {
		$addAnnonce = translate(130, LANG, 'Adauga Anunt');
		$home = translate(68, LANG, 'Acasa');
		if(LANG != 'eng') {
			$agentie = translate(177, LANG, 'Anunturile agentiile');
			$agentie = str_replace(' ', ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $agentie);
		} else {
			$agentie = translate(177, LANG, 'Anunturile agentiile');
			$agentie = str_replace('@space@', ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $agentie);
			 
		}
		
		$addClass = array();
		if(isIE6 || isIE7) {
			if(LANG != 'rus') {
				$addClass['home'] = ' lineHeight30px';
				$addClass['addAnn'] = ' lineHeight30px';
			}
			$addClass['dau'] = ' lineHeight30px';
			$addClass['inchiriez'] = ' lineHeight30px';
			$addClass['about'] = ' lineHeight30px';
		}
		if(LANG == 'rus') {
			$addAnnonce = str_replace(' ', ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $addAnnonce);
			$addAnnonceClass = 'addAnnonce2lines';
			$homeClass = 'home2lines';
			if(isIE7 || isIE6) {
				$forRentText = translate(40, LANG, 'Dau In Chirie');
				$rentText = translate(42, LANG, 'Inchiriez');
				$textRegister = translate(64, LANG, 'Inregistrare');
				$textAbout = translate(70, LANG, 'Despre Noi');
			} else {
				$textRegister = translate(64, LANG, 'Inregistrare');
				$forRentText = translate(40, LANG, 'Dau In Chirie');
				$rentText = translate(42, LANG, 'Inchiriez');
				$textAbout = translate(70, LANG, 'Despre Noi');
			}
		} else {
			$addAnnonceClass = 'addAnnonce';
			$homeClass = 'home';
			$forRentText = translate(40, LANG, 'Dau In Chirie');
			$rentText = translate(42, LANG, 'Inchiriez');
			$textRegister = translate(64, LANG, 'Inregistrare');
			$textAbout = translate(70, LANG, 'Despre Noi');
		}
		$html .= '
			<div id="main_menu">
				<table border="0" class="fullWidth" cellpadding="0" cellspacing="0">
					<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG)).'" class="'.$homeClass.$addClass['home'].'">'.$home.'</a>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG)).'" class="'.$addAnnonceClass.$addClass['addAnn'].'">'.$addAnnonce.'</a>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'reste' => 'for-rent')).'" class="for_rent'.$addClass['dau'].'">'.$forRentText.'</a>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'reste' => 'rent')).'" class="irent'.$addClass['inchiriez'].'">'.$rentText.'</a>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'reste' => 'ag')).'" class="agentie">'.$agentie.'</a>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<!--<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'Registration', 'lang' => LANG)).'" class="register">'.$textRegister.'</a>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>-->
					
					<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'About', 'lang' => LANG)).'" class="about'.$addClass['about'].'">'.$textAbout.'</a>
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
				</table>
			</div>
		';
		echo $html;
	}
}
?>