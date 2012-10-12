<?php
require_once 'include/data/flat.lib.php';
class UnsubscribeEmail extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			unsubEmail($this->reste[1]);
			httpRedirect(getUrl(array('pagePath'=>'HomePage', 'lang'=>LANG)));
		}
		public function getMeta() {
		}
}
?>