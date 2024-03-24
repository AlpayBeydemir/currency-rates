<?php

namespace App\Abstract\Currency;
use App\Interfaces\CurrencyRateInterface;
use Illuminate\Support\Facades\Http;

abstract class AbstractCurrencyService implements CurrencyRateInterface
{
    protected string $url;

    protected array $data;

    /**
     * @throws \Exception
     */
    public function getRates(): self
    {
        $response = Http::get($this->url);

        if ($response->failed()) {
            throw new \Exception("Failed to fetch data from " . $this->url);
        }

        $this->data = $response->json()['data'];

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    abstract function normalizeData(): array;
}
