<?php

namespace App\Wine\Vendor;

use App\Wine\WineInterface;
use Sunra\PhpSimple\HtmlDomParser;
use Curl\Curl;

class NineCity implements WineInterface
{
    public function getPriceList($wineName)
    {
        $searchUrl = 'http://9city.com.tw/ajax_product_module_api.php?module_type=search_product&keyword=';
        $curl = new Curl();
        $curl->setopt(CURLOPT_HEADER, false);
        $curl->setopt(CURLOPT_USERAGENT, 'Google Bot');
        $curl->get($searchUrl.$wineName);
        $html = $curl->response;
        $dom = HtmlDomParser::str_get_html($html);
        $items = $dom->find('.product_box');
        $result = [];

        if (count($items) > 0) {
            foreach ($items as $item) {
                $priceItem = $item->find('[class^="product_item_price"]', 0);

                if ($priceItem) {
                    $price = $priceItem->plaintext;
                    $img = '<img src="'.$item->find('img', 0)->src.'">';
                    $url = $item->find('a', 0)->href;
                    $text = $item->find('a', 2)->plaintext;
                    $result[] = [
                        'img' => $img,
                        'vendorName' => '洋酒城',
                        'url' => $url,
                        'title' => $text.' NT$'.$price
                    ];
                }
            }
        }

        $dom->clear();
        $curl->close();

        return $result;
    }
}
