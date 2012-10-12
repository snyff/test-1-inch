<?php
class AnnStats extends Page{
		function buildContent() {
			/* TODO
			 * chech if the user is watching stats of his own annonce
			 */
			$this->reste = &$this->getCodeReste();
			if($this->reste[1] == 'get-stats') {
				$this->addBlock('Stats/', 'GetAnnStatsBlock');
			} else {
				$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 
																		'core' => true,
																		'flot' => true
																));
				$this->addText('<div class="content">');
				$this->addBlock('Stats/', 'AnnStatsBlock');
				$this->addText('</div>');
				$this->addText('<div class="content-left marginTop8px">');
					$this->addBlock('Account/', 'MenuBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('Search/', 'SearchBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('Abonare/', 'AbonareBlock');
					$this->addText('<div class="separator"> </div>');
					$this->addBlock('RightSide/', 'AdvancedBlock');
				$this->addText('</div>');
				$this->addBlock('Navigation/', 'FooterBlock');
			}
		}
		public function getMeta() {
			$meta = array();
			$meta['title'] = translate(145, LANG).' - '.translate(135, LANG);
			$meta['desc'] = translate(86, LANG);
			$meta['keywords'] = translate(87, LANG);
			return $meta;
		}
}
?>