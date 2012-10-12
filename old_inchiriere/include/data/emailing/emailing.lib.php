<?php
function sendRegistrationConfirmation($email, $lang, $confCode) {
	$mail = new PhpMail();
	$mail->recipientEmail = $email;
	$mail->senderEmail = 'administration@inchiriere.md';
	$mail->subject = translate(119, $lang);
	$text = translate(117, $lang);
	$url = '<a href="'.getUrl(array('pagePath'=>'ConfirmationRegistration', 'lang'=>$lang, 'queryString'=>array('code'=>$confCode))).'" style="color:#FFFFFF">'.getUrl(array('pagePath'=>'ConfirmationRegistration', 'lang'=>$lang, 'queryString'=>array('code'=>$confCode))).'</a>';
	$text = str_replace('@conf_link@', $url, $text);
	$mail->Body = '	<table border="0" align="center" style="width:700px;background-color:#6CB1FF">
						<tr>
							<td>
								<table border="0">
									<tr>
										<td>
											<a href="http://www.inchiriere.md"><img border="0" src="http://www.testgazde.netau.net/images/png/logo.jpg"></a>
											<br>
											<center><a style="text-decoration:none;color:#FFFFFF;font-weight:bold;font-family:verdana;font-size:11px" href="http://www.inchiriere.md">www.inchiriere.md</a></center>
										</td>
										<td>
											<span style="color:#FFFFFF;font-family:cursive;font-size:25px;font-weight:bold">
												'.translate(118, $lang).'
											</span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="font-family:verdana;font-size:13px;padding-left:10px">
								'.$text.'
							</td>
						</tr>
					</table>
	';
	$mail->sendMail();
}
function sendSubsMails($appId) {
	$db = new Db();
	@require_once '../../include/data/flat.lib.php';
	$q = "SELECT * FROM list WHERE id='".escape($appId)."'";
	$db->query($q);
	$appDetails = $db->getNextRow();
	$raion = getRaions();
	
	$q = "	SELECT * FROM subs WHERE
			(nr_rooms='".escape($appDetails['nr_rooms'])."' OR nr_rooms=-1)
			AND (raion='".escape($appDetails['raion'])."' OR raion=-1)
			AND (from_price>='".escape($appDetails['from_price'])."' OR from_price=-1)
			AND (to_price<='".escape($appDetails['to_price'])."' OR to_price=-1)
			AND (valuta='".escape($appDetails['valuta'])."' OR valuta=-1)
			AND (etaj='".escape($appDetails['etaj'])."' OR etaj=-1)
			AND receive_status='y'";
	$db->query($q);
	while($row = $db->getNextRow()) {
		$retData[] = $row;
	}
	for($i=0;$i<count($retData);$i++) {
		$lang = $retData[$i]['lang'];
		if(!$lang) {
			$lang = 'rom';
		}
		if($appDetails['agentie']) {
			$annType = translate(178, $lang, 'Agentie', true);
		} else {
			$annType = translate(179, $lang, 'Persoana fizica', true);
		}
		$unsubsUrl = '<a href="'.getUrl(array('pagePath'=>'UnsubscribeEmail', 'lang'=>$lang, 'reste'=>$retData[$i]['unsubs'])).'">'.getUrl(array('pagePath'=>'UnsubscribeEmail', 'lang'=>$lang, 'reste'=>$retData[$i]['unsubs'])).'</a>';
		$unsubsText = str_replace('@unsubsc_link@', $unsubsUrl, translate(115, $lang, false, true));
		$details = '
				<table>
					<tr>
						<td>
							<span style="font-size:12px;font-weight:bold">'.translate(114, $lang, 'O noua oferta de inchiriere a fost postata pe inchiriere.md', true).'</span>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							'.translate(18, $lang, 'Titlu', true).':
						</td>
						<td>
							'.$appDetails['title'].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(60, $lang, 'Anuntul', true).':
						</td>
						<td>
							'.$appDetails['annonce'].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(13, $lang, 'Odai', true).':
						</td>
						<td>
							'.$appDetails['nr_rooms'].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(3, $lang, 'Raion', true).':
						</td>
						<td>
							'.$raion[$appDetails['raion']].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(5, $lang, 'Etaj', true).':
						</td>
						<td>
							'.$appDetails['etaj'].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(6, $lang, 'Pret', true).':
						</td>
						<td>
							'.$appDetails['price'].' '.$appDetails['valuta'].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(21, $lang, 'Telefon', true).' '.translate(22, $lang, 'Stationar', true).':
						</td>
						<td>
							'.$appDetails['fix'].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(21, $lang, 'Telefon', true).' '.translate(23, $lang, 'Stationar', true).':
						</td>
						<td>
							'.$appDetails['mobil'].'
						</td>
					</tr>
					<tr>
						<td>
							'.translate(180, $lang, 'Tip', true).':
						</td>
						<td>
							'.$annType.'
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<i>'.$unsubsText.'</i>
						</td>
					</tr>
				</table>
		';
		$body = '<table border="0" align="center" style="width:700px;background-color:#6CB1FF">
					<tr>
						<td>
							<table border="0">
								<tr>
									<td>
										<a href="http://www.inchiriere.md"><img border="0" src="http://www.testgazde.netau.net/images/png/logo.jpg"></a>
										<br>
										<center><a style="text-decoration:none;color:#FFFFFF;font-weight:bold;font-family:verdana;font-size:11px" href="http://www.inchiriere.md">www.inchiriere.md</a></center>
									</td>
									<td>
										<span style="color:#FFFFFF;font-family:cursive;font-size:25px;font-weight:bold">
											'.translate(118, $lang, false, true).'
										</span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="font-family:verdana;font-size:13px;padding-left:10px">
							'.$details.'
						</td>
					</tr>
				 </table>';
		require_once '../../classes/PhpMail.class.php';
		$mail = new PhpMail();
		$mail->Body = $body;
		$mail->subject = translate(114, $lang, false, true);
		$mail->recipientEmail = $retData[$i]['email'];
		$mail->senderEmail = 'emailing@inchiriere.md';
		$mail->sendMail();
	}
}
function tellFriendMail($email, $myName=false, $friendName=false, $lang='rom') {
	if(!$lang) {
		$lang = 'rom';
	}
	$mail = new PhpMail();
	$mail->recipientEmail = $email;
	$mail->senderEmail = 'info@inchiriere.md';
	if($friendName) {
		$mail->subject = translate(157, $lang, false, true);
		$mail->subject = str_replace('@name@', $friendName, $mail->subject);
	} else {
		$mail->subject = translate(158, $lang, false, true);
	}
	$text = translate(149, $lang, false, true);
	$text = str_replace('@name@', $friendName, $text);
	$text = str_replace('@friend_name@', $myName, $text);
	$mail->Body = '	<table border="0" align="center" style="width:700px;background-color:#6CB1FF">
						<tr>
							<td>
								<table border="0">
									<tr>
										<td>
											<a href="http://www.inchiriere.md"><img border="0" src="http://www.testgazde.netau.net/images/png/logo.jpg"></a>
											<br>
											<center><a style="text-decoration:none;color:#FFFFFF;font-weight:bold;font-family:verdana;font-size:11px" href="http://www.inchiriere.md">www.inchiriere.md</a></center>
										</td>
										<td>
											<span style="color:#FFFFFF;font-family:cursive;font-size:25px;font-weight:bold">
												'.translate(118, $lang, false, true).'
											</span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="font-family:verdana;font-size:13px;padding-left:10px">
								'.$text.'
							</td>
						</tr>
					</table>
	';

	$mail->sendMail();
}
?>