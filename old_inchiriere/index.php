<?php
//	session_save_path("../cgi-bin/tmp");
/*
	$mystring = $_SERVER["HTTP_REFERER"];
	$findme   = 'itjob.md';
	$pos = strpos($mystring, $findme);
	if($pos !== false) {
	  die;
	}
*/
	@session_start();
	require 'conf/frameworkFunctions.lib.php';
	require 'conf/pages.inc.php';
	require 'conf/constants.inc.php';
	require 'include/data/pagination.php';
	require 'include/layout/layout.lib.php';
	
	function __autoload($class) {
		global $globalClasses;
		$globalClasses = array('Page', 'Block', 'Db', 'PhpMail', 'Captcha', 'Translations', 'ImageResize');
		if(!in_array($class, $globalClasses)) {
			require 'pages/'.$class.'.class.php';
		} else {
			require 'classes/'.$class.'.class.php';
		}
	}
	date_default_timezone_set('Europe/Chisinau');
	error_reporting(0);
	$wrongLang = false;
	$url = getCodeReste($_GET['url_params']);
	
	$pagePath = $url[count($url)-1];
	if(count($url)==2) {
		$reste = false;
	} else {
		$reste = $url[count($url)-2];
	}
	$pages = array_flip($pages);
	$pagePathClass = $pages[$pagePath];
	if($pagePathClass == false) {
		$pagePathClass = $pagePath;
	}
	$langArr = array('eng', 'rom', 'rus');
	if (!in_array($url['0'], $langArr)) {
		$lang = 'eng';
		$wrongLang = true;
	} else {
		$lang = $url[0];
	}
	
	if(!$pagePath) {
		define('PAGE_PATH', 'HomePage');
		$pagePathClass = 'HomePage';
	}
	if ($wrongLang) {
		define('LANG', 'rom');
	}
	$browser = $_SERVER['HTTP_USER_AGENT'];
	if(strstr($browser, 'MSIE 6.0')) {
		define('isIE6', true);
	} else {
		define('isIE6', false);
	}
	if(strstr($browser, 'MSIE 7.0')) {
		define('isIE7', true);
	} else {
		define('isIE7', false);
	}
	if(strstr($browser, 'Opera')) {
		define('isOpera', true);
	} else {
		define('isOpera', false);
	}
	$trans = getStringFromRequest('trans');
	if($trans == 'mda') {
		$tr = new Translations();
		$tr->storeTranslations();
	}
	define('PAGE_PATH', $pagePathClass);
	define('RESTE', $reste);
	define('LANG', $lang);
	define('ID_USER', $url[1]);
	@require 'pages/'.$pagePathClass.'.class.php';
	$obj = new $pagePathClass();
	$obj->buildContent();
	$obj->buildOutput();
	$debugOpt = getStringFromRequest('debug');
	$trace = false;
	if($debugOpt == 'xdebug') {
		$trace = true;
	}
	if(BACKTRACE || $trace) {
		echo "<b>".PAGE_PATH."</b><br /><br />";
		echo '<table border="0" width="100%">';
		for($i=0;$i<count($GLOBALS['backtrace']->blocks);$i++) {
			if($i%2){
				$color = 'background-color:#FFD4FF';
			} else {
				$color = 'background-color:#FFD4AA';
			}
			echo '<tr><td style="padding-left:20px;'.$color.'">'.$GLOBALS['backtrace']->blocks[$i].'</td></tr>';
		}
		echo '</table><br />';
		echo 'Requests<br />';
		echo '<br /><table border="0" width="100%">';
		for($i=0;$i<count($GLOBALS['backtrace']->sql);$i++) {
			if($i%2){
				$color = 'background-color:#FFD4FF';
			} else {
				$color = 'background-color:#FFD4AA';
			}
			echo '<tr><td style="padding-left:20px;'.$color.'">'.$GLOBALS['backtrace']->sql[$i].'</td></tr>';
		}
		echo '</table>';
	}
?>