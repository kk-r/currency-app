<?php

use Illuminate\Database\Seeder;

class CurrenciesGenerate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents('https://gist.githubusercontent.com/Fluidbyte/2973986/raw/b0d1722b04b0a737aade2ce6e055263625a0b435/Common-Currency.json');
        $currencies = json_decode($data, true);
        $baseCurrency = 'USD';
        $exchangeApi = 'https://api.fixer.io/latest?base='.$baseCurrency.'&symbols=';

        foreach ($currencies as $key => $currency) {
            $exchangeRate = json_decode(file_get_contents($exchangeApi. $currency['code']), true);
            $baseExchangeRate = array_get( $exchangeRate['rates'] , $currency['code'], 0);
            $newCurrency = \App\Currency::firstOrNew([
                'symbol' 			=> $currency['symbol'],
            ]);
            $newCurrency->name = $currency['name'];
            $newCurrency->symbol_native = $currency['symbol_native'];
            $newCurrency->decimal_digits = $currency['decimal_digits'];
            $newCurrency->rounding = $currency['rounding'];
            $newCurrency->code = $currency['code'];
            $newCurrency->name_plural = $currency['name_plural'];
            $newCurrency->base_currency_rate =$baseExchangeRate;
            $newCurrency->save();
        }
    }
}
