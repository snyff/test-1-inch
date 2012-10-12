<?php
require_once 'include/data/flat.lib.php';
class Flat extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('withoutHeader'=>true, 'jquery'=>true));
			$this->addBlock('App/', 'AppDetailsBlock');
			$this->addBlock('Navigation/', 'FooterBlock', array('withoutHeader'=>true));
		}
		function getAppDetails() {
			$idFlat = getStringFromRequest('id');
			if(!isset($this->appDetails[$idFlat])) {
				$this->appDetails[$idFlat] = getFlat(false, false, $idFlat);
			}
			return $this->appDetails[$idFlat];
		}
		public function getMeta() {
			$appDetails = $this->getAppDetails();
			$meta = array();
			$meta['title'] = $appDetails['title'];
			$meta['desc'] = $appDetails['annonce'];
			$meta['keywords'] = translate(124, LANG);
			return $meta;
		}
}
?>