<?php
class TellFriendBlock extends Block{
	function buildContent() {
		$js = '<script>
					function sendToFriend(theThis) {
						$.ajax({
								url:	"'.getUrl(array('pagePath'=>'ProcessTellFriend', 'lang'=>LANG)).'?"+$("#friend_form").serialize(),
								beforeSend: function(){
									$(theThis).addClass("optionsLoader");
								},
								success: function(xml_doc){
									$("#send_to_friend_rezult").html(xml_doc);
									$("#send_to_friend_rezult").show(500);
									$("#email_friend").val("email");
								}
							});
					}
					function checkMailAddress(mail){
						var emailRegEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
						if(mail.match(emailRegEx)){
							$("#email_friend").removeClass("error");
							sendToFriend();
						}
						else{
							$("#email_friend").addClass("error");
						}
					}
					function switchFriendState(theThis, str, state) {
						switch(state) {
							case 1:
								if($.trim($("#"+theThis.id).val()) == str) {
									$("#"+theThis.id).val("");
								}
								break;
							case 2:
								if($.trim($("#"+theThis.id).val()) == "") {
									$("#"+theThis.id).val(str);
								}
						}
					}
			   </script>
		';
		$header = '<span class="colorBlue textVerdana textBold text13px">'.translate(78, LANG, 'Spune unui prieten').'</span>';
		$params = 'onClick="checkMailAddress($(\'#email_friend\').val());"';
		$html .= '
			<div class="paddingLeft41 paddingTop14">
				<div class="displayNone textBold colorGreen" id="send_to_friend_rezult"></div>
				<form method="POST" action="" onSubmit="return false;" id="friend_form">
					<span class="colorBlue textVerdana textBold text12px">'.translate(79, LANG, 'Numele tau').'</span>
					<br />
					<input type="text" class="inputText" value="" name="my_name" id="my_name" >
					<br />
					<span class="colorBlue textVerdana textBold text12px">'.translate(80, LANG, 'Numele prietenului').'</span>
					<br />
					<input type="text" class="inputText" value="" name="name_friend" id="name_friend">
					<br />
					<span class="colorBlue textVerdana textBold text12px">'.translate(7, LANG, 'Email').'</span>
					<br />
					<input type="text" class="inputText" name="email_friend" id="email_friend" value="">
					<br />
					<div class="textRight">
						'.but(translate(52, LANG, 'Trimite'), 'button', $params).'
					</div>
				</form>
			</div>
		';
		$html = box($header, $html, 'blueBorder', false, 'defaultHeader');
		echo $html.$js;
	}
}
?>