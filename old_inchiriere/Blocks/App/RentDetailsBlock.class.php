<?php
require_once 'include/data/flat.lib.php';
class RentDetailsBlock extends Block{
	function buildContent() {
		$raion = getRaions();
		
		$appDetails = $this->page->getRentDetails();
		if($appDetails['statut'] == 3 || !$appDetails) {
			$html = '<center>  
						<div class="width500 marginTop50 content-main">
							'.translate(58, LANG, 'Nu a fost gasit').'.
						</div>
					</center>
					';
			echo $html;
			return;
		}
		
		$gads = '<div style="padding:15px; text-align:center; margin:0 auto">'.getGAds().'</div>';
		
		$statut = array();
		$statut[1] = '<span class="colorGreen textBold textItalic">'.translate(14, LANG, 'Activ').'.</span>';
		$statut[2] = '<span class="inactiv textBold textItalic">'.translate(15, LANG, 'Inactiv').'.</span>';
		if($appDetails['statut']==2) {
			$fix = false;
			$mobil = false;
		} else {
			$fix = $appDetails['fix'];
			$mobil = $appDetails['mobil'];
		}
		$html .= '
				<div class="textBold colorBlue textCenter text24px headerStyle">'.translate(61, LANG, 'Detalii Anunt').'</div>
				<table border="0">
					<tr>
						<td>
							
						</td>
						<td>
							<span class="textBold textSize15">'.$appDetails['title'].'</span>
						</td>
					</tr>
					<tr>
						<td valign="top">
							<span class="colorBlue textVerdana textBold text12px">'.translate(60, LANG, 'Anuntul').':</span>
						</td>
						<td>
							'.$appDetails['annonce'].'
						</td>
					</tr>
					<tr>
						<td valign="top">
							<span class="colorBlue textVerdana textBold text12px">'.translate(6, LANG, 'Pret').':</span>
						</td>
						<td>
							'.$appDetails['price'].' '.$appDetails['valuta'].' 
						</td>
					</tr>
					<tr>
						<td valign="top">
							<span class="colorBlue textVerdana textBold text12px">'.translate(21, LANG, 'Telefon').':</span>
						</td>
						<td>
							<table border="0" width="421" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										'.translate(22, LANG, 'Stationar').': '.$fix.'
									</td>
									<td align="right">
										'.translate(23, LANG, 'Mobil').': '.$mobil.'
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<span class="colorBlue textVerdana textBold text12px">'.translate(7, LANG, 'Email').':</span>
						</td>
						<td>
							'.$appDetails['email'].'
						</td>
					</tr>
					<tr>
						<td>
							<span class="colorBlue textVerdana textBold text12px">'.translate(27, LANG, 'Statut').':</span>
						</td>
						<td>
							'.$statut[$appDetails['statut']].'
						</td>
					</tr>
				</table>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = $gads.'<div class="marginTop20">'.$html.'<div>'.$gads;
		echo $html;
	}
}
?>