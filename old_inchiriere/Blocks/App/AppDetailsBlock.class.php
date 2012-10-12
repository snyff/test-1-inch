<?php
require_once 'include/data/flat.lib.php';
require_once 'include/data/stats/flatStats.lib.php';

class AppDetailsBlock extends Block{
	function buildContent() {
		$raion = getRaions();
		
		$js = '
				<script>
					$(document).ready(function(){
						$(".tooltip").simpletooltip();
					})
 				</script>
		';
		$gads = '<div style="padding:15px; text-align:center; margin:0 auto">'.getGAds().'</div>';
		$promoAds = getPromoAds();
		$appDetails = $this->page->getAppDetails();
		if($appDetails['statut'] == 3 || !$appDetails || $appDetails['accept_status'] == 'r' || $appDetails['accept_status'] == 'w') {
			$html .= $gads.'<center>  
						<div class="width500 marginTop50">
							'.translate(58, LANG, 'Nu a fost gasit').'.
						</div>
					</center>
					';
			echo $html;
			return;
		}
		$idFlat = getStringFromRequest('id');
		setAppStats($idFlat);		
		$allPhotos = getPhotos($idFlat, 'a');
		$test = '<div id="text"></div>';
		if(count($allPhotos)) {
			$photos = '<table><tr>';
			for($i=0;$i<count($allPhotos);$i++) {
				$photos .= '<td><img class="tooltip" src="'.getPhotoPath($allPhotos[$i]['id'], $allPhotos[$i]['ext'], 'min').'" class="cursorPointer" height=70></td>';
//				$hidImgs .= '<img src="'.getPhotoPath($allPhotos[$i]['id'], $allPhotos[$i]['ext']).'"/>';
			}
			$photos .= '</tr></table>';
			$photos = '<div>
							<fieldset class="borderBlue1px marginRight10">
								<legend><span class="textBold">'.translate(30, LANG, 'Fotografii').'</span></legend>
								'.$photos.'
							</fieldset>
						</div>';
		}
		$options = false;
		if($appDetails['televizor']) {
			$options .= translate(33, LANG);
		}
		if($appDetails['mobila']) {
			if($options) {
				$options .= ', ';
			}
			$options .= translate(35, LANG);
		}
		if($appDetails['frigider']) {
			if($options) {
				$options .= ', ';
			}
			$options .= translate(34, LANG);
		}
		if($appDetails['masina_spalat']) {
			if($options) {
				$options .= ', ';
			}
			$options .= translate(36, LANG);
		}
		if($options) {
			$details = '
				<div>
					<fieldset class="borderBlue1px marginRight10">
						<legend><span class="textBold">'.translate(31, LANG, 'Date suplimentare').'</span></legend>
							<table border="0">
								<tr>
									<td>
										'.$options.'
									</td>
								</tr>
							</table>
					</fieldset>
				</div>
			';
		}
		$statut = array();
		$statut[1] = '<span class="colorGreen textBold textItalic">'.translate(14, LANG, 'Activ').'</span>';
		$statut[2] = '<span class="inactiv textBold textItalic">'.translate(15, LANG, 'Inactiv').'</span>';
		if($appDetails['statut']==2) {
			$fix = false;
			$mobil = false;
		} else {
			$fix = $appDetails['fix'];
			$mobil = $appDetails['mobil'];
		}
		$html .= '
				<div class="textBold colorBlue textCenter text24px headerStyle">'.translate(59, LANG, 'Detalii Apartament').'</div>
				<table border="0">
					<tr>
						<td>
							
						</td>
						<td>
							<span class="textBold textSize15">'.stripslashes($appDetails['title']).'</span>
						</td>
					</tr>
					<tr>
						<td valign="top">
							<span class="colorBlue textVerdana textBold text12px">'.translate(60, LANG, 'Anuntul').':</span>
						</td>
						<td>
							'.stripslashes($appDetails['annonce']).'
						</td>
					</tr>
					<tr>
						<td valign="top">
							<span class="colorBlue textVerdana textBold text12px">'.translate(20, LANG, 'Detalii').':</span>
						</td>
						<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td>
										'.translate(13, LANG, 'Odai').': '.$appDetails['nr_rooms'].'
									</td>
								</tr>
								<tr>
									<td>
										'.translate(5, LANG, 'Etaj').': '.$appDetails['etaj'].'
									</td>
								</tr>
								<tr>
									<td>
										'.translate(3, LANG, 'Raion').': '.$raion[$appDetails['raion']].'
									</td>
								</tr>
								<tr>
									<td>
										'.translate(6, LANG, 'Pret').': '.$appDetails['price'].' '.$appDetails['valuta'].' 
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td valign="top">
							<span class="colorBlue textVerdana textBold text12px">'.translate(21, LANG, 'Telefon').':</span>
						</td>
						<td>
							<table border="0" width="386" cellpadding="0" cellspacing="0">
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
				<div style="display:none;" id="hid">
					'.$hidImgs.'
				</div>
				'.$details.'
				'.$photos.'
		';
		$html = annonce($html, false, false, false, 'H');
		$html = '<div class="marginTop20 positionRelative">'.$html.'<div>';
		
		
		echo $gads.$html.$js.$promoAds;
	}
}
?>