<?php
class IframePhotoUploader extends Page {
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('withoutHeader'=>true, 'jquery'=>true));
			if($this->reste[1] == 'upload') {
				$this->addBlock('Upload/', 'ProcessUploadBlock');
			}
			$this->addBlock('Upload/', 'PhotoUploaderBlock');
		}
		public function getMeta() {
//			$meta = array();
//			$meta['title'] = translate(85, LANG, '');
//			$meta['desc'] = translate(86, LANG, '');
//			$meta['keywords'] = translate(87, LANG, '');
//			return $meta;
		}
}
?>