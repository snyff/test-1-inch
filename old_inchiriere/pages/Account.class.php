<?php
@session_start();
class Account extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			if(!$_SESSION['user_loggedin']) {
				httpRedirect(getUrl(array('pagePath' => 'HomePage', 'lang' => LANG)));
			}
			if($this->reste[1] == 'add-app-final') {
				$this->addBlock('Account/', 'AddAppFinalBlock');
			}
			if($this->reste[1] == 'del-app' || $this->reste[1] == 'del-rent') {
				$this->addBlock('Account/', 'DelAppBlock');
			}
			if($this->reste[1] == 'add-rent') {
				$this->addBlock('Account/', 'AddRentFinalBlock');
			}
			if($this->reste[1] == 'logout') {
				unset($_SESSION['user_loggedin']);
				unset($_SESSION['userid']);
				httpRedirect(getUrl(array('pagePath' => 'HomePage', 'lang' => LANG)));
			}
			$this->addBlock('Navigation/', 'MetaTagsBlock', array('jquery' => true, 'core' => true, 'resize' => true, 'calendar' => true, 'uploader' => true));
			$this->addText('<div class="content">');
				if($this->reste[1] == 'status_w') {
					$this->addBlock('Account/', 'StatusValidationBlock');
					$this->addText('<div class="separator"> </div>');
				}
				if($this->reste[1] == 'info-register') {
					$this->addBlock('Account/', 'StatusValidationBlock', array('firstTimeRegister'=>true));
				}
				if($this->reste[1] == 'add-app') {
					$this->addBlock('Account/', 'AddAppBlock');
				} elseif($this->reste[1] == 'manage-app') {
					$this->addBlock('Account/', 'ManageAppBlock');
				} elseif($this->reste[1] == 'rent') {
					$this->addBlock('Account/', 'AddRentBlock');
				} elseif($this->reste[1] == 'manage-rent') {
					$this->addBlock('Account/', 'ManageRentBlock');
				} else {
					$this->addBlock('Account/', 'ManageAppBlock');
				}
			$this->addText('</div>');
			$this->addText('<div class="content-left marginTop8px">');
				$this->addBlock('Account/', 'MenuBlock');
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
			if($this->reste[1] == 'rent') {
				$meta['title'] = translate(145, LANG).' - '.translate(42, LANG);
			} elseif($this->reste[1] == 'add-app') {
				$meta['title'] = translate(145, LANG).' - '.translate(40, LANG);
			} else {
				$meta['title'] = translate(145, LANG).' - '.translate(43, LANG);
			}
			$meta['desc'] = translate(125, LANG);
			$meta['keywords'] = translate(124, LANG);
			return $meta;
		}
}
?>