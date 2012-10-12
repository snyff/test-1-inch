<?php
class GetClientContent extends Page{
		function buildContent() {
			$this->addBlock('Ajax/', 'GetClientContentBlock');
		}
		public function getMeta() {
		}
}
?>