<?php
class News extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			if($this->reste[1] == 'subscribe') {
				$this->addBlock('Subscribe/', 'SubscribeBlock');
			}
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 
						     									  'core' => true
																));
			$this->addText('<div class="content">');
				if($this->reste[1]=='search') {
					$this->addBlock('Search/', 'SearchExplonationBlock');
					$this->addBlock('Search/', 'SearchResultsBlock');
				} elseif($this->reste[1]=='rent') {
					$this->addText('<div class="content">');
//						$this->addBlock('MainContent/', 'ExplonationBlock');
						$this->addBlock('MainContent/', 'RentBlock');
					$this->addText('</div>');
				} elseif($this->reste[1]=='email-conf') {
					$this->addText('<div class="content">');
						$this->addBlock('MainContent/', 'ConfirmationExplBlock');
					$this->addText('</div>');
				} elseif($this->reste[1]=='sms') {
					$this->addText('<div class="content">');
						$this->addBlock('MainContent/', 'ExplSMSBlock');
					$this->addText('</div>');
				} else {
					$this->addText('<div class="content">');
						$this->addBlock('News/', 'NewsAllBlock');
					$this->addText('</div>');
				}
			$this->addText('</div>');
			$this->addText('<div class="content-left">');
				$this->addText('<div class="separator"> </div>');
				$this->addBlock('Navigation/', 'MainMenuBlock');
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
		public function getMeta() {
			$meta = array();
			if($this->reste[1] == 'for-rent') {
				$meta['title'] = translate(144	, LANG);
			} elseif($this->reste[1] == 'rent') {
				$meta['title'] = translate(145, LANG).' - '.translate(42, LANG);
			}
			$meta['title'] = translate(125, LANG);
			$meta['desc'] = translate(125, LANG);
			$meta['keywords'] = translate(124, LANG);
			return $meta;
		}
}
?>