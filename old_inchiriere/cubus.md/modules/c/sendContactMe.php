<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  07.07.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007  CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
		/* Adauga in lista de contact me o noua persoana */
		if ( $_GET['contactme'] == 1 ) {
		
			$checkIfHeHaveFiles = myF(myQ("
				SELECT *
				FROM  `[x]files`
				WHERE `tempid` = '".$_SESSION['filesupload']."' AND `approved` = '31'
				LIMIT 1
			"));
			
			if ( $checkIfHeHaveFiles['id'] != '' ) {
			
				/* Save to database */
				myQ("
					INSERT INTO `[x]contactme` 
					(
						`name`,
						`email`,
						`phone`,
						`country`,
						`contacttype`,
						`idsessionfiles`,
						`adddate`
					)
					VALUES
					(
						'".$_GET['nume']."',
						'".$_GET['email']."',
						'".$_GET['nr_tel']."',
						'".$_GET['country']."',
						'".$_GET['contacttype']."',
						'".$_SESSION['filesupload']."',
						'".time()."'
					)
				");
				
				
				$selectDataContact = myF(myQ("
					SELECT *
					FROM  `[x]contactme`
					WHERE `idsessionfiles` = '".$_SESSION['filesupload']."'
					LIMIT 1
				"));
					
				
				/* Selectam fisiere din DB */
				$fileSelectAll = myQ("
					SELECT *
					FROM  `[x]files`
					WHERE `tempid` = '".$_SESSION['filesupload']."' AND `approved` = '31'
 				");
				
			
				/* Afisam lista cu documente */
 				$i=0;
				while ($listaFAll = myF($fileSelectAll)) {
					
					/* Datele care sunt introduse in HTML */
					$data_fisiere .= "Traducere: ".$listaFAll["file_name"]." --- 
												 ". _fnc("lang_data", $listaFAll['from_lang'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." in 
												 ". _fnc("lang_data", $listaFAll['to_lang'],   $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." --- 
												 ". _fnc("tip_file_data", $listaFAll['type_file'], $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"])." --- 
												 ". $listaFAll["pretul"]." Euro<br /><br />";

  					$i++;
				}
				
								
				
				/*
					Send the mail out!
				*/
				$mail = new template;
				$mail -> LoadThis(file_get_contents("theme/templates/GLOBALS/mails/new_contact_me.tpl"));
				$mail -> AssignArray(array(
					"nr.traduceri"     => $i,
					"nume.client"      => $selectDataContact['name'],
					"email.client"     => $selectDataContact['email'],
					"nr_tel.client"    => $selectDataContact['phone'],
					"tara.client"      => $selectDataContact['country'],				
					"tip.client"       => ($selectDataContact['contacttype']=='p')?'Private':'Bussines',
					"lista.traduceri"  => $data_fisiere
 				));
				/*
					Split the body and the subject, then
					send the mail
				*/
				$mailContent = explode("\n", $mail->Flush(1), 2);
						
				/* Include the mail class and prepare it for the mailing */
				include_once("system/functions/classes/mail.class.php");
															
				$mail = new SendMail;
				$mail -> From = 			"{$CONF["SITE_NAME"]} <{$CONF["SITE_SYSTEM_EMAIL"]}>";
				$mail -> To =				'sp_andrei@yahoo.com';
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
				

				
				/*
					Send the mail out!
				*/
				$mail = new template;
				$mail -> LoadThis(file_get_contents("theme/templates/GLOBALS/mails/new_contact_me.tpl"));
				$mail -> AssignArray(array(
					"nr.traduceri"     => $i,
					"nume.client"      => $selectDataContact['name'],
					"email.client"     => $selectDataContact['email'],
					"nr_tel.client"    => $selectDataContact['phone'],
					"tara.client"      => $selectDataContact['country'],				
					"tip.client"       => ($selectDataContact['contacttype']=='p')?'Private':'Bussines',
					"lista.traduceri"  => $data_fisiere
 				));
				/*
					Split the body and the subject, then
					send the mail
				*/
				$mailContent = explode("\n", $mail->Flush(1), 2);
						
				/* Include the mail class and prepare it for the mailing */
				include_once("system/functions/classes/mail.class.php");
															
				$mail = new SendMail;
				$mail -> From = 			"{$CONF["SITE_NAME"]} <{$CONF["SITE_SYSTEM_EMAIL"]}>";
				$mail -> To =				'bagrin.sergiu@yahoo.com';
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
				

				
				/*
					Send the mail out!
				*/
				$mail = new template;
				$mail -> LoadThis(file_get_contents("theme/templates/GLOBALS/mails/new_contact_me.tpl"));
				$mail -> AssignArray(array(
					"nr.traduceri"     => $i,
					"nume.client"      => $selectDataContact['name'],
					"email.client"     => $selectDataContact['email'],
					"nr_tel.client"    => $selectDataContact['phone'],
					"tara.client"      => $selectDataContact['country'],				
					"tip.client"       => ($selectDataContact['contacttype']=='p')?'Private':'Bussines',
					"lista.traduceri"  => $data_fisiere
 				));
				/*
					Split the body and the subject, then
					send the mail
				*/
				$mailContent = explode("\n", $mail->Flush(1), 2);
						
				/* Include the mail class and prepare it for the mailing */
				include_once("system/functions/classes/mail.class.php");
															
				$mail = new SendMail;
				$mail -> From = 			"{$CONF["SITE_NAME"]} <{$CONF["SITE_SYSTEM_EMAIL"]}>";
				$mail -> To =				'mihai.stipanov@yahoo.com';
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
				

 				
				/* controlam daca are acest utilizator incarcat fisier sau nu */
				$jj = 1;
		
			} 
			
			if ( $jj == 1 ) { _fnc("reload", 0, "?L=c.confirmContactMe"); }
			else            { _fnc("reload", 0, "?L=c.addFiles"); }
			die;
		}		
	



?>