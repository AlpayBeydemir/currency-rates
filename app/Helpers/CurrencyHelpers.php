<?php

function normalizeCurrencyData($dataFromApi, $apiVersion): array
{
    $normalizedData = [];

    foreach ($dataFromApi as $currency) {

        if ($apiVersion == 1) {

            $normalizedData[] = [
                'symbol' => $currency['symbol'],
                'shortCode' => $currency['shortCode'],
                'fullName' => $currency['fullName'],
                'price' => $currency['price']
            ];
        }
        elseif ($apiVersion == 2) {

            $normalizedData[] = [
                'symbol' => $currency['symbol'],
                'shortCode' => $currency['shrtCode'],
                'fullName' => $currency['name'],
                'price' => $currency['amount']
            ];
        }
    }
    return $normalizedData;
}
