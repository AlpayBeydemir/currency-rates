<?php

namespace App\Services\Currency;

use App\Abstract\Currency\AbstractCurrencyService;

class Api2CurrencyRateServices extends AbstractCurrencyService
{
    public function normalizeData(): array
    {
        return array_map(function ($item) {
            return [
                'symbol' => $item['symbol'],
                'shortCode' => $item['shrtCode'],
                'fullName' => $item['name'],
                'price' => $item['amount']
            ];
        }, $this->data);
    }
}
