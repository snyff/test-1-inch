<?php
@session_start();
require_once 'include/data/userOptions.lib.php';
class SubmitOptionsBlock extends Block {
	function buildContent() {
		$action 		= getStringFromRequest('action');
		$securityCode 	= getStringFromRequest('captcha');
		$allowedActions = array();
		$allowedActions[] = 'bug';
		$allowedActions[] = 'false_number';
		$allowedActions[] = 'improvement';
		
		if(!in_array($action, $allowedActions)) {
			echo "{'status':'0', 'error':'".translate(54, LANG, 'Parametru Gresit').".'}";
			die;
		}
		if($securityCode!=$_SESSION['security_code']) {
			echo "{'status':'0', 'error':'".translate(55, LANG, 'Cod Securitate Gresit').".'}";
			die;
		}
		if($action == 'bug') {
			$content = getStringFromRequest('content');
			if(trim($content) == "") {
				echo "{'status':'0', 'error':'".translate(56, LANG, 'Toate Cimpurile sint Obligatorii').".'}";
				die;
			}
			$rez = addBug($content);
		}
		if($action == 'false_number') {
			$name = getStringFromRequest('name');
			$number = getStringFromRequest('number');
			if(trim($name) == "" || trim($number) == "") {
				echo "{'status':'0', 'error':'".translate(56, LANG, 'Toate Cimpurile sint Obligatorii').".'}";
				die;
			}
			$rez = addFalseNumber($name, $number);
		}
		if($action == 'improvement') {
			$content = getStringFromRequest('content');
			if(trim($content) == "") {
				echo "{'status':'0', 'error':'".translate(56, LANG, 'Toate Cimpurile sint Obligatorii').".'}";
				die;
			}
			$rez = addImprovement($content);
		}
		echo "{'status':'1', 'error':'<center><div class=\"colorGreen textBold textSize15\" style=\"padding-top:20px; padding-bottom:20px\">".translate(57, LANG, 'Multumim pentru contribuirea Dvs').".<br /><a href=\"javascript:void(0);\" onClick=\"$(\'#optionsDiv\').remove();\">".translate(53, LANG, 'Inchide')."</a></div></center>'}";
		die;
	}
}
?>