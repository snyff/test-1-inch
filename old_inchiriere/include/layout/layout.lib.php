<?php
	function box($header, $text, $borderClass='blueBorder', $contentClass, $headerClass='defaultHeader') {
		$html = '
			<div class="'.$borderClass.'">
				<div class="'.$headerClass.'">
					'.$header.'
				</div>
				'.$text.'
			</div>
		';
		return $html;
	}
	function but($text, $type='submit', $params=false) {
		$html = '
			<button type="'.$type.'" class="but" '.$params.'>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td class="butLeft">
							&nbsp;
						</td>
						<td class="butMiddle">
							'.$text.'
						</td>
						<td class="butRight">
							&nbsp;
						</td>
					</tr>
				</table>
			</button>
		';
		return $html;
	}
	function annonce($content, $params, $id, $cursorType='cursorPointer', $hovered=false) {
		$corners = false;
		if(!isIE6 && !isIE7) {
			$corners = '
				<div id="STL'.$id.'" class="annonceSTL'.$hovered.'"></div>
				<div id="SBL'.$id.'" class="annonceSBL'.$hovered.'"></div>
				<div id="STR'.$id.'" class="annonceSTR'.$hovered.'"></div>
				<div id="SBR'.$id.'" class="annonceSBR'.$hovered.'"></div>
			';
		}
		
		$html = '
			<div class="annonce'.$hovered.' '.$cursorType.'" '.$params.' '.$chBackground.'>
						'.$corners.'
						'.$content.'
			</div>
		';
		return $html;
	}
	function jsAnnonce() {
		if(!isIE6) {
//			$str = '$("#main"+nr).height($("#main"+nr).height()-4)';
//			$str1 = '$("#main"+nr).height($("#main"+nr).height()+4);';
		} else {
			$str = false;
			$str1 = false;
		}
		if(!isOpera) {
//			$str = '$("#main"+nr).height($("#main"+nr).height()-4)';
//			$str1 = '$("#main"+nr).height($("#main"+nr).height()+4);';
		} else {
			$str = false;
			$str1 = false;
		}
		$js = '
				<script>
					function switchAnnOn(nr) {
						$("#main"+nr).addClass("annonceH");
						'.$str.'
						$("#STL"+nr).removeClass("annonceSTL");
						$("#STL"+nr).addClass("annonceSTLH");
						
						$("#SBL"+nr).removeClass("annonceSBL");
						$("#SBL"+nr).addClass("annonceSBLH");
						
						$("#STR"+nr).removeClass("annonceSTR");
						$("#STR"+nr).addClass("annonceSTRH");
						
						$("#SBR"+nr).removeClass("annonceSBR");
						$("#SBR"+nr).addClass("annonceSBRH");
					}
					function switchAnnOff(nr) {
						$("#main"+nr).removeClass("annonceH");
						'.$str1.'
						$("#main"+nr).addClass("annonce");
						$("#STL"+nr).addClass("annonceSTL");
						$("#STL"+nr).removeClass("annonceSTLH");
						
						$("#SBL"+nr).addClass("annonceSBL");
						$("#SBL"+nr).removeClass("annonceSBLH");
						
						$("#STR"+nr).addClass("annonceSTR");
						$("#STR"+nr).removeClass("annonceSTRH");
						
						$("#SBR"+nr).addClass("annonceSBR");
						$("#SBR"+nr).removeClass("annonceSBRH");
					}
				</script>
			';
		if(isIE6 || isIE7) {
			$js = false;
		}
		return $js;
	}
	
	function getList($params, $rentLookers=false, $fixedWidth=false) {
		$cnt = count($params);
		if($fixedWidth) {
			$infoWidth = ' width="200"';
		} else {
			$infoWidth = false;
		}
		$html = '<table border="0" class="fullWidth blueBorder" cellspacing="0" cellpadding="0"><tr>';
		if(isIE6 || isIE7) {
			$photoWidth = false;
		} else {
			$photoWidth = ' width="1"';
		}
		if(!$rentLookers) {
			$html .= '<td class="defaultHeader textVerdana textBold text13px borderList" '.$photoWidth.' align="center">'.translate(90, LANG, 'Photo').'</td>';
		}
		$html .= '<td class="defaultHeader textVerdana textBold text13px borderList" '.$infoWidth.'>'.translate(191, LANG, 'Informatie').'</td>';
		if(!$rentLookers) {
			$html .= '<td class="defaultHeader textVerdana textBold text13px borderList">'.translate(13, LANG, 'Camere').'</td>';
			$html .= '<td class="defaultHeader textVerdana textBold text13px borderList">'.translate(147, LANG, 'Sector').'</td>';
		}
		$html .= '<td class="defaultHeader textVerdana textBold text13px borderList">'.translate(6, LANG, 'Pret').'</td>';
		if($rentLookers) {
			$html .= '<td class="defaultHeader textVerdana textBold text13px borderList">'.translate(69, LANG, 'Contacte').'</td>';
		}
		$html .= '<td class="defaultHeader textVerdana textBold text13px">'.translate(17, LANG, 'Data').'</td></tr>';
		
		if($rentLookers) {
			$titleWidth = '367';
		} else {
			$titleWidth = '140';
		}
		
		for($i=0;$i<$cnt;$i++) {
			if($i==(int)($cnt/2)) {
				$html .= '<tr><td colspan="6" align="center" style="padding:10px;">'.getGAds().'</td></tr>';
				$html .= '<tr><td colspan="7"><div style="height: 1px; background-color: #CDE3FD; overflow: hidden;"></div></td></tr>';
			}
			$daysAgo = false;
			if($params[$i]['daysAgo']) {
				$daysAgo = $params[$i]['daysAgo'];
			}
			$jsHover = 'onMouseover=\'$(this).css({"background-color" : "#D9E9FD"})\' onMouseout=\'$(this).css({"background-color" : "#FFFFFF"})\'';
			
			if($rentLookers) {
				$jsOnclick = 'onClick="NewWindow(\'rentDet?id='.$params[$i]['id'].'\', 770, 650); return false;"';
			} else {
				$jsOnclick = 'onClick="NewWindow(\'app?id='.$params[$i]['id'].'\', 770, 650); return false;"';
			}
			$html .= '<tr '.$jsHover.' '.$jsOnclick.' class="cursorPointer">';
			if(!$rentLookers) {
				$html .= '<td align="center" class="padding5"><img src="'.$params[$i]['photo'].'" alt="'.$params[$i]['photo_alt'].'"/></td>';
			}
			$html .= '<td class="text13px paddingLeft5" width="'.$titleWidth.'">'.$params[$i]['title'].'</td>';
			if(!$rentLookers) {
				$html .= '<td align="center" class="text13px">'.$params[$i]['odai'].'</td>';
				$html .= '<td align="center" class="text13px">'.$params[$i]['sector'].'</td>';
			}
			$html .= '<td align="center" class="text13px">'.$params[$i]['price'].'</td>';
			if($rentLookers) {
				$html .= '<td align="center" class="text13px">'.$params[$i]['phone'].'</td>';
			}
			$html .= '<td align="center" class="text13px paddingRight5">'.$params[$i]['date'].$daysAgo.$params[$i]['agentie'].'</td>';
			$html .= '</tr>';
			if($i != $cnt-1) {
				$html .= '<tr><td colspan="7"><div style="height: 1px; background-color: #CDE3FD; overflow: hidden;"></div></td></tr>';
			}
		}
		$html .= '</table>';
		return $html;
	}
?>