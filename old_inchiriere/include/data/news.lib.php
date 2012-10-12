<?php
function getNews($id=false, $limit=false, $count=false) {
	$db = new Db();
	if($id) {
		$q = "SELECT * FROM news WHERE id='".escape($id)."'";
		$db->query($q);
		$row = $db->getNextRow();
		$reData = $row;
	}
	if($limit) {
		$q = "SELECT * FROM news LIMIT".$limit." ORDER BY id DESC";
		$db->query($q);
		while($row = $db->getNextRow()) {
			$retData[] = $row;
		}
	}
	if(!$id && !$limit && !$count) {
		$q = "SELECT * FROM news ORDER BY id DESC";
		$db->query($q);
		while($row = $db->getNextRow()) {
			$retData[] = $row;
		}
	}
	if($count) {
		$q = "SELECT count(*) AS cnt FROM news";
		$db->query($q);
		$row = $db->getNextRow();
		$retData = $row['cnt'];
	}
	return $retData;
}
?>