<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRatesModel;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{
    public function index()
    {
        $title = 'Cheapest Currencies';
        $currencies = CurrencyRatesModel::get()->pluck('short_code')->unique();

        $cheapestRates = collect($currencies)->mapWithKeys(function ($currency) {
            $cheapestRate = CurrencyRatesModel::where('short_code', $currency)->orderBy('price', 'ASC')->first();

            return [$currency => $cheapestRate];
        });

        $cheapestCurrency = CurrencyRatesModel::orderBy('price', 'ASC')->first();

        return view('welcome', compact('cheapestRates', 'title', 'cheapestCurrency'));
    }
}
