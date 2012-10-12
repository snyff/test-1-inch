<?php
function insertPhoto($file, $fileName, $photoType, $nrApp, $photoExt) {
	if(!checkExtention($photoExt)) {
		return false;
	}
	ini_set('memory_limit', '50M');
	$uploadPath = 'upload/';
	$db = new Db();
	$explode = explode('.', $fileName);
	$ext = $explode[count($explode)-1];
	$q = "";
	$db->query($q);
	$q = "INSERT INTO photos(id, userid, photo_type, add_date, nr_app, ext) 
		  VALUES(NULL, '".getSessionVar('userid')."', '".$photoType."', NOW(), '".$nrApp."', '".escape(strtolower($ext))."')";
	$db->query($q);
	if($nr) {
		if(!move_uploaded_file($file, $uploadPath.$nr.'.'.$ext)) {
			$q = "DELETE FROM photos WHERE id=".$nr;
		} else {
			
		}
	}
	ini_set('memory_limit', '12M');
}

function checkExtention($ext) {
		$allowedExt = array();
		$allowedExt[] = 'image/jpeg';
		$allowedExt[] = 'image/pjpeg';
		$allowedExt[] = 'image/gif';
		if(in_array($ext, $allowedExt)) {
			return true;
		}
		return false;
	}
?>