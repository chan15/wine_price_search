<?php

namespace App\Wine\Vendor;

use App\Wine\WineInterface;
use Sunra\PhpSimple\HtmlDomParser;
use Curl\Curl;

class JiaPin implements WineInterface
{
    public $domain = 'http://www.top9.com.tw/';

    public function getPriceList($wineName)
    {
        $searchUrl = 'http://www.top9.com.tw/portal_c1_cnt.php?owner_num=c1_10868&button_num=c1';
        $curl = new Curl();
        $curl->setopt(CURLOPT_HEADER, false);
        $curl->setopt(CURLOPT_USERAGENT, 'Google Bot');
        $curl->post($searchUrl, [
            'search_word' => $wineName,
            'search_field' => 'all_field'
        ]);
        $html = $curl->response;
        $dom = HtmlDomParser::str_get_html($html);
        $items = $dom->find('.p_img');
        $result = [];

        if ($items) {
            foreach ($items as $item) {
                $url = $this->domain.$item->find('a', 0)->href;
                $r = $this->grabSubUrl($url);

                if (count($r) > 0) {
                    $result[] = $r;
                }
            }
        }

        $dom->clear();
        $curl->close();

        return $result;
    }

    public function grabSubUrl($url)
    {
        $curl = new Curl();
        $curl->setopt(CURLOPT_HEADER, false);
        $curl->setopt(CURLOPT_USERAGENT, 'Google Bot');
        $curl->get($url);
        $html = $curl->response;
        $result = [];

        $dom = HtmlDomParser::str_get_html($html);
        $priceItem = $dom->find('.red_f', 0);

        if ($priceItem) {
            $price = ' NT'.$priceItem->plaintext;
            $img = '<img src="'.$this->domain.$dom->find('.p_big', 0)->find('img', 0)->src.'">';
            $text = $dom->find('.np_title', 0)->plaintext;

            $result = [
                'img' => $img,
                'vendorName' => '珈品洋酒',
                'url' => $url,
                'title' => $text.$price
            ];
        }

        $dom->clear();
        $curl->close();

        return $result;
    }
}
