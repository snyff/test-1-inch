<?php

class InchiriereMap {

    private $server = 'live';
    
    public function __construct() {
        if($this->server == 'local') {
            $this->db_host = 'localhost';
            $this->db_user = 'root';
            $this->db_pass = 'mda';
            $this->db_db = 'inchiriere';
        } elseif($this->server == 'live') {
            $this->db_host = 'localhost';
            $this->db_user = 'itmarket_it';
            $this->db_pass = 'J@slwwa5';
            $this->db_db = 'itmarket_inchiriere';
        }
        
        mysql_connect($this->db_host, $this->db_user, $this->db_pass) or die('Db conn error.');
        mysql_select_db($this->db_db) or die('Db conn error.');
    }

    public function prepareAddress($address) {
        $address = str_replace(array('str.', 'strada', 'or', 'or.', 'chisinau'), '', $address);
        return $address;
    }
    
    public function getCoord($address) {
        $address = $this->prepareAddress($address);
        $return = array();
        $url = 'http://old.point.md/map/Map/SearchStreets/?q='.urlencode($address).'&page=1';
        $content = file_get_contents($url);
        
        preg_match("/lon='(\d+,\d+)'/", $content, $long_arr);
        if(!empty($long_arr)) {
            $return['long'] = $long_arr[1];
        }
        
        preg_match("/lat='(\d+,\d+)'/", $content, $lat_arr);
        if(!empty($lat_arr)) {
            $return['lat'] = $lat_arr[1];
        }
        
        return $return;
    }
    
    public function storeCoord($id, $coord) {
        $query = "UPDATE dau SET lat='".str_replace(',', '.', $coord['lat'])."', `llong`='".str_replace(',', '.', $coord['long'])."' WHERE id=".$id;
        mysql_query($query) or die('Q error1');
    }
    
    public function doJob() {
        $query = "SELECT id, address FROM dau WHERE (lat='' OR lat IS NULL) AND (`llong`='' OR `llong` IS NULL) AND address!=''";
        $res = mysql_query($query) or die('Q error');
        
        while ($row = mysql_fetch_assoc($res)) {
            $coord = $this->getCoord($row['address']);
            if(!empty($coord)) {
                $this->storeCoord($row['id'], $coord);
            }
        }
    }

}


$obj = new InchiriereMap();
$obj->doJob();