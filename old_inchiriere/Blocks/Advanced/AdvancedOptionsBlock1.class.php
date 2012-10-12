<?php
require_once 'include/data/flat.lib.php';
class AdvancedOptionsBlock extends Block {
	function buildContent() {
		$action = getStringFromRequest('action');
		switch($action) {
			case 'bug': 
						$type = translate(45, LANG, 'Raporteaza bug').':';
						$content = translate(46, LANG, 'Explicatii').':<br />
									<textarea class="width350 height70 marginTop5" name="content" id="content" onKeydown="reValidate(this);"></textarea>';
						$jsVars = '\'security_code\', \'content\', \'\'';
						break;
			case 'false_number': 
						$type = translate(47, LANG, 'Raporteaza Numar Fals').':'; 
						$content = '<table>
										<tr>
											<td>'.translate(48, LANG, 'Nume').'/'.translate(49, LANG, 'Prenume').':</td>
											<td><input type="text" name="name" id="name" onKeydown="reValidate(this);"></td>
										</tr>
										<tr>
											<td>'.translate(50, LANG, 'Numar').':</td>
											<td><input type="text" name="number" id="number" onKeydown="reValidate(this);"></td>
										</tr>
									</table>';
						$jsVars = '\'security_code\', \'name\', \'number\'';
						break;
			case 'improvement': 
						$type = translate(51, LANG, 'Propune Imbunatatire').':';
						$content = '<textarea class="width350 height70 marginTop5" name="content" id="content" onKeydown="reValidate(this);"></textarea>';
						$jsVars = '\'security_code\', \'content\', \'\'';
						break;
			default: $type = "Wrong Parameter";
		}
		$sendButton = '<td valign="bottom">
							<table>
								<tr>
									<td>
										<input type="text" name="captcha" class="width120" id="security_code" onFocus="switchStatus(1);" onBlur="switchStatus(2);" value="Security Code" onKeydown="reValidate(this);" autocomplete="off">
									</td>
								</tr>
								<tr>
									<td>
										<img src="captcha.jpg?rand='.time().'" id="captcha" class="cursorPointer" onClick="document.getElementById(\'captcha\').src=\'captcha.jpg?dd=\'+new Date().getTime();" alt="Click to refresh">
									</td>
								</tr>
							</table>
					   </td>
					   <td valign="bottom" class="paddingBottom5">
					   		<input type="button" class="but marginLeft5 marginBottom5" value="'.translate(52, LANG, 'Trimite').'" onClick="validate('.$jsVars.')">
					   </td>
					   ';
		$js = '
			<script>
				function removeAdvancedDiv() {
					$("#optionsDiv").remove();
				}
				function switchStatus(status) {
					var value = $("#security_code").val();
					if(status==1) {
						if($.trim(value)=="Security Code") {
							$("#security_code").val("");
						}
					}
					if(status==2) {
						if($.trim(value)=="") {
							$("#security_code").val("Security Code");
						}
					}
				}
				function validate(id1, id2, id3) {
					$val1 = $("#"+id1).val();
					$err = 0;
					if($.trim($val1)=="Security Code") {
						$("#"+id1).addClass("borderRed");
						$err = 1;
					}
					$val2 = $("#"+id2).val();
					if($.trim($val2)=="") {
						$("#"+id2).addClass("borderRed");
						$err = 1;
					}
					if($.trim(id3)!="") {
						$val3 = $("#"+id3).val();
						if($.trim($val3)=="") {
							$("#"+id3).addClass("borderRed");
							$err = 1;
						}
					}
					if($err) {
						return false;
					}
					ajaxRequestSerialize( "'.$action.'", "#content_form" )
				}
				function reValidate(obj) {
					$val = $("#"+obj.id);
					if($val!="") {
						$("#"+obj.id).removeClass("borderRed");
					}
				}
				function ajaxRequestSerialize( action, form_id ) {
					$.ajax({
						url:	"'.getUrl(array('pagePath'=>'AdvancedOptions', 'reste'=>'submit', 'lang'=>LANG)).'?action=" + action + "&" + $(form_id).serialize(),
						beforeSend: function(){
						},
				
						success: function(xml_doc){
							eval("rez="+xml_doc);
							if(rez["status"] == "0") {
								$("#result").html(rez["error"]);
								document.getElementById(\'captcha\').src=\'captcha.jpg?dd=\'+new Date().getTime();
								
							}
							if(rez["status"] == "1") {
								$("#optionsDiv").html(rez["error"]);
							}
						}
					});
				}
			</script>
		';
		$html .= '
			<div class="paddingLeft5 paddingRight5">
				<div class="displayRight"><a href="javascript:void(0);" class="textBold textBlack" onClick="removeAdvancedDiv();">'.translate(53, LANG, 'Inchide').'</a></div>
				<span class="textBold">'.$type.'</span>
				<form action="" method="get" id="content_form">
					<table border=0>
						<tr>
							<td valign="top">
								'.$content.'
							</td>
							'.$sendButton.'
							<td valign="top" id="result" class="textRed textBold">
							</td>
						</tr>
					</table>
				</form>
				'.$js.'
			</div>
		';
		echo $html;
		die;
	}
}
?>