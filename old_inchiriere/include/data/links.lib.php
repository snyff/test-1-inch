<?php
	function storeEmailForLink ($email, $from) {
		$db = new Db();
		$q = "INSERT INTO linkemails(num, email, from_friend) VALUES('', '".escape($email)."', '".escape($from)."')";
		$db->query($q);
	}
	function sendLinkToFriend($email, $from) {
		$mail = new PhpMail();
		$mail->recipientEmail = $email;
		$mail->mailBody = 'This is wonderfull';
		$mail->subject = 'This is best-diets.eu, check it out!!!';
		$mail->sendMail();		
	}
?>