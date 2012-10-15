<?php

namespace Dau\DauBundle\Extension;

class WebsiteExtension extends \Twig_Extension {

    public function getFilters() {
        return array(
            'truncate' => new \Twig_Filter_Method($this, 'truncate'),
            'no_title' => new \Twig_Filter_Method($this, 'no_title'),
            'nl2br' => new \Twig_Filter_Method($this, 'nl2br'),
            'days_ago' => new \Twig_Filter_Method($this, 'days_ago'),
            'stripslashes' => new \Twig_Filter_Method($this, 'stripslashes'),
            'filter_fix' => new \Twig_Filter_Method($this, 'filter_fix'),
            'filter_mobil' => new \Twig_Filter_Method($this, 'filter_mobil'),
        );
    }

    public function filter_fix($content) {
        $return = $content;
        if(strlen($content) == 6) { // a introdus fara cod
            $return = '022'.$content;
        } elseif(strlen($content) == 8) { // a introdus toate cifrele in afara de 0
            $return = '0'.$content;
        }
        return $return;
    }

    public function filter_mobil($content) {
        $return = $content;
        if(strlen($content) == 8) { // a introdus fara cod
            $return = '0'.$content;
        }
        return $return;
    }
    
    public function stripslashes($content) {
        return str_replace('\\', '', $content);
    }
    
    public function days_ago($date) {
        $timestamp = strtotime($date);
        $now = time();
        $diff = $now-$timestamp;
        $days = $diff/60/60/24;
        if(floor($days) == 1) {
            $ret = 'Ieri';
        } elseif(floor($days) > 1) {
            $ret = floor($days).' zile in urma';
        } elseif(floor($days) == 0) {
            $hours = $diff/60/60;
            if(floor($hours) == 1) {
                $ret = 'acum o ora';
            } elseif(floor($hours) > 1) {
                $ret = 'acum '.floor($hours).' ore';
            } elseif(floor($hours) == 0) {
                $minutes = $diff/60;
                if(floor($minutes) == 1) {
                    $ret = 'acum o minuta';
                } elseif(floor($minutes) > 1) {
                    $ret = 'acum '.floor($minutes).' minute';
                } elseif(floor($minutes) == 0) {
                    $ret = 'acum '.$diff.' secunde';
                }
            }
            
        }
        return $ret;
    }

    public function no_title($sentence) {
        return strlen($sentence)==0?'No title':$sentence;
    }

    public function nl2br($content) {
        return nl2br($content);
    }

    public function truncate($sentence, $start, $end, $concat = null) {
        if(\strlen($sentence)>=$end) {
            $return = mb_substr($sentence, $start, $end, 'utf-8').$concat;
        } else {
            $return = $sentence;
        }
        return $return;
    }

    public function getName() {
        return 'website_extension';
    }

}