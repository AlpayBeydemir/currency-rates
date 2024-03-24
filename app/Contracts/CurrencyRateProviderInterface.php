<?php

namespace App\Contracts;

interface CurrencyRateProviderInterface
{
    public function getRates(): array;

    public function getUrl(): string;

    public function normalizeData($data): array;
}
