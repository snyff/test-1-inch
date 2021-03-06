<?php
class Sitemap extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 
																			'core' => true
																			));
			$this->addText('<div class="content">');
			if($this->reste[1] == 'for-rent') {
				$this->addBlock('Sitemap/', 'ForRentBlock');
			} elseif($this->reste[1] == 'rent') {
				$this->addBlock('Sitemap/', 'RentBlock');
			} else {
				$this->addBlock('Sitemap/', 'SitemapMainBlock');
			}
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
				$this->addBlock('RightSide/', 'AdvancedBlock');
				$this->addText('<div class="separator"> </div>');
			$this->addText('</div>');
			$this->addBlock('Navigation/', 'FooterBlock');
		}
		public function getMeta() {
			$meta = array();
			$meta['title'] = translate(145, LANG).' - '.translate(70, LANG);
			$meta['desc'] = translate(125, LANG);
			$meta['keywords'] = translate(124, LANG);
			return $meta;
		}
}
?>