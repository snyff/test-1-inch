<?php
require_once 'include/data/flat.lib.php';
class PhotoUploaderBlock extends Block {
	function buildContent() {
		$delPhoto = getStringFromRequest('delPhoto');
		if($delPhoto && is_numeric($delPhoto)) {
			deletePhoto($delPhoto, getSessionVar('userid'));
		}
		$photos = getPhotos(getSessionVar('nrApp'), 'a');
		$js = '<script>
					function formSubmit() {
						$("#upload_form").submit();
						$("#container").html("<div class=\"photoUploader\"></div>");
					}
			   </script>';
		$photosContent = '<table border=0><tr>';
		for($i=0;$i<count($photos);$i++) {
			$photosContent .= '<td>
									<img src="'.getPhotoPath($photos[$i]['id'], $photos[$i]['ext'], 'min').'" height=70><br />
									<center>
										<a title="'.translate(88, LANG,'Sterge').'" href="'.getUrl(array('pagePath'=>'IframePhotoUploader', 'lang'=>LANG, 'queryString'=>array('delPhoto'=>$photos[$i]['id']))).'"><img src="'.HOST.FOLDER.IMG.'all/del_photo.png" width="13" alt="'.translate(88, LANG,'Sterge').'"></a>
									</center>
							   </td>';
		}
		$photosContent .= '</tr></table>';
		
		if(!$photosContent) {
			$photosContent = translate(89, LANG,'Nu sint foto');
		}
		$html .= '
			<style>
				body{
					background-color:#FFFFFF;
					background-image: none;
				}
			</style>
			<div id="container">
				<div>
					<form method="post" action="'.getUrl(array('pagePath' => 'IframePhotoUploader', 'lang' => LANG, 'reste' => 'upload')).'" id="upload_form" enctype="multipart/form-data">
						<span class="textBlue textBold">'.translate(90, LANG,'Foto').':</span><br />
						<input type="file" name="photo" id="photo" onChange="formSubmit();">
					</form>
				</div>
				<div class="marginTop10">
					'.$photosContent.'
				</div>
			</div>
		';
		echo $html.$js;
		die;
	}
}
?>