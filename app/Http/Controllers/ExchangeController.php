<?php

namespace App\Http\Controllers;

use App\Currency;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function getExchangeRate(Request $request)
    {
        $request->only(['from', 'to', 'amount']);
        $inputs = $request->all();
        $from = $inputs['from'];
        $to = $inputs['to'];
        $amount = $inputs['amount'];

        $fromCurrency = Currency::where('code', '=',  $from)->first();
        $toCurrency = Currency::where('code', '=',  $to)->first();
        if ($fromCurrency && $toCurrency) {
            if ($fromCurrency->base_currency_rate <= 0) {
                $baseCurrencyAmount = $amount;
            } else {
                $baseCurrencyAmount = $amount * $fromCurrency->base_currency_rate;
            }
            if ($toCurrency->base_currency_rate <= 0) {
                $exchangedCurrencyAmount = $baseCurrencyAmount;
            } else {
                $exchangedCurrencyAmount = $baseCurrencyAmount * $toCurrency->base_currency_rate;
            }
            return redirect()->back()->with('message', 'Exchange Value is:'. $exchangedCurrencyAmount);
        }
        return redirect()->back()->withErrors(['Invalid Input']);
    }
}
