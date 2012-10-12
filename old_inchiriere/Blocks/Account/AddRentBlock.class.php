<?php
require_once 'include/data/flat.lib.php';
class AddRentBlock extends Block{
	function buildContent() {
		$modif = getStringFromRequest('numApp');
		if(isset($modif) && is_numeric($modif)) {
			$userid = getSessionVar('userid');
			$appDetails = getRent($userid, false, $modif);
			$butValue = translate(9, LANG, 'Accept si Modifica');
			$currentAction = translate(92, LANG, 'Modificare Anunt');
		} else {
			$currentAction = translate(93, LANG, 'Adaugare Anunt');
			$butValue = translate(12, LANG, 'Accept and Adauga');
		}
		
		$nrRoomsSelect = '<option value="-" class="textBold">'.translate(3, LANG, 'Odai').'</option>';
		for($i=1;$i<=4;$i++) {
			if($i == $appDetails['nr_rooms']) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$nrRoomsSelect .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
		}
		
		$nrEtajSelect = '<option value="-" class="textBold">'.translate(5, LANG, 'Etaj').'</option>';
		for($i=1;$i<=16;$i++) {
			if($i == $appDetails['etaj']) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$nrEtajSelect .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
		}
		
		
		$statut = array();
		$statut[1] = translate(14, LANG, 'Activ');
		$statut[2] = translate(15, LANG, 'Inactiv');
		$statut[3] = translate(16, LANG, 'Invizibil');
		
		for($i=1;$i<=count($statut);$i++) {
			if($i==$appDetails['statut']) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$statutSelect .= '<option value="'.$i.'" '.$selected.'>'.$statut[$i].'</option>';
		}
		
//		$raion = getRaions();
//		
//		$raionSelect = '<option value="-" class="textBold">Raion</option>';
//		for($i=1;$i<=count($raion);$i++) {
//			if($i==$appDetails['raion']) {
//				$selected = 'selected="selected"';
//			} else {
//				$selected = false;
//			}
//			$raionSelect .= '<option value="'.$i.'" '.$selected.'>'.$raion[$i].'</option>';
//		}
		
		$valuta = array();
		$valuta['eur'] = 'eur';
		$valuta['usd'] = 'usd';
		$valuta['lei'] = 'lei';
		foreach($valuta as $key => $value) {
		if($key==$appDetails['valuta']) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$valutaSelect .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
		}
		
		if($appDetails['televizor']) {
			$televizorYes = 'checked="checked"';
			$televizorNo = false;
		} else {
			$televizorYes = false;
			$televizorNo = 'checked="checked"';
		}
		
		if($appDetails['mobila']) {
			$mobilaYes = 'checked="checked"';
			$mobilaNo = false;
		} else {
			$mobilaYes = false;
			$mobilaNo = 'checked="checked"';
		}
		
		if($appDetails['frigider']) {
			$frigiderYes = 'checked="checked"';
			$frigiderNo = false;
		} else {
			$frigiderYes = false;
			$frigiderNo = 'checked="checked"';
		}
		
		if($appDetails['masina_spalat']) {
			$masinaYes = 'checked="checked"';
			$masinaNo = false;
		} else {
			$masinaYes = false;
			$masinaNo = 'checked="checked"';
		}
		
		$modifHidden = '<input type="hidden" name="modif" value="'.$modif.'">';
		$js = '
			<script>
				$(document).ready(function(){
					$(".resize").resizehandle();
				});
				function sure() {
					$confirm = confirm("'.translate(95, LANG).'");
					if($confirm) {
						window.location = "'.getUrl(array('pagePath'=>'Account', 'reste'=>'del-rent', 'lang'=>LANG, 'queryString'=>array('delRent'=>(int)$modif))).'"
					}
				}
				function checkForm() {
					check = false;
					if($.trim($("#fix").val()) == "" && $.trim($("#mobil").val()) == "") {
						$("#fix").css("border", "1px solid red");
						check = true;
					}
					if(check) {
						$("#error").css("margin-bottom", "5px");
						$("#error").slideDown(500);						
						return false;
					}
				}
			</script>
		';
		if($modif) {
			$added = '<center><span class="textBold">'.translate(17, LANG, 'Adaugat').':</span> <span class="textBold textRed">'.$appDetails['added'].'</span></center>';
		}
		$html .= '
			<center>  
				<div class="content-main">
					<div class="textBold textSize19 textGreen textCenter marginBottom5">'.$currentAction.'</div>
					<form method="post" action="'.getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste' => 'add-rent')).'" id="add_app" onSubmit="return checkForm();">
						<div class="annonce">
								'.$added.'
								<table border="0">
									<tr>
										<td>
											<span class="textBold">'.translate(18, LANG, 'Titlu').':</span>
										</td>
										<td>
											<input type="text" name="title" id="title" class="width430" value="'.$appDetails['title'].'">
										</td>
									</tr>
									<tr>
										<td valign="top">
											<span class="textBold">'.translate(19, LANG, 'Textul anuntului').':</span>
										</td>
										<td>
											<textarea class="width430 resize" name="annonce">'.$appDetails['annonce'].'</textarea>
										</td>
									</tr>
									<tr>
										<td valign="top">
											<span class="textBold">'.translate(21, LANG, 'Telefon').':</span><span class="textRed textBold">*</span>
										</td>
										<td>
											<table border="0" width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td>
														'.translate(22, LANG, 'Stationar').': <input type="text" name="fix" id="fix" class="" value="'.$appDetails['fix'].'">
													</td>
													<td align="right">
														'.translate(23, LANG, 'Mobil').': <input type="text" name="mobil" id="mobil" class="" value="'.$appDetails['mobil'].'">
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<span class="textBold">'.translate(7, LANG, 'Email').':</span>
										</td>
										<td>
											<input type="text" name="email" id="email" class="width430" value="'.$appDetails['email'].'">
										</td>
									</tr>
									<tr>
										<td>
											<span class="textBold">'.translate(27, LANG, 'Statut').':</span> 
										</td>
										<td>
											<div class="positionRelative">
												<select name="statut">
													'.$statutSelect.'
												</select>
												<div class="statutHelp" id="statutHelp"></div>
												<div class="helpDivStatut displayNone" id="statutHelp_div">
													<span class="textRed textBold">'.translate(28, LANG, 'Ajutor').'</span>
    												<br />
    												<span class="textGreen textBold">Activ</span> - daca doriti sa dati apartamentul in chirie.<br />
    												<span class="textGreen textBold">Inactiv</span> - daca apartamentul a fost deja dat in chirie.<br />
    												<span class="textGreen textBold">Invizibil</span> - daca dintr-un motiv sau altul nu doriti ca apartamentul sa se afiseze in lista<br />
												</div>
												&nbsp;<span class="textBold">'.translate(6, LANG, 'Pret').':</span>&nbsp;<input type="text" name="price" id="price" class="width32" value="'.$appDetails['price'].'">
												<select name="currency">
													<option value="eur">eur</option>
													<option value="usd">usd</option>
													<option value="lei">lei</option>
												</select> 
											</div>
										</td>
										
									</tr>
								</table>
						</div>
						'.translate(37, LANG).' <a href="'.getUrl(array('pagePath'=>'Privacy', 'lang'=>LANG)).'">'.translate(38, LANG, 'aici').'</a>.
						<br />
						<br />
						<div class="displayNone textCenter errorApp" id="error">
							'.translate(39, LANG).'
						</div>
						<div class="textCenter positionRelative"><input type="submit" value="'.$butValue.'">&nbsp;&nbsp;&nbsp;<input type="button" class="textItalic delAppBut" value="'.translate(94, LANG, 'Sterge acest anunt').'" onClick="sure();"></div>
						'.$modifHidden.'
					</form>
				</div>
			</center>
			<script>
				$(".date").datepicker();
			</script>
			
		';
		echo $html.$js;
	}
}
?>