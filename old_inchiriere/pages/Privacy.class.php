<?php
class Privacy extends Page{
		function buildContent() {
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 
																			'core' => true
																			));
			$this->addText('<div class="content">');
				$this->addBlock('Navigation/', 'MainMenuBlock');
				$this->addBlock('Privacy/', 'PrivacyBlock');
			$this->addText('</div>');
			
			$this->addText('<div class="content-left">');
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
			$this->addText('</div>');
			
			$this->addBlock('Navigation/', 'FooterBlock');
		}
		public function getMeta() {
			$meta = array();
			$meta['title'] = translate(126, LANG);
			$meta['desc'] = translate(124, LANG);
			$meta['keywords'] = translate(125, LANG);
			return $meta;
		}
}
?>