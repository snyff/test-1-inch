<?php
require_once 'include/data/flat.lib.php';
class AddAppBlock extends Block{
	function buildContent() {
		$modif = getStringFromRequest('numApp');
		$delBut = false;
		if(isset($modif) && is_numeric($modif)) {
			$userid = getSessionVar('userid');
			$delBut = but(translate(94, LANG, 'Sterge acest anunt'), 'button', 'onClick="sure();"').'&nbsp;&nbsp;&nbsp';
			if(!isUsersFlat($userid, $modif)) {
				echo 'Error.<script>
							window.location = "'.getUrl(array('pagePath'=>'Account', 'lang'=>LANG)).'";
					  </script>';
				die;
			}
			$appDetails = getFlat($userid, false, $modif);
			$butValue = translate(9, LANG, 'Accept si Modifica');
			$currentAction = translate(10, LANG, 'Modificare Apartament');
			setSessionVar('nrApp', $modif);
			if($appDetails['agentie']) {
				$isAgentie = 'selected="selected"';
			}
			if(!$appDetails['agentie']) {
				$isPersoanaFizica = 'selected="selected"';
			}
			$tipSelect .= '<option value="-">-</option>';
			$tipSelect .= '<option value="1" '.$isPersoanaFizica.'>'.translate(179, LANG, 'Persoana fizica').'</option>';
			$tipSelect .= '<option value="2" '.$isAgentie.'>'.translate(178, LANG, 'Agentie').'</option>';
			$uploadPhotos = '<iframe  id="photo_iframe"  frameborder="0"  vspace="0"  hspace="0" width=100% height=185 marginwidth="0"  marginheight="0"   scrolling="no"  src="'.getUrl(array('pagePath'=>'IframePhotoUploader', 'lang'=>LANG)).'">
							 </iframe>';
		} else {
			$currentAction = translate(11, LANG, 'Adaugare Apartament');
			$butValue = translate(12, LANG, 'Accept si Adauga');
			$uploadPhotos = '<input type="file" name="photos[]"/>';
			$tipSelect .= '<option value="-">-</option>';
			$tipSelect .= '<option value="1">'.translate(179, LANG, 'Persoana fizica').'</option>';
			$tipSelect .= '<option value="2">'.translate(178, LANG, 'Agentie').'</option>';
		}
		
		if($appDetails['accept_status'] == 'r') {
			$reason = getRefuseAppReason($modif);
			$refusedHtml = '<center>  
								<div class="content-main">
									<div class="refused">'.translate(108, LANG, 'Anuntul Dvs a fost nu a trecut validarea').'</div>
									<br />
									"'.$reason.'"
								</div>
							</center>
							<div class="separator"> </div>
			';
		}
		
		$nrRoomsSelect = '<option value="-" class="textBold">'.translate(13, LANG, 'Odai').'</option>';
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
		$statut[3] = translate(16, LANG, 'Invizibil');;
		
		for($i=1;$i<=count($statut);$i++) {
			if($i==$appDetails['statut']) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$statutSelect .= '<option value="'.$i.'" '.$selected.'>'.$statut[$i].'</option>';
		}
		
		$raion = getRaions();
		
		$raionSelect = '<option value="-" class="textBold">'.translate(3, LANG, 'Regiunea').'</option>';
		for($i=1;$i<=count($raion);$i++) {
			if($i==$appDetails['raion']) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$raionSelect .= '<option value="'.$i.'" '.$selected.'>'.$raion[$i].'</option>';
		}
		
		$valuta = array();
		$valuta['eur'] = 'eur';
		$valuta['usd'] = 'usd';
		$valuta['lei'] = 'lei';
		
		$options = array();
		$options[0] = false;
		$options[1] = ' checked="checked"';
		foreach($valuta as $key => $value) {
			if($key==$appDetails['valuta']) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$valutaSelect .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
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
						window.location = "'.getUrl(array('pagePath'=>'Account', 'reste'=>'del-app', 'lang'=>LANG, 'queryString'=>array('delApp'=>(int)$modif))).'"
					}
				}
				function checkForm() {
					check = false;
					if($("#nr_rooms").val() == "-") {
						$("#nr_rooms").css("border", "1px solid red");
						check = true;
					}
					if($("#etaj").val() == "-") {
						$("#etaj").css("border", "1px solid red");
						check = true;
					}
					if($.trim($("#price").val()) == "") {
						$("#price").css("border", "1px solid red");
						check = true;
					}
					if($("#raion").val() == "-") {
						$("#raion").css("border", "1px solid red");
						check = true;
					}
					if($("#tip").val() == "-") {
						$("#tip").css("border", "1px solid red");
						check = true;
					}
					if($.trim($("#fix").val()) == "" && $.trim($("#mobil").val()) == "") {
						$("#fix").css("border", "1px solid red");
						check = true;
					}
					if(check) {
						$("#error").css("margin-bottom", "5px");
						$("#error").slideDown(500);						
						return false;
					}
					return true;
				}
				function detailsControl(checkbox) {
					if(checkbox.checked) {
						$(".detContol").removeAttr("disabled");
					} else {
						$(".detContol").attr("disabled", "disabled");
					}
				}
				$(".detContol").attr("disabled", "disabled");
			</script>
		';
		if($modif) {
			$added = '<center><span class="textBold">'.translate(17, LANG, 'Adaugat').':</span> <span class="textBold colorRed">'.$appDetails['added'].'</span></center>';
		}
		$html .= '
					<form method="post" action="'.getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste' => 'add-app-final')).'" id="add_app" onSubmit="return checkForm();" enctype="multipart/form-data">
								'.$added.'
								<table border="0">
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(18, LANG, 'Titlu').':</span>
										</td>
										<td>
											<input type="text" name="title" id="title" class="width430 inputText" value="'.stripslashes($appDetails['title']).'">
										</td>
									</tr>
									<tr>
										<td valign="top">
											<span class="colorBlue textVerdana textBold text12px">'.translate(19, LANG, 'Textul Anuntului').':</span>
										</td>
										<td>
											<textarea class="width430 resize inputText" name="annonce">'.stripslashes($appDetails['annonce']).'</textarea>
										</td>
									</tr>
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(20, LANG, 'Detalii').':</span><span class="colorRed textBold">*</span>
										</td>
										<td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td>
														<select name="nr_rooms" id="nr_rooms" class="inputText">
															'.$nrRoomsSelect.'
														</select>
													</td>
													<td>
														<select name="etaj" id="etaj" class="inputText">
															'.$nrEtajSelect.'
														</select>
													</td>
													<td>
														<select name="raion" id="raion" class="inputText">
															'.$raionSelect.'
														</select>
													</td>
													<td align="right">
														'.translate(6, LANG, 'Pret').': <input type="text" name="price" id="price" class="width40 inputText" value="'.$appDetails['price'].'"> 
														<select name="valuta">
															'.$valutaSelect.'
														</select>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td valign="top">
											<span class="colorBlue textVerdana textBold text12px">'.translate(21, LANG, 'Telefon').':</span><span class="colorRed textBold">*</span>
										</td>
										<td>
											<table border="0" width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td>
														'.translate(22, LANG, 'Stationar').': <input type="text" name="fix" id="fix" class="inputText" value="'.$appDetails['fix'].'">
													</td>
													<td align="right">
														'.translate(23, LANG, 'Mobil').': <input type="text" name="mobil" id="mobil" class="inputText" value="'.$appDetails['mobil'].'">
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(7, LANG, 'Email').':</span>
										</td>
										<td>
											<input type="text" name="email" id="email" class="width430 inputText" value="'.$appDetails['email'].'">
										</td>
									</tr>
<!--									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(24, LANG, 'Optiuni adaugatoare').':</span>
										</td>
										<td>
											<table border="0" width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td>
														'.translate(25, LANG, 'Incepere').': <input type="text" name="from" id="from" class="date inputText" value="'.substr($appDetails['from_date'], 0, 11).'">
													</td>
													<td align="right">
														<div class="positionRelative">
															&nbsp;&nbsp;'.translate(26, LANG, 'Finisare').': <input type="text" name="to" id="to" class="date width130px inputText" value="'.substr($appDetails['to_date'], 0, 11).'">
															<div class="optionsHelp" id="optionsHelp"></div>
															<div class="helpDivOptions displayNone" id="optionsHelp_div">
																<span class="colorRed textBold">'.translate(28, LANG, 'Ajutor').'</span>
			    												<br />
			    												<span class="colorGreen textBold">'.translate(14, LANG, 'Activ').'</span> - '.translate(100, LANG, 'daca doriti sa dati apartamentul in chirie').'.<br />
			    												<span class="colorGreen textBold">'.translate(15, LANG, 'Inactiv').'</span> - '.translate(101, LANG, 'daca apartamentul a fost deja dat in chirie').'.<br />
			    												<span class="colorGreen textBold">'.translate(16, LANG, 'Invizibil').'</span> - '.translate(102, LANG, 'daca dintr-un motiv sau altul nu doriti ca apartamentul sa se afiseze in lista').'
			    												<br />
															</div>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>		-->
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(27, LANG, 'Statut').':</span> 
										</td>
										<td>
											<div class="positionRelative">
												<select name="statut" class="inputText">
													'.$statutSelect.'
												</select>
												<div class="statutHelp" id="statutHelp"></div>
												<div class="helpDivStatut displayNone" id="statutHelp_div">
													<span class="colorRed textBold">'.translate(28, LANG, 'Ajutor').'</span>
    												<br />
    												<span class="colorGreen textBold">'.translate(14, LANG, 'Activ').'</span> - '.translate(100, LANG, 'daca doriti sa dati apartamentul in chirie').'.<br />
    												<span class="colorGreen textBold">'.translate(15, LANG, 'Inactiv').'</span> - '.translate(101, LANG, 'daca apartamentul a fost deja dat in chirie').'.<br />
    												<span class="colorGreen textBold">'.translate(16, LANG, 'Invizibil').'</span> - '.translate(102, LANG, 'daca dintr-un motiv sau altul nu doriti ca apartamentul sa se afiseze in lista').'
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(180, LANG, 'Tip').':</span> 
										</td>
										<td>
											<div class="positionRelative">
												<select name="ann_type" id="tip" class="inputText">
													'.$tipSelect.'
												</select>
											</div>
										</td>
									</tr>
								</table>
						<div>
							<fieldset class="borderBlue1px marginRight10">
								<legend class="textBold">'.translate(30, LANG, 'Fotografii').' ('.translate(29, LANG, 'optional').')</legend>
								'.$uploadPhotos.'
							</fieldset>
						</div>
						<div>
							<fieldset class="borderBlue1px marginRight10">
								<legend><span class="textBold">'.translate(31, LANG, 'Date suplimentare').' ('.translate(29, LANG, 'optional').')</span></legend>
								<table border="0" align="left">
									<tr>
										<td align="left">
											<input type="checkbox" name="televizor" '.$options[$appDetails['televizor']].'>&nbsp;<span class="textVerdana text12px" >'.mb_convert_case(translate(33, LANG, 'Televizor'), MB_CASE_LOWER, "UTF-8").'</span><br />
											<input type="checkbox" name="frigider" '.$options[$appDetails['mobila']].'>&nbsp;<span class="textVerdana text12px" >'.mb_convert_case(translate(34, LANG, 'Frigider'), MB_CASE_LOWER, "UTF-8").'</span><br />
											<input type="checkbox" name="mobila" '.$options[$appDetails['frigider']].'>&nbsp;<span class="textVerdana text12px" '.$options[$appDetails['frigider']].'>'.mb_convert_case(translate(35, LANG, 'Mobila'), MB_CASE_LOWER, "UTF-8").'</span><br />
											<input type="checkbox" name="masina_spalat" '.$options[$appDetails['masina_spalat']].'>&nbsp;<span class="textVerdana text12px" >'.mb_convert_case(translate(36, LANG, 'Masina de spalat'), MB_CASE_LOWER, "UTF-8").'</span><br />
										</td>
									</tr>
								</table>
							</fieldset>
						</div>
						<center>
							'.translate(37, LANG).' <a href="'.getUrl(array('pagePath'=>'Privacy', 'lang'=>LANG)).'" class="textBold">'.translate(38, LANG, 'aici').'</a>.
						</center>
						<br />
						<br />
						<div class="displayNone textCenter errorApp" id="error">
							'.translate(39, LANG).'
						</div>
						<div class="textCenter positionRelative">
							'.but($butValue).'&nbsp;&nbsp;&nbsp;
							'.$delBut.'
						</div>
						'.$modifHidden.'
					</form>
			<script>
//				$(".date").datepicker();
			</script>
		';
		$html = annonce($refusedHtml.$html, false, false, false, 'H');
		$html .= '<div class="separator"></div>';
		$html = '<div class="textBold text21px colorBlue textCenter marginBottom5 headerStyle">'.$currentAction.'</div>'.$html;
		echo $html.$js;
	}
}
?>