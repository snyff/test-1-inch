<?php
error_reporting(-1);
require_once 'ErrorHandler.class.php';
require_once 'Db.class.php';

$host_name = $_GET['host_name'];
$query = "SELECT * FROM crawler_settings WHERE host_name='" . addslashes($host_name) . "' ORDER BY id DESC LIMIT 1";


$result = Db::fetchOne($query);

$query = "SELECT * FROM keywords k LEFT JOIN browsers b ON k.browser_id = b.id WHERE k.settings_id=" . $result['id'];
$keywords = Db::fetchAll($query);

$cnt_keywords = count($keywords);
for($i=0;$i<$cnt_keywords;$i++) {
    unset($keywords[$i]['id'], $keywords[$i]['settings_id'], $keywords[$i]['browser_id']);
}

$array = array(
    'test_id' => $result['id'],
    'interval' => $result['interval'],
    'cycles' => $result['cycles'],
    'keywords' => $keywords
);

echo json_encode($array);