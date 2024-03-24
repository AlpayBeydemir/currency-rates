<?php

namespace App\Interfaces;

interface CurrencyRateInterface
{
    public function getRates(): self;

    public function getUrl(): string;
    public function setUrl(string $url): self;

    public function normalizeData(): array;
}
