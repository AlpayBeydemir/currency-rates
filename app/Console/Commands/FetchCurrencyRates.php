<?php

namespace App\Console\Commands;

use App\Models\CurrencyRatesModel;
use App\Services\Api1CurrencyRateProvider;
use App\Services\Api2CurrencyRateProvider;
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
                new Api1CurrencyRateProvider(),
                new Api2CurrencyRateProvider(),
            ];

            foreach ($providers as $provider) {

                $rates = $provider->getRates();
                $providerUrl = $provider->getUrl();
                $normalizedData = $provider->normalizeData($rates);

                foreach ($normalizedData as $data) {

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
