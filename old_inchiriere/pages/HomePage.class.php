<?php
class HomePage extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			if($this->reste[1] == 'subscribe') {
				$this->addBlock('Subscribe/', 'SubscribeBlock');
			}
			if($this->reste[1] == 'sondaj') {
				$this->addBlock('Sondaj/', 'SondajProcessBlock');
			}
			$this->addBlock('Ads/', 'AdsBlock');
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 
						     									  'core' => true
																));
			$this->addText('<div class="content">');
				if($this->reste[1]=='search') {
					$this->addBlock('Search/', 'SearchExplonationBlock');
					$this->addBlock('Search/', 'SearchResultsBlock');
				} elseif($this->reste[1]=='rent') {
					$this->addText('<div class="content">');
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
				} elseif($this->reste[1]=='ag') {
					$this->addText('<div class="content">');
						$this->addBlock('MainContent/', 'AgentiiBlock');
					$this->addText('</div>');
				} else {
					$this->addText('<div class="content">');
//						$this->addBlock('MainContent/', 'ExplonationBlock');
						$this->addBlock('MainContent/', 'SondajBlock');
						$this->addBlock('MainContent/', 'MainBlock');
					$this->addText('</div>');
				}
			$this->addText('</div>');
			$this->addText('<div class="content-left">');
				$this->addText('<div class="separator"> </div>');
				$this->addBlock('Navigation/', 'MainMenuBlock');
				$this->addBlock('Login/', 'LoginBlock');
				$this->addBlock('News/', 'NewsBlock');
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