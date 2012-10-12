<?php
class Page{
	var $reste;
	var $profileInfo;
	var $blocks = array();
	public function addBlock($folder, $blockName, $otherParams = array()) {
		require './Blocks/'.$folder.$blockName.'.class.php';
		$obj = new $blockName($this, $otherParams);
		ob_start();
		$obj->getOutput();
		$this->content .= ob_get_contents();
		ob_end_clean();
		$GLOBALS['backtrace']->blocks[] = $blockName;
	}
	
	public function addText($text) {
		ob_start();
		echo $text;
		$this->content .= ob_get_contents();
		ob_end_clean();
	}
	public function getCodeReste() {
		if(!$this->reste) {
			$this->reste = getCodeReste($_GET['url_params']);
			unset($this->reste[0]);
			unset($this->reste[count($this->reste)]);
		}
		return $this->reste;
	}
	public function getMeta() {
		
	}
	public function buildOutput() {
		echo $this->content;
	}
}
?>