<?php
require_once 'Db.class.php';
require_once 'ErrorHandler.class.php';

$params_json = $_POST['params'];
$params = json_decode(stripslashes($params_json));

$q = "INSERT INTO seo_stats(start_time, end_time, `interval`, cnt_keywords, nr_requests_made, host_name, test_id, last_html, added)
    VALUES('".$params->start_time."', '".$params->end_time."', '".$params->interval."', '".$params->cnt_keywords."', '".$params->nr_requests_made."', '".$params->host_name."', '".$params->test_id."', '".addslashes($params->last_html)."',NOW())";

Db::query($q);

echo 'ok';