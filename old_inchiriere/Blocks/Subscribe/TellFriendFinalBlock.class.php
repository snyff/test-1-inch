<?php
require_once 'include/data/flat.lib.php';
require_once 'include/data/emailing/emailing.lib.php';
class TellFriendFinalBlock extends Block{
	function buildContent() {
		$email 			= getStringFromRequest('email_friend');
		$myName			= getStringFromRequest('my_name');
		$friendsName 	= getStringFromRequest('name_friend');
		
		if(trim($email) == "") {
			echo "Invalid Email";
			die;
		}
		
		$success = tellFriend($email, $myName, $friendsName);
		if($success) {
			$success1 = tellFriendMail($email, $myName, $friendsName, LANG);
		}
		
		if($success) {
			echo translate(86, LANG, 'Trimis cu success').". <br />".translate(87, LANG, 'Multumim').".";
		} else {
			echo translate(85, LANG, 'Eroare necunoscuta').".";
		}
		die;
	}
}
?>