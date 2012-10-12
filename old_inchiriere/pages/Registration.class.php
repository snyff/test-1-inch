<?php
@session_start();
class Registration extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			if($this->reste[1] == 'register-user') {
				$this->addBlock('Registration/', 'RegisterProcessBlock');
			} elseif($this->reste[1] == 'login') {
				$this->addBlock('Login/', 'LoginProcessBlock');
			} else {
				$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 'jquery.validation' => true, 'reg' => true));
				$this->addText('<div class="content">');
					$this->addBlock('Registration/', 'RegisterBlock');
				$this->addText('</div>');
				$this->addText('<div class="content-left">');
					$this->addBlock('Navigation/', 'MainMenuBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('Login/', 'LoginBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('Search/', 'SearchBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('Abonare/', 'AbonareBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('RightSide/', 'TellFriendBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('RightSide/', 'AdvancedBlock');
					$this->addText('<div class="separator"> </div>');
				$this->addText('</div>');
				$this->addBlock('Navigation/', 'FooterBlock');
			}
		}
		public function getMeta() {
			$meta = array();
			$meta['title'] = translate(145, LANG).' - '.translate(64, LANG);
			$meta['desc'] = translate(125, LANG);
			$meta['keywords'] = translate(124, LANG);
			return $meta;
		}
}
?>