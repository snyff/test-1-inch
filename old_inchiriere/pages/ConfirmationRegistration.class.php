<?php
class ConfirmationRegistration extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			$this->addBlock('Emails/', 'ConfirmRegistrationBlock');
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