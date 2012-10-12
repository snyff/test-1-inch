<?php
	@session_start();
	@include_once 'include/data/translations/translations.lib.php';
	@include 'conf/pages.inc.php';
	function printArray($array) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	function getCodeReste($url) {
		$urlArr = array();
		$urlArr = explode('/', $url);
		return $urlArr;
	}
	function decodeReste($resteArr) {
		return @implode('/', $resteArr);
	}
	function escape($string) {
		return mysql_real_escape_string(htmlentities(iconv('UTF-8', 'UTF-8//IGNORE', $string), ENT_QUOTES, 'UTF-8'));
	}
	function getUrl($urlArr = array()) {
		global $pages;
		$pages = @array_flip($pages);
		$path = $pages[$urlArr['pagePath']];
		if($path == false) {
			$pages = @array_flip($pages);
			$path = $pages[$urlArr['pagePath']];
		}
		if($path == false) {
			$path = $urlArr['pagePath'];
		}
		if(is_array($urlArr['reste'])) {
			$urlArr['reste'] = implode('/', $urlArr['reste']);
		}
		if($urlArr['reste'] == '') {
			$reste = '';
		} else {
			$reste = $urlArr['reste'].'/';
		}
		if($urlArr['queryString']) {
			$queryString = '?';
			foreach($urlArr['queryString'] as $key => $value) {
				$queryString .= $key .'='.$value;
			}
		}
		$ret = FOLDER.$urlArr['lang'].'/'.$reste.$path.$queryString;
		if(!isset($urlArr['absolute'])) {
			$urlArr['absolute'] = true;
		}
		if($urlArr['absolute']) {
			$ret = HOST.$ret;
		}
		return $ret;
	}
	function translate($nr, $lang="ROM", $comment=false, $fromDB=false) {
		global $translationArray;
		if(!$lang) {
			$lang = "ROM";
		}
		$lang = strtoupper ($lang);
		if($nr == 0) {
			return stripslashes($comment);
		}
		if($fromDB) {
			$db = new Db();
			$res = $db->query("SELECT ".$lang." FROM translations WHERE id=".$nr);
			$row = $db->getNextRow($res);
			return stripslashes($row[$lang]);
		}
		$ret = $translationArray[$nr][$lang];
		if(!$ret) {
			$ret = $comment;
		}
		return stripslashes($ret);
//		if(empty($row)) {
//			return stripslashes($comment);
//		}
//		return stripslashes($row[$lang]);
	}
	function httpRedirect($redirectUrl) {
//		session_write_close();
		header("Location: ".$redirectUrl);
		exit();
	}
	function getStringFromRequest($nameField) {
		return $_REQUEST[$nameField];
	}
	function setSessionVar($var, $value) {
		session_start();
		$_SESSION[$var] = $value;
	}
	function getSessionVar($var) {
		session_start();
		return $_SESSION[$var];
	}
	function unsetSesssionVar($var) {
		session_start();
		unset($_SESSION[$var]);
	}
	function cleanLabel ($val) {
		$ret = str_replace(' ', '_', $val);
		$ret = str_replace('-', '_', $ret);
		$ret = str_replace('?', '_', $ret);
		$ret = str_replace('!', '_', $ret);
		$ret = str_replace('$', '_', $ret);
		$ret = str_replace('&', '_', $ret);
		return $ret;
	}
	function getPhotoPath($nrPhoto, $ext, $photoType=false) {
		if($photoType) {
			$type = '_min';
		}
		if(file_exists(FOLDER.UPLOAD_PATH.$nrPhoto.$type.'.'.$ext)) {
			$photo = HOST.FOLDER.UPLOAD_PATH.$nrPhoto.$type.'.'.$ext;
		} else {
			$photo = HOST.FOLDER.UPLOAD_PATH.'no_photo'.'.jpg';
		}
//		$photo = HOST.FOLDER.UPLOAD_PATH.$nrPhoto.$type.'.'.$ext;
		return $photo;
	}
?>