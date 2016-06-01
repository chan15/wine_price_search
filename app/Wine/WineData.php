<?php

namespace App\Wine;

use App\Wine\WineInterface;

class WineData
{

    public $wine;

    public function __construct(WineInterface $wine)
    {
        $this->wine = $wine;
    }

    public function getPriceList($wineName)
    {
        return $this->wine->getPriceList($wineName);
    }
}
