<?php

namespace App\Console\Commands;

use App\Models\CurrencyRatesModel;
use App\Services\Currency\Api1CurrencyRateServices;
use App\Services\Currency\Api2CurrencyRateServices;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'FetchCurrencyRatesCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch currency rates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $providers = [
                (new Api1CurrencyRateServices())->setUrl(config('constant.CURRENCY_API_URL_1')),
                (new Api2CurrencyRateServices())->setUrl(config('constant.CURRENCY_API_URL_2')),
            ];

            foreach ($providers as $provider) {

                $rates = $provider->getRates()->normalizeData();
                $providerUrl = $provider->getUrl();

                foreach ($rates as $data) {

                    $currency_rate = new CurrencyRatesModel();

                    $currency_rate->provider_url = $providerUrl;
                    $currency_rate->symbol = $data['symbol'];
                    $currency_rate->short_code = $data['shortCode'];
                    $currency_rate->full_name = $data['fullName'];
                    $currency_rate->price = $data['price'];

                    $currency_rate->save();
                }
            }

        } catch (\Exception $exception) {

            Log::error("An error occurred: " . $exception->getMessage());
            $this->error("An error occurred while executing the command: " . $exception->getMessage());

            return false;
        }

        return true;
    }
}
