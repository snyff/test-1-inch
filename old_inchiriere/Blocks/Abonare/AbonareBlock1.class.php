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
		$html .= '
			<div class="nav-left positionRelative">
				<form method="post" id="subs_form" action="'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'reste' => 'subscribe')).'" onSubmit="validateEmail();return false;">
					<h2 class="displayLeft">'.translate(2, LANG, Aboneazate).'</h2>
					<div class="help displayRight" id="help_subscription"></div>
					<div id="help_subscription_div" class="helpDivSubs displayNone">'.translate(97, LANG).'</div>
					<br clear="all"/>
					<div id="success" class="displayNone textBold accountMenu textCenter"></div>
					<table>
						<tr>
							<td>
								<span class="textBold">'.translate(3, LANG, 'Regiunea').':</span>
							</td>
							<td>
								<select name="raion">
									'.$raionSelect.'
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="textBold">'.translate(4, LANG, 'Nr de odai').':</span>
							</td>
							<td>
								<select name="nr_rooms">
									<option value="-">-</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">3</option>
								</select>
								 '.translate(5, LANG, 'Etaj').': <select name="etaj">
								 			'.$nrEtajSelect.'
								 		</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="textBold">'.translate(6, LANG, 'Pret').':</span>
							</td>
							<td>
								<input type="text" name="from_price" class="width32">
								<input type="text" name="to_price" class="width32">
								<select name="currency">
									<option value="eur">eur</option>
									<option value="usd">usd</option>
									<option value="lei">lei</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="textBold">'.translate(123, LANG, 'Limba').':</span>
							</td>
							<td>
								<select name="subs_lang">
									<option value="rom" selected="selected">rom</option>
									<option value="rus">rus</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="textBold">'.translate(7, LANG, 'Email').':</span>
							</td>
							<td>
								<input type="text" name="email" class="width124" id="email_subs">
							</td>
						</tr>
					</table>
					<input type="submit" value="'.translate(8, LANG, 'Aboneaza-ma').'" class="but">
				</form>
			</div>
		';
		echo $html.$js;
	}
}
?>