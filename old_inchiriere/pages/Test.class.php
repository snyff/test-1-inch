<?php
class Test extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			require_once 'classes/phpMailer.class.php';
			$mailer = new PHPMailer();
			$mailer->IsSMTP();
			$mailer->Host = 'ssl://smtp.gmail.com';
			$mailer->SMTPAuth = TRUE;
			$mailer->Username = 'www.inchiriere.md@gmail.com';  // Change this to your gmail adress
			$mailer->Password = 'asdfasdf';  // Change this to your gmail password
			$mailer->From = 'www.inchiriere.md@gmail.com';  // This HAVE TO be your gmail adress
			$mailer->FromName = 'www.inchiriere.md'; // This is the from name in the email, you can put anything you like here
			$mailer->ContentType = 'text/html';
			$body = '
				Salut,<br><br>
				A aparut un nou portal pentru cei care cauta gazda sau ofera in chirie apartamente in Chisinau!
				<br>
				Recomandati rudelor, prietenilor, cunoscutilor.
				<br>
				<a href="http://www.inchiriere.md">www.inchiriere.md</a> - simplu, comod, gratuit!
				<br>
				<br>
				Success!
			';
			$mailer->Body = $body;
			$mailer->Subject = 'Nou in Chisinau';
//			for($i=0;$i<10;$i++) {
				$mailer->AddAddress('terramda@gmail.com');
				$mailer->AddCC('contacts@inchiriere.md');
				if(!$mailer->Send()) {
				   echo "Message was not sent<br/ >";
				   echo "Mailer Error: " . $mailer->ErrorInfo;
				} else {
				   echo "Message has been sent";
				}
//			}
		}
}
?>