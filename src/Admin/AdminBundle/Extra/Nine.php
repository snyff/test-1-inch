<?php

namespace Admin\AdminBundle\Extra;
use Admin\AdminBundle\Extra\dom_parser\simple_html_dom;

class Nine {

    protected $url = 'http://999.md/list/list.ashx?categoryId=1404&hash=%253BIMB_REGS%253D1%253BIMB_OFFTYPE%253D8&page=1&perPage=50&regionId=0';
    protected $details_url = 'http://999.md/Board/Message.aspx?MsgID=';
    protected $sectoare_slug = array(
        'Центр' => '1',
        'Рышкановка' => '2',
        'Чокана' => '3',
        'Буюканы' => '4',
        'Ботаника' => '5',
        'Старая Почта' => '6',
        'Телецентр' => '7',
        'Аэропорт' => '8',
        'Скулень' => '9',
        'Дурлешты' => '10',
    );

    protected function __request($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.7) Gecko/20091221 Firefox/3.5.7");

        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function getAnnData($id) {
        $return = array();
        $data = $this->__request($this->details_url.$id);
        $dom_parser_html = new simple_html_dom($data);
        
        foreach ($dom_parser_html->find('div[class=sub_h] span a') as $a_element) {
            $return['username'] = $a_element->innertext;
            break;
        }
        
        preg_match('/(\d+)-х комнатная квартира/', $data, $matches);
        if(isset($matches[1])) {
            $return['nr_rooms'] = $matches[1];
        } else {
            $return['nr_rooms'] = 1;
        }
        
        preg_match('/<span.*>этаж.*(\d+)<\/td>/', $data, $matches);
        if(isset($matches[1])) {
            $return['floor'] = $matches[1];
        } else {
            $return['floor'] = 0;
        }
        
        preg_match_all('/<span style="color: #000000; font-size: 21px; font-weight: bold;">(\d+)<\/span>/', $data, $matches);
        if(isset($matches[1])) {
            $return['phones'] = $matches[1];
        } else {
            $return['phones'] = NULL;
        }
        
        preg_match('/<span style="color: #000000; font-size: 21px; font-weight: bold;">.*\((.*)\)(.*)<\/span>/', $data, $matches);
        if(isset($matches[1])) {
            $return['sector'] = $this->sectoare_slug[$matches[1]];
        } else {
            $return['sector'] = NULL;
        }
        if(isset($matches[2])) {
            $return['address'] = $matches[2];
        } else {
            $return['address'] = NULL;
        }
                
        return $return;
    }
    
    public function getAnnouncements($ids = array()) {
        $data = $this->__request($this->url);
        $data = preg_replace('/\t/', ' ', $data);
        
        $json = json_decode($data, true);
        $json = $json['page'];
        $cnt = count($json);
        for ($i = 0; $i < $cnt; $i++) {
            $json[$i]['date'] = substr($json[$i]['date'], 0, strlen($json[$i]['date'])-3);
            if(date('Ymd', $json[$i]['date']) != date('Ymd')) {
                unset($json[$i]);
            } elseif($json[$i]['currency'] != 'EUR') {
                unset($json[$i]);
            } elseif(in_array($json[$i]['id'], $ids)) {
                unset($json[$i]);
            }
        }
        
        return $json;
    }

}