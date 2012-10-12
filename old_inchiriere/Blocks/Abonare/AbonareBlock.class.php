<?php
class AbonareBlock extends Block{
	function buildContent() {
		require_once 'include/data/flat.lib.php';
		$raion = getRaions();
		$raionSelect = '<option value="-" class="textBold">-</option>';
		for($i=1;$i<=count($raion);$i++) {
			if($i==$raionQ) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$raionSelect .= '<option value="'.$i.'" '.$selected.'>'.$raion[$i].'</option>';
		}
		$nrEtajSelect = false;
		$nrEtajSelect .= '<option value="-">-</option>';
		for($i=1;$i<=16;$i++) {
			$nrEtajSelect .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$js = '<script>
				function checkMailAddressSubs(mail){
					var emailRegEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if(mail.match(emailRegEx)){
						return true;
					} else {
						return false;
					}
				}
				function validateEmail() {
					if(checkMailAddressSubs($("#email_subs").val())) {
						$.ajax({
					 				url: "'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'reste' => 'subscribe')).'",
					 				data: $("#subs_form").serialize(),
					 				type: "post",
					 				beforeSend: function(){
					 					//$("#loader").show();
									},
					 				success: function(xml_doc){
					 					//xml_doc = clearJson(xml_doc);
					 					$("#success").html(xml_doc);
					 					$("#email_subs").removeClass("error");
					 					$("#email_subs").val("");
					 					$("#success").show(300);
									}
								});
					} else {
						$("#email_subs").addClass("error");
					}
				}
				</script>
			';
		$header = '<span class="colorRed textVerdana textBold text13px">'.translate(2, LANG, 'Aboneazate').'</span>';
		$html .= '
			<div class="positionRelative">
				<form method="post" id="subs_form" action="'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'reste' => 'subscribe')).'" onSubmit="validateEmail();return false;">
					<div class="help displayRight" id="help_subscription"></div>
					<div id="help_subscription_div" class="helpDivSubs displayNone">'.translate(97, LANG).'</div>
					<div id="success" class="displayNone textBold colorGreen textCenter"></div>
					<table>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(3, LANG, 'Regiunea').':</span>
							</td>
							<td>
								<select name="raion" class="inputText">
									'.$raionSelect.'
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(4, LANG, 'Nr de odai').':</span>
							</td>
							<td>
								<select name="nr_rooms" class="inputText">
									<option value="-">-</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
								 <span class="colorBlue textVerdana textBold text12px">'.translate(5, LANG, 'Etaj').':</span> 
								 		<select name="etaj" class="inputText">
								 			'.$nrEtajSelect.'
								 		</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(6, LANG, 'Pret').':</span>
							</td>
							<td>
								<input type="text" name="from_price" class="width32 inputText">
								<input type="text" name="to_price" class="width32 inputText">
								<select name="currency" class="inputText">
									<option value="eur">eur</option>
									<option value="usd">usd</option>
									<option value="lei">lei</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(123, LANG, 'Limba').':</span>
							</td>
							<td>
								<select name="subs_lang" class="inputText">
									<option value="rom" selected="selected">rom</option>
									<option value="rus">rus</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(7, LANG, 'Email').':</span>
							</td>
							<td>
								<input type="text" name="email" class="width124 inputText" id="email_subs">
							</td>
						</tr>
					</table>
					<div class="textRight">
						'.but(translate(8, LANG, 'Aboneaza-ma')).'
					</div>
				</form>
			</div>
		';
		$html = box($header, $html, 'blueBorder', false, 'defaultHeader');
		$html = '<a name="abonare">'.$html;
		echo $html.$js;
	}
}
?>