<?php

header('Content-Type: application/json; charset=utf-8');

ini_set('display_errors', 1);

include 'vendor/autoload.php';

use App\Wine\WineData;

$html = [];
$wineName = $_GET['wine_name'];
$sources = $_GET['source'];

foreach ($sources as $source) {
    $className = "App\\Wine\\Vendor\\$source";
    $wineData = new WineData(new $className());
    $html = array_merge($html, $wineData->getPriceList($wineName));
}

echo json_encode(compact('html'));
