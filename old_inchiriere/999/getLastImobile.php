<?php
session_start();
error_reporting(0);
class ThreeNine {
    const URL = 'http://999.md/Board/All.aspx/GetImbFilterResultByHash';
    const REF = 'http://999.md/Board/All.aspx?catId=1404';
    const COOKIE = "cookie_imobile.txt";
    const QUERY_STRING = '{"catId":1404,"pageNo":0,"showMode":"SHORT","locationHash":"#IMB_SUBCATS=334;IMB_SECS=2;IMB_OFFTYPE=8"}';
//    const PATTERN = '/<a .* href="([^"]*)" id="(tit_[^"]*)">([^<]*)<\/a>/';
    const PATTERN = "/<a id='(tit_[^']*)' href='([^']*)'[^>]*  [^>]*>([^<]*)<\/a>/i";

    public function __construct() {
        $this->headers = array(
            "Content-Type: application/json; charset=utf-8",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            "Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7",
            "Accept-Language: ru,en-us;q=0.7,en;q=0.3",
            "Connection: keep-alive",
            "Keep-Alive: 300",
            "CACHE_CONTROL: max-age=0"
        );
    }

    private function __executeCURL($url, $query_string) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.2.22) Gecko/20110905 Ubuntu/10.04 (lucid) Firefox/3.6.22 GTB7.1");
        curl_setopt($ch, CURLOPT_REFERER, self::REF);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, self::COOKIE);
        curl_setopt($ch, CURLOPT_COOKIEFILE, self::COOKIE);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function getContent() {
        $result = $this->__executeCURL(self::URL, self::QUERY_STRING);
        $json_decode = json_decode($result, true);
        $data = str_replace("\r\n", '', $json_decode['d'][1]);
        preg_match_all(self::PATTERN, $data, $mathes);
        return $mathes;
    }

}

$obj = new ThreeNine();
$content = $obj->getContent();

$return_array = array();
$j = 0;
$cnt = count($content[1]);
for($i=0;$i<$cnt;$i++) {
    if(!in_array($content[1][$i], $_SESSION['ann'])) {
        $j++;
        $_SESSION['ann'][] = $content[1][$i];
        $return_array[$j]['url'] = $content[2][$i];
        $return_array[$j]['title'] = $content[3][$i];
    }
}
echo json_encode($return_array);
//unset($_SESSION['ann']);