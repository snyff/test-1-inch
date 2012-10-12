<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  12.01.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function sendMail($templateName, $data_to_mail_array, $email ) {	
 		global $CONF;
		
		/* Send the mail out! */
		$mail = new template;
		$mail -> LoadThis(file_get_contents("theme/templates/GLOBALS/mails/".$templateName));

		if (is_array($data_to_mail_array)) $mail -> AssignArray($data_to_mail_array); 
		
		/* Split the body and the subject, then send the mail */
		$mailContent = explode("\n", $mail->Flush(1), 2); 
 
		/* Include the mail class and prepare it for the mailing */
		include_once("system/functions/classes/mail.class.php");
													
		$mail = new SendMail;
		$mail -> From = 			"{$CONF["SITE_NAME"]} <{$CONF["SITE_SYSTEM_EMAIL"]}>";
		$mail -> To =				$email;
		$mail -> Subject = 			$mailContent[0];
		$mail -> Body = 			$mailContent[1];
		$mail -> SMTPHost = 		$CONF["MAIL_SMTP_HOST"];
		$mail -> SMTPPort = 		$CONF["MAIL_SMTP_PORT"];
		$mail -> SMTPUser = 		$CONF["MAIL_SMTP_USER"];
		$mail -> SMTPPassword = 	$CONF["MAIL_SMTP_PASSWORD"];
		$mail -> SMTPTimeout = 		$CONF["MAIL_SMTP_TIMEOUT"];
		$mail -> MailMethod = 		$CONF["MAIL_METHOD"];
		$mail -> Charset = 			$CONF["MAIL_CHARSET"];
		$mail -> Encoding = 		$CONF["MAIL_ENCODING"];
		$mail -> SendmailPath = 	$CONF["MAIL_SENDMAIL_PATH"];
		$mail -> Send();
	}
	
?>