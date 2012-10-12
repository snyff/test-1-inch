<?php
class ProcessTellFriend extends Page{
		function buildContent() {
			$this->reste = &$this->getCodeReste();
			$this->addBlock('Subscribe/', 'TellFriendFinalBlock');
		}
		public function getMeta() {
		}
}
?>