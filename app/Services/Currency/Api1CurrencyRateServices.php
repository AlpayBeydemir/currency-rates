<?php

namespace App\Services\Currency;

use App\Abstract\Currency\AbstractCurrencyService;

class Api1CurrencyRateServices extends AbstractCurrencyService
{
    public function normalizeData(): array
    {
        return array_map(function ($item) {
            return [
                'symbol' => $item['symbol'],
                'shortCode' => $item['shortCode'],
                'fullName' => $item['fullName'],
                'price' => $item['price']
            ];
        }, $this->data);
    }
}
