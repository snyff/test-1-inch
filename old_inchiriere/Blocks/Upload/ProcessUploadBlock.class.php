<?php
require_once 'include/data/upload.lib.php';
require_once 'include/data/flat.lib.php';
class ProcessUploadBlock extends Block {
	function buildContent() {
		$nrUserPhotos = getPhotos(getSessionVar('nrApp'), 'a', true);
		if($nrUserPhotos >= 5) {
			echo '<center><span class="colorRed textBold">'.translate(91, LANG).'</span></center>';
		} else {
			$photo		= $_FILES['photo'];
			insertPhoto($photo['tmp_name'], $photo['name'], 'a', getSessionVar('nrApp'), $photo['type']);
		}
	}
}
?>