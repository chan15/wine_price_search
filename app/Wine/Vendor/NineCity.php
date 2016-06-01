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
        $result = '';

        if (count($items) > 0) {
            foreach ($items as $item) {
                $priceItem = $item->find('[class^="product_item_price"]', 0);

                if ($priceItem) {
                    $price = $priceItem->plaintext;
                    $img = '<img src="'.$item->find('img', 0)->src.'">';
                    $url = $item->find('a', 0)->href;
                    $text = $item->find('a', 2)->plaintext;

                    $result .= '<li>';
                    $result .= '<div class="text-center">'.$img.'</div>';
                    $result .= '<h3>洋酒城</h3>';
                    $result .= '<p><a href="'.$url.'" target="_blank">'.$text.' NT$'.$price.'</a></p>';
                    $result .= '</li>';
                }
            }
        }

        $dom->clear();
        $curl->close();

        return $result;
    }
}
