<?php
class Translations {
	public function storeTranslations() {
		$db = new Db();
		$db->query("SELECT * FROM translations");
		while($row = $db->getNextRow()) {
			$transArr[$row['id']]['ENG'] = $row['ENG'];
			$transArr[$row['id']]['ROM'] = $row['ROM'];
			$transArr[$row['id']]['RUS'] = $row['RUS'];
		}
		$fp = fopen('./include/data/translations/translations.lib.php', 'w');
		fwrite($fp, '<?php'."\n");
		foreach($transArr as $key => $value) {
			$arr = '$translationArray['.$key.']'.'[\'ENG\']=\''.$transArr[$key]['ENG'].'\';'."\n";
			fwrite($fp, $arr);
			$arr = '$translationArray['.$key.']'.'[\'ROM\']=\''.$transArr[$key]['ROM'].'\';'."\n";
			fwrite($fp, $arr);
			$arr = '$translationArray['.$key.']'.'[\'RUS\']=\''.$transArr[$key]['RUS'].'\';'."\n";
			fwrite($fp, $arr);
		}
		fwrite($fp, "\n".'?>');
		fclose($fp);
	}
}
?>