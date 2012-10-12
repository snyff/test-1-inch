<?php
class MetaTagsBlock extends Block{
	function buildContent() {
		require 'include/data/stats/stats.lib.php';
		$html = $jsInclude = false;
		if($this->getParameter('jquery')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/jquery.js'.'"></script>';
		}
		if($this->getParameter('jquery.validation')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/jquery.validate.js'.'"></script>';
		}
		if($this->getParameter('core')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/core.js'.'"></script>';
		}
		if($this->getParameter('jquery.form')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/jquery.form.js'.'"></script>';
		}
		if($this->getParameter('resize')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/resize.js'.'"></script>';
		}
		if($this->getParameter('corner')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/jquery.corner.js'.'"></script>';
		}
		if($this->getParameter('reg')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/registration.js'.'"></script>';
		}
		if($this->getParameter('uploader')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/jquery.MultiFile.pack.js'.'"></script>';
		}
		if($this->getParameter('calendar')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/calender_date_picker.js'.'"></script>';
			$cssInclude.= '<link href="'.HOST.FOLDER.'css/ui.datepicker.css" rel="stylesheet" type="text/css" />';
		}
		if($this->getParameter('flot')) {
			if(isIE6 && isIE7) {
				$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/excanvas.pack.js'.'"></script>';
			} else {
				$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/jquery.flot.pack.js'.'"></script>';
			}
		}
		if(isIE6) {
			$cssInclude .= '<link href="'.HOST.FOLDER.'css/styleIE.css" rel="stylesheet" type="text/css" />';
			$ieBrs = '<br /><br /><br /><br />';
		} else {
			$cssInclude .= '<link href="'.HOST.FOLDER.'css/style.css" rel="stylesheet" type="text/css" />';
		}
		
		if($this->getParameter('withoutHeader')) {
			$jsInclude .= '<script type="text/javascript" src="'.HOST.FOLDER.'js/tooltip.js'.'"></script>';
			if(isIE6) {
//				$header = $pngFixJs;
			} else {
				$header = false;
			}
			$bodyBack = false;
		} else {
			$welcomeText = translate(96, LANG);
			$registerUrl = getUrl(array('pagePath'=>'Registration', 'lang'=>LANG));
			$addAnnonce = getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG));
			$welcomeText = str_replace('@url_register@', $registerUrl, $welcomeText);
			if(PAGE_PATH != 'Account' && PAGE_PATH != 'AnnStats') {
				$welcomeText .= '<span class="introText">'.translate(172, LANG).'</span>';
			} else {
//				$welcomeText .= '</div>';
			}
			$welcomeText = str_replace('@add_annonce@', $addAnnonce, $welcomeText);
			$smsText = translate(128, LANG);
			$urlSms = getUrl(array('pagePath'=>'HomePage', 'lang'=>LANG, 'reste'=>'sms'));
			$smsText = str_replace('@url_sms@', $urlSms, $smsText);

			$secondLi = translate(129, LANG);
			if(PAGE_PATH == 'AddAnnonce' || PAGE_PATH == 'Account' || PAGE_PATH == 'AnnStats'){
				$secondLi = '<span class="colorRed">'.translate(166, LANG, 'Adaugati fotografii in anunt si eficienta lui va creste de citeva ori!').'</span>';
			}
			$bodyBack = 'bodyBack';
			$header .= '
					   <div class="mainContent">
						   <div id="header">
							 <div id="logo">
							 	<div id="headerText">
							 		<h1>'.translate(155, LANG, 'Inchirierea Apartamentelor').'</h1>
									<div style="float: right; position: absolute; right: 10px; top: 4px;">
									      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="190" height="105" title="">
	     									<param name="movie" value="compare.swf" />
	     									<param name="quality" value="high" />
	     									<embed src="'.HOST.FOLDER.'compare.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="190" height="105"></embed>
									      </object>
							 		</div>
							 	</div>
							 </div>
						   </div>
						   <div id="headerRight">
						   </div>
						   <br clear="all" />
						   <div id="postHeader">
						   		<div class="lang">
						   			<a href="'.getUrl(array('pagePath'=>PAGE_PATH, 'lang'=>'rom', 'reste'=>RESTE)).'" class="textBold">rom</a> | 
						   			<a href="'.getUrl(array('pagePath'=>PAGE_PATH, 'lang'=>'rus', 'reste'=>RESTE)).'" class="textBold">rus</a> | 
						   			<a href="'.getUrl(array('pagePath'=>PAGE_PATH, 'lang'=>'eng', 'reste'=>RESTE)).'" class="textBold">eng</a> 
						   		</div>
						   		<div class="welcome">
						   			'.$welcomeText.'
						   		</div>
						   		<div class="advice">
						   			<span class="colorBlue textVerdana textBold text15px">'.translate(127, LANG).':</span>
						   			<br />
						   			<ul>
						   				<li>'.$smsText.'</li>
										'.$ieBrs.'
						   				<li>'.$secondLi.'</li>
						   			</ul>
						   		</div>
						   </div>
					    ';
		}
		$metaInfo = $this->page->getMeta();
		$html .= '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
				<html>
					<head>
						<meta http-equiv="content-type" content="text/html; charset=utf-8" />
						<meta content="'.$metaInfo['desc'].'" name="description"/>
						<meta content="'.$metaInfo['keywords'].'" name="keywords"/>
						<title>'.$metaInfo['title'].'</title>
						<link rel="Shortcut Icon" href="'.HOST.FOLDER.'/favicon.ico">
						'.$cssInclude.'
						'.$jsInclude.$redirDownload.'
						<meta name="google-site-verification" content="vKL5dqT5Yyl3EvDihKYNFIpoVtIlODRUPpfmMxjZc64" />
					</head>
					<body class="'.$bodyBack.'">
						'.$header.'
		';
		echo $html;
	}
}
?>