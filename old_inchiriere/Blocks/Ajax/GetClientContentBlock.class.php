<?php
require_once 'include/data/flat.lib.php';
class GetClientContentBlock extends Block{
	function buildContent() {
		$type = getStringFromRequest('type');
		if($type == 'for_rent') {
			$currentAction = translate(11, LANG, 'Adaugare Apartament');
			$butValue = translate(12, LANG, 'Accept si Adauga');
			$uploadPhotos = '<input type="file" name="photos[]"/>';
			
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
			foreach($valuta as $key => $value) {
				if($key==$appDetails['valuta']) {
					$selected = 'selected="selected"';
				} else {
					$selected = false;
				}
				$valutaSelect .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
			}
			
			$js = '
				<script>
					$(document).ready(function(){
						$(".resize").resizehandle();
						$(".detContol").attr("disabled", "disabled");
					});
					function sure() {
						$confirm = confirm("'.translate(95, LANG).'");
						if($confirm) {
							window.location = "'.getUrl(array('pagePath'=>'AddAnnonce', 'reste'=>'del-app', 'lang'=>LANG, 'queryString'=>array('delApp'=>(int)$modif))).'"
						}
					}
					function checkForm() {
						check = false;
						if($("#nr_rooms").val() == "-") {
							$("#nr_rooms").css("border", "1px solid red");
							check = true;
						}
						if($("#ann_type").val() == "-") {
							$("#ann_type").css("border", "1px solid red");
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
						if($.trim($("#fix").val()) == "" && $.trim($("#mobil").val()) == "") {
							$("#fix").css("border", "1px solid red");
							check = true;
						}
						if($.trim($("#email").val()) != "" && $.trim($("#pass").val()) == "") {
							$("#pass").css("border", "1px solid red");
							check = true;
						}
						if($.trim($("#pass").val()) != "" && $.trim($("#email").val()) == "") {
							$("#email").css("border", "1px solid red");
							check = true;
						}
						if($.trim($("#email").val()) != "" && $.trim($("#pass").val()) != "") {
							$("#verify_data").css("top", "-3px");
							$("#verify_data").css("display", "inline");
						}
						if(check) {
							$("#error").css("margin-bottom", "5px");
							$("#error").slideDown(500);						
							return false;
						}
						return true;
					}
					function checkEmail() {
						$.ajax({
							url: "'.getUrl(array('pagePath' => 'AddAnnonce', 'reste' => 'check-data', 'lang' => LANG)).'",
							data: "email="+$("#email").val(),
							type: "post",
							async: false,
							beforeSend: function(){
							},
							success: function(xml_doc){
								if(xml_doc == "ok") {
									checkEmail.val = false;
								} else {
									checkEmail.val = true;
									$("#email_error").show(300);
								}
								$("#verify_data").css("display", "none");
							}
						});
						return checkEmail.val;
					}
					function validateForm() {
						$err = checkForm();
						if(!$err) {
							return false;
						}
						$errEmail = false;
						if($.trim($("#email").val()) != "" && $.trim($("#pass").val()) != "") {
							$errEmail = checkEmail();
							if($errEmail) {
								return false;
							}
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
			$textulAnuntului = str_replace(' ', '<br />', translate(19, LANG, 'Textul Anuntului'));
			$html .= '
					<div class="textBold text19px colorBlue textCenter marginBottom5">'.$currentAction.'</div>
					<form method="post" onSubmit="return validateForm();" action="'.getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG, 'reste' => 'add-app-final')).'" id="add_app" enctype="multipart/form-data">
								<table border="1">
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(18, LANG, 'Titlu').':</span>
										</td>
										<td>
											<input type="text" name="title" id="title" class="width430 inputText" value="'.$appDetails['title'].'">
										</td>
									</tr>
									<tr>
										<td valign="top">
											<span class="colorBlue textVerdana textBold text12px">'.$textulAnuntului.':</span>
										</td>
										<td>
											<textarea class="width430 resize inputText" name="annonce">'.$appDetails['annonce'].'</textarea>
										</td>
									</tr>
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(20, LANG, 'Detalii').':</span><span class="colorRed">*</span>
										</td>
										<td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td>
														<select name="nr_rooms" id="nr_rooms">
															'.$nrRoomsSelect.'
														</select>
													</td>
													<td>
														<select name="etaj" id="etaj">
															'.$nrEtajSelect.'
														</select>
													</td>
													<td>
														<select name="raion" id="raion">
															'.$raionSelect.'
														</select>
													</td>
													<td align="right">
														<span class="colorBlue textVerdana textBold text12px">'.translate(6, LANG, 'Pret').':</span> 
														<input type="text" name="price" id="price" class="width40 inputText" value="'.$appDetails['price'].'"> 
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
											<span class="colorBlue textVerdana textBold text12px">'.translate(21, LANG, 'Telefon').':</span>
											<span class="colorRed">*</span>
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
										<td align="left">
											<span class="colorBlue textVerdana textBold text12px">'.translate(180, LANG, 'Tip').':</span>
										</td>
										<td>
											<select name="ann_type" id="ann_type" class="inputText">
												<option value="-">-</option>
												<option value="1">'.translate(179, LANG, 'Persoana fizica').'</option>
												<option value="2">'.translate(178, LANG, 'Agentie').'</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(7, LANG, 'Email').':</span>
										</td>
										<td>
											<input type="text" name="email" id="email" class="width142 inputText" value="'.$appDetails['email'].'">
										</td>
									</tr>
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(75, LANG, 'Parola').':</span>
										</td>
										<td>
											<div class="positionRelative">
												<input type="text" name="pass" id="pass" class="inputText" value="" style="position:absolute; _left: -112px!important;_top: 53px;">
												<br />
												<div id="email_error" class="positionAbsolute colorRed text11px textItalic displayNone" style="_left:-220px">'.translate(183, LANG, 'Acest email este deja inregitrat, daca va apartine atunci logati-va, in caz contrar specificati alt email').'</div><br /><br />
											</div>
										</td>
									</tr>
								</table>
						<div>
							<fieldset class="borderBlue1px marginRight10">
								<legend><span class="textVerdana textBold text12px">'.translate(31, LANG, 'Date suplimentare').' ('.translate(29, LANG, 'optional').')</span></legend>
								<table border="0" align="left">
									<tr>
										<td align="left">
											<input type="checkbox" name="televizor">&nbsp;<span class="textVerdana text12px">'.mb_convert_case(translate(33, LANG, 'Televizor'), MB_CASE_LOWER, "UTF-8").'</span><br />
											<input type="checkbox" name="frigider">&nbsp;<span class="textVerdana text12px">'.mb_convert_case(translate(34, LANG, 'Frigider'), MB_CASE_LOWER, "UTF-8").'</span><br />
											<input type="checkbox" name="mobila">&nbsp;<span class="textVerdana text12px">'.mb_convert_case(translate(35, LANG, 'Mobila'), MB_CASE_LOWER, "UTF-8").'</span><br />
											<input type="checkbox" name="masina_spalat">&nbsp;<span class="textVerdana text12px">'.mb_convert_case(translate(36, LANG, 'Masina de spalat'), MB_CASE_LOWER, "UTF-8").'</span><br />
										</td>
									</tr>
								</table>
							</fieldset>
						</div>
						'.translate(37, LANG).' <a href="'.getUrl(array('pagePath'=>'Privacy', 'lang'=>LANG)).'" class="textBold">'.translate(38, LANG, 'aici').'</a>.
						<br />
						<br />
						<div class="displayNone textCenter errorApp" id="error">
							'.translate(39, LANG).'
						</div>
						<div class="textCenter positionRelative">
							'.but($butValue).'<div class="clientType" id="verify_data"></div>&nbsp;&nbsp;&nbsp;
						</div>
						'.$modifHidden.'
						<input type="hidden" name="annonce_type" value="for_rent">
					</form>
				<script>
//					$(".date").datepicker();
				</script>
			';
			$html = annonce($html, false, false, false, 'H');
			echo $refusedHtml.$html.$js;
			die();
		}
		
		
//====================================================================================================================================
//====================================================================================================================================
//====================================================================================================================================
//====================================================================================================================================
//============================================		INCHIRIEZ

		
		if($type == 'rent') {
			$currentAction = translate(93, LANG, 'Adaugare Anunt');
			$butValue = translate(12, LANG, 'Accept and Adauga');
			
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
			
			$modifHidden = '<input type="hidden" name="modif" value="'.$modif.'">';
			$js = '
				<script>
					$(document).ready(function(){
						$(".resize").resizehandle();
						$(".detContol").attr("disabled", "disabled");
					});
					function sure() {
						$confirm = confirm("'.translate(95, LANG).'");
						if($confirm) {
							window.location = "'.getUrl(array('pagePath'=>'AddAnnonce', 'reste'=>'del-rent', 'lang'=>LANG, 'queryString'=>array('delRent'=>(int)$modif))).'"
						}
					}
					function checkForm() {
						check = false;
						if($.trim($("#fix").val()) == "" && $.trim($("#mobil").val()) == "") {
							$("#fix").css("border", "1px solid red");
							check = true;
						}
						if($.trim($("#email").val()) != "" && $.trim($("#pass").val()) == "") {
							$("#pass").css("border", "1px solid red");
							check = true;
						}
						if($.trim($("#pass").val()) != "" && $.trim($("#email").val()) == "") {
							$("#email").css("border", "1px solid red");
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
			$html .= '
					<div class="textBold text19px colorBlue textCenter marginBottom5">'.$currentAction.'</div>
					<form method="post" action="'.getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG, 'reste' => 'add-app-final')).'" id="add_app" onSubmit="return checkForm();">
								'.$added.'
								<table border="0">
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(18, LANG, 'Titlu').':</span>
										</td>
										<td>
											<input type="text" name="title" id="title" class="width430 inputText" value="'.$appDetails['title'].'">
										</td>
									</tr>
									<tr>
										<td valign="top">
											<span class="colorBlue textVerdana textBold text12px">'.translate(19, LANG, 'Textul anuntului').':</span>
										</td>
										<td>
											<textarea class="width430 resize inputText" name="annonce">'.$appDetails['annonce'].'</textarea>
										</td>
									</tr>
									<tr>
										<td valign="top">
											<span class="colorBlue textVerdana textBold text12px">'.translate(21, LANG, 'Telefon').':</span><span class="colorRed">*</span>
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
										<td align="left">
											<input type="text" name="email" class="inputText">
										</td>
									</tr>
									<tr>
										<td>
											<span class="colorBlue textVerdana textBold text12px">'.translate(6, LANG, 'Pret').':</span> 
										</td>
										<td align="left">
												<input type="text" name="price" id="price" class="width32 inputText" value="'.$appDetails['price'].'">
												<select name="valuta">
													<option value="eur">eur</option>
													<option value="usd">usd</option>
													<option value="lei">lei</option>
												</select> 
										</td>
									</tr>
								</table>
						'.translate(37, LANG).' <a href="'.getUrl(array('pagePath'=>'Privacy', 'lang'=>LANG)).'" class="textBold">'.translate(38, LANG, 'aici').'</a>.
						<br />
						<br />
						<div class="displayNone textCenter errorApp" id="error">
							'.translate(39, LANG).'
						</div>
						<div class="textCenter positionRelative">
							'.but($butValue).'&nbsp;&nbsp;&nbsp;
							<!--'.but(translate(94, LANG, 'Sterge acest anunt'), 'button', 'onClick="sure();"').'&nbsp;&nbsp;&nbsp;-->
						</div>
						'.$modifHidden.'
						<input type="hidden" name="annonce_type" value="rent">
					</form>
			<script>
//				$(".date").datepicker();
			</script>
			';
			$html = annonce($html, false, false, false, 'H');
			echo $html.$js;
			die();
		}
	}
}
?>