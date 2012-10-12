<?php
require_once 'include/data/flat.lib.php';
class RentDetails extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('withoutHeader'=>true));
			$this->addBlock('App/', 'RentDetailsBlock');
			$this->addBlock('Navigation/', 'FooterBlock', array('withoutHeader'=>true));
		}
		function getRentDetails() {
			$idFlat = getStringFromRequest('id');
			if(!isset($this->rentDetails[$idFlat])) {
				$this->rentDetails[$idFlat] = getRent(false, false, $idFlat);
			}
			return $this->rentDetails[$idFlat];
		}
		public function getMeta() {
			$rentDet = $this->getRentDetails();
			$meta = array();
			$meta['title'] = 'inchiriere.md - '.$rentDet['title'];
			$meta['desc'] = 'inchiriere.md - '.$rentDet['annonce'];
			$meta['keywords'] = translate(124, LANG);
			return $meta;
		}
}
?>