<?php
require_once 'include/data/flat.lib.php';
class RentBlock extends Block{
//	function setCache() {
//		$this->pageNr = getStringFromRequest('page');
//		if(!$this->pageNr) {
//			$this->pageNr = 1;
//		}
//		$this->cntAll = getRent(false, true, false, false, false, 1);
		
//		$this->cachePath('MainContent/');
//		$this->setCacheTime(30);
//		$this->cache(array( 'page' => $this->pageNr, 
//							'lang' => LANG, 
//							'cnt'  => $this->cntAll)
//		);
//	}
	function buildContent() {
		$raion = getRaions();
		
		$this->pageNr = getStringFromRequest('page');
		if(!$this->pageNr) {
			$this->pageNr = 1;
		}
		$this->cntAll = getRent(false, true, false, false, false, 1);
		
		$nrAppToDisp = 20;
		$allApp = getRent(false, false, false, $nrAppToDisp, ($this->pageNr-1)*$nrAppToDisp, 1);
		$cnt = count($allApp);
		$js = jsAnnonce();
		$yesterday = date("Y-m-d", strtotime("-1 day"));
		for($i=0;$i<$cnt;$i++) {
			$phones = false;
			if($allApp[$i]['fix']) {
				$phones = $allApp[$i]['fix']; 
			}
			if($allApp[$i]['mobil']) {
				if($phones) {
					$phones .= '<br />';
				}
				$phones .= $allApp[$i]['mobil']; 
			}
			if(!$phones) {
				$phones = '-';
			}
//			if(strlen($allApp[$i]['title']) > 100) {
//				$textTitle = substr($allApp[$i]['title'], 0, 100).'...';
//			} else {
//				$textTitle = $allApp[$i]['title'];
//			}

			if(substr($allApp[$i]['added'], 0, 10) == date("Y-m-d")) {
				$dateClass = ' colorRed textBold';
				$textDate = translate(148, LANG, 'Astazi');
			} elseif(substr($allApp[$i]['added'], 0, 10) == $yesterday) {
				$dateClass = false;
				$textDate = translate(165, LANG, 'Ieri');
			} else {
				$dateClass = false;
				$textDate = substr($allApp[$i]['added'], 0, 10);
			}
			if($allApp[$i]['title']) {
				$title = $allApp[$i]['title'];
				$title = stripslashes($title);
			} else {
				$title = false;
			}
			$params = 'onMouseover="switchAnnOn('.$allApp[$i]['id'].');" id="main'.$allApp[$i]['id'].'" onMouseout="switchAnnOff('.$allApp[$i]['id'].');" id="main'.$allApp[$i]['id'].'" onClick="NewWindow(\'rentDet?id='.$allApp[$i]['id'].'\', 770, 650); return false;"';
//			$cont = '
//					<table border="0" class="fullWidth">
//							<tr>
//								<td valign="top" class="positionRelative">
//									<div class="annonceDetHeader">
//										<div class="annTimePosted'.$dateClass.'">'.$textDate.'</div>
//										'.$title.'
//										'.translate(6, LANG, 'Pret').': <span class="textBold">'.$allApp[$i]['price'].' '.$allApp[$i]['valuta'].'</span>
//									</div>
//									<div class="annTitle">
//										'.$textTitle.'
//									</div>
//									<br />
//									<br />
//									<div class="annContacts">
//										'.translate(69, LANG, 'Contacte').': <span class="textBold">'.$phones.'</span>
//									</div>
//									<br />
//								</td>
//							</tr>
//						</table>
//			';
			$rentParams[$i]['title'] 	= '<br />'.$title.'<br /><br />';
			$rentParams[$i]['photo'] 	= false;
			$rentParams[$i]['date']  	= '<div class="'.$dateClass.'">'.$textDate.'</div>';
			$rentParams[$i]['phone'] 	= $phones;
			$rentParams[$i]['sector']  	= $raion[$allApp[$i]['raion']];
			$rentParams[$i]['odai']  	= $allApp[$i]['nr_rooms'];
			$rentParams[$i]['price']  	= $allApp[$i]['price'].' '.$allApp[$i]['valuta'];
			$rentParams[$i]['id'] 		= $allApp[$i]['id'];
//			$content .= annonce($cont, $params, $allApp[$i]['id']);
//			$content .= '<div class="separator"> </div>';
		}
		$content = getList($rentParams, true);
		$html .= '
				<div class="content-main">
					<div class="textBold text24px colorBlue textCenter marginBottom5 headerStyle">'.translate(42, LANG, 'Inchiriez').'</div>
					'.$content.'
					<div class="separator"> </div>
					'.pagination($this->pageNr, $this->cntAll, $nrAppToDisp).'
					<br />
				</div>
		';
		echo $html.$js;
	}
}
?>