<?php
    $rand = $_GET['rand'];
    $lastId = @$_GET['lastId'];
    if(!$lastId) {
        $lastId = false;
    } else {
        $lastId = '&lastId='.$lastId;
    }
    $culture = $_GET['culture'];
    $content = file_get_contents('http://999.md/last/last.json?rand='.$rand.''.$lastId.'&culture='.$culture);
    die($content);

?>
