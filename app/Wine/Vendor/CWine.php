<?php

namespace App\Wine\Vendor;

use App\Wine\WineInterface;
use Sunra\PhpSimple\HtmlDomParser;
use Curl\Curl;

class CWine implements WineInterface
{
    public function getPriceList($wineName)
    {
        $searchUrl = 'http://www.ccwine.com.tw/advanced_search_result.php?keywords=';
        $curl = new Curl();
        $curl->setopt(CURLOPT_HEADER, false);
        $curl->setopt(CURLOPT_USERAGENT, 'Google Bot');
        $curl->get($searchUrl.urlencode(iconv('utf-8', 'big5', $wineName)));
        $html = $curl->response;
        $dom = HtmlDomParser::str_get_html($html);
        $domain = 'http://www.ccwine.com.tw/';
        $result = '';

        if ($dom->find('.productListing-data', 0)->plaintext !== '無符合搜尋條件的商品') {
            $items = $dom->find('.productListing-data');

            foreach ($items as $item) {
                if ($item->find('a', 1)) {
                    $text = $item->find('a', 1)->plaintext;

                    if (stristr($text, 'nt') !== false) {
                        $img = '<img src="'.$domain.$item->find('img', 0)->src.'">';
                        $url = $item->find('a', 0)->href;

                        $result .= '<li>';
                        $result .= '<div class="text-center">'.$img.'</div>';
                        $result .= '<h3>忠佳洋酒</h3>';
                        $result .= '<p><a href="'.$url.'" target="_blank">'.$text.'</a></p>';
                        $result .= '</li>';
                    }
                }
            }
        }

        $dom->clear();
        $curl->close();

        return $result;
    }
}
