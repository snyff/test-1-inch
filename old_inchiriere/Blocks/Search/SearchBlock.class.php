<?php
class SearchBlock extends Block{
	function buildContent() {
		require_once 'include/data/flat.lib.php';
		$raion 		= getRaions();
		$raionQ		= getStringFromRequest('raion');
		$nrRooms 	= getStringFromRequest('nr_rooms');
		$fromPrice 	= getStringFromRequest('from_price');
		$toPrice 	= getStringFromRequest('to_price');
		$valutaQ 	= getStringFromRequest('currency');
		$etaj	 	= getStringFromRequest('nr_etaj');
		
		$raionSelect = '<option value="-" class="textBold">-</option>';
		for($i=1;$i<=count($raion);$i++) {
			if($i==$raionQ) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$raionSelect .= '<option value="'.$i.'" '.$selected.'>'.$raion[$i].'</option>';
		}
		
		$nrEtajSelect = '<option value="-" class="textBold">-</option>';
		for($i=1;$i<=16;$i++) {
			if($i == $etaj) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$nrEtajSelect .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
		}
		
		$nrRoomsSelect = '<option value="-" class="textBold">-</option>';
		for($i=1;$i<=4;$i++) {
			if($i == $nrRooms) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$nrRoomsSelect .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
		}
		
		$valuta = getCurrency();
		$valutaSelect .= '<option value="-">-</option>';
		foreach($valuta as $key => $value) {
			if($key==$valutaQ) {
				$selected = 'selected="selected"';
			} else {
				$selected = false;
			}
			$valutaSelect .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
		}
		$header = '<span class="colorBlue textVerdana textBold text13px">'.translate(81, LANG, 'Filtru Apartament').'</span>';
		$html .= '
			<div class="paddingLeft14 paddingTop14">
				<form method="GET" action="'.getUrl(array('pagePath'=>'HomePage', 'reste'=>'search', 'lang'=>LANG)).'">
					<table>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(3, LANG, 'Regiunea').':</span>
							</td>
							<td>
								<select name="raion" class="inputText width125">
									'.$raionSelect.'
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(4, LANG, 'Nr de odai').':</span>
							</td>
							<td>
								<select name="nr_rooms" class="inputText">
									'.$nrRoomsSelect.'
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span class="colorBlue textVerdana textBold text12px">'.translate(5, LANG, 'Etaj').':</span>
							</td>
							<td>
								<select name="nr_etaj" class="inputText width48"> 
									'.$nrEtajSelect.'
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">
								<span class="colorBlue textVerdana textBold text12px">'.translate(6, LANG, 'Pret').':</span><br />
							</td>
							<td>
								<table border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td>
											<span class="text11px">'.translate(162, LANG).'</span>
										</td>
										<td>
											<span class="text11px">'.translate(163, LANG).'</span>
										</td>
									</tr>
									<tr>
										<td>
											<input type="text" name="from_price" autocomplete=off value="'.$fromPrice.'" class="width32 inputText">
											&nbsp;&nbsp;&nbsp;
										</td>
										<td>
											<input type="text" name="to_price" autocomplete=off value="'.$toPrice.'" class="width32 inputText">
										</td>
									</tr>
								</table>
								<div class="separator"> </div>
								<select name="currency" class="inputText">
									'.$valutaSelect.'
								</select>
							</td>
						</tr>
					</table>
					<div class="textRight">
						'.but(translate(82, LANG, 'Filtreaza')).'
					</div>
				</form>
			</div>
		';
		$gads = '<div style="padding:15px; text-align:center; margin:0 auto">'.getGAds('links').'</div>';
		$html = box($header, $html, 'blueBorder', false, 'defaultHeader');
		echo $html.'
<div class="separator"> </div>
<script type="text/javascript"><!--
google_ad_client = "pub-5949181121748532";
/* 160x90, created 3/17/11 */
google_ad_slot = "4585548894";
google_ad_width = 160;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
';
	}
}
?>