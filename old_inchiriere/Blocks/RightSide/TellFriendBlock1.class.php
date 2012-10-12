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
		$html .= '
			<div class="adver-content">
				<h2>'.translate(78, LANG, 'Spune unui prieten').'</h2>
				<div class="displayNone textBold accountMenu" id="send_to_friend_rezult"></div>
				<form method="POST" action="" onSubmit="return false;" id="friend_form">
					<input type="text" value="'.translate(79, LANG, 'Numele tau').'" name="my_name" id="my_name" onFocus="switchFriendState(this, \''.translate(79, LANG, 'Numele tau').'\', 1);" onBlur="switchFriendState(this, \''.translate(79, LANG, 'Numele tau').'\', 2);"><br />
					<input type="text" value="'.translate(80, LANG, 'Numele prietenului').'" name="name_friend" id="name_friend" onFocus="switchFriendState(this, \''.translate(80, LANG, 'Numele prietenului').'\', 1);" onBlur="switchFriendState(this, \''.translate(80, LANG, 'Numele prietenului').'\', 2);"><br />
					<input type="text" name="email_friend" id="email_friend" value="email" onFocus="switchFriendState(this, \'email\', 1);" onBlur="switchFriendState(this, \'email\', 2);"><br />
					<input type="button" onClick="checkMailAddress($(\'#email_friend\').val());" value="'.translate(52, LANG, 'Trimite').'"><br />
				</form>
			</div>
		';
		echo $html.$js;
	}
}
?>