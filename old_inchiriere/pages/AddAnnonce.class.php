<?php
class AddAnnonce extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			if($this->reste[1] == 'add-app-final') {
				$this->addBlock('Account/', 'AddAppFinalBlock');
			}
			if($this->reste[1] == 'check-data') {
				$this->addBlock('Account/', 'AddAppFinalBlock', array('emailCheck'=>true));
			}
			
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 'core' => true, 'resize' => true));
			
			$this->addText('<div class="content">');
				if($this->reste[1] == 'status_w') {
					$this->addBlock('Account/', 'StatusValidationBlock');
					$this->addText('<div class="separator"> </div>');
				}
			$this->addBlock('MainContent/', 'AddAnnonceBlock');
			$this->addText('<div class="separator"> </div>');
			$this->addBlock('MainContent/', 'InfoRegisterBlock');
			$this->addText('<div class="separator"> </div>');
			$this->addText('</div>');
			$this->addText('<div class="content-left">');
				$this->addBlock('Navigation/', 'MainMenuBlock');
				$this->addText('<div class="separator"> </div>');
//				$this->addBlock('Login/', 'LoginBlock');
//				$this->addText('<div class="separator"> </div>');
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
		public function getMeta() {
			$meta = array();
			$meta['title'] = translate(143, LANG);
			$meta['desc'] = translate(125, LANG);
			$meta['keywords'] = translate(124, LANG);
			return $meta;
		}
}
?>