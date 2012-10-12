<?php
	require_once 'include/data/translations/translations.lib.php';
	require 'conf/constants.inc.php';
	require_once 'classes/Db.class.php';
	global $translationArray;
	$db = new Db();
	foreach($translationArray as $key => $value) {
		$q = "UPDATE translations SET RUS='".$translationArray[$key]['RUS']."' WHERE id='".$key."'";
		$db->query($q);
	}
?>