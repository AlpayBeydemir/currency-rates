<?php

namespace App\Services;

use App\Contracts\CurrencyRateProviderInterface;
use Illuminate\Support\Facades\Http;

class Api1CurrencyRateProvider implements CurrencyRateProviderInterface
{
    protected $url;
    public function __construct()
    {
        $this->url = config('constant.CURRENCY_API_URL_1');
    }
    public function getRates(): array
    {
        $response = Http::get($this->url);

        return $response->json();
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function normalizeData($data): array
    {
        return array_map(function ($item) {
            return [
                'symbol' => $item['symbol'],
                'shortCode' => $item['shortCode'],
                'fullName' => $item['fullName'],
                'price' => $item['price']
            ];
        }, $data['data']);
    }
}
