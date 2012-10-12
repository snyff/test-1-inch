<?php
class AdvancedOptions extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			if(in_array('submit', $this->reste)) {
				$this->addBlock('Advanced/', 'SubmitOptionsBlock');
				die;
			} else {
				$this->addBlock('Navigation/', 'MetaTagsBlock', array('withoutHeader'=>true));
				$this->addBlock('Advanced/', 'AdvancedOptionsBlock');
			}
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