<?php

session_start();
error_reporting(0);
class Makler {
    const REF = 'http://makler.md';
    const COOKIE = "cookie_makler.txt";
    const URL = 'http://makler.md/chisinau/nedvizhimosti/arenda-nedvizhimosti/nedvizhimosti-sdaju/kvartiry-komnaty/ryshkani?orderBy=date_desc&page=1&showType=ALL_VIEW&pageSize=50';
    const PATTERN = '/<a id="(w[^"]*)" class="withTooltip" [^>]*>([^<]*<span [^>]*>[^<]*<\/span>[^<]*<em>([^<]*)<\/em>[^<]*)<\/a>/';

    public function getPageContent() {
        $result = file_get_contents(self::URL);
        $result = str_replace("\r\n", '', $result);
        preg_match_all(self::PATTERN, $result, $matches);
//        echo('<pre>');
//        print_r($matches);
        return $matches;
    }

}

$makler = new Makler();
$result_array = $makler->getPageContent();
$cnt = count($result_array[1]);
$return_array = array();
for ($i = 0; $i < $cnt; $i++) {
    if (@!in_array($result_array[1][$i], $_SESSION['ann'])) {
        $_SESSION['ann'][] = $result_array[1][$i];
        $return_array['annonce'][] = strip_tags($result_array[0][$i]);
    }
}
echo json_encode($return_array);