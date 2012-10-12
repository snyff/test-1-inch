<?php
class PhpMail {
	var $senderEmail;
	var $recipientEmail;
	var $Body;
	var $subject;
	var $debug = true;
	function sendMail() {
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8 ' . "\r\n";
		$headers .= 'From: '.$this->senderEmail;
		return true;
		$send = mail($this->recipientEmail, $this->subject, $this->Body, $headers);
		if($this->debug) {
			if(!$send){
				echo 'Failed to send email to '.$to.' - '.$send.'\n';
			} 
		}
		return $send;
	}
}
?>