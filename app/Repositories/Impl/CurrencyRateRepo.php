<?php


namespace App\Repositories\Impl;

use App\Dtos\CurrencyExchangeDto;
use App\Exceptions\CurrencyException;
use App\Models\Currency;
use App\Models\CurrencyRate;
use App\Repositories\CurrencyRateRepoInterface;
use Illuminate\Support\Collection;

class CurrencyRateRepo implements CurrencyRateRepoInterface
{
    private CurrencyRate $model;
    public function __construct(CurrencyRate $currencyRateModel) {
        $this->model = $currencyRateModel;
    }

    public function getAll() : Collection
    {
        return $this->model
            ->with(['fromCurrency', 'toCurrency'])->get()->map->format();
    }

    public function exchange(CurrencyExchangeDto $currencyExchangeDto) : float
    {
        $currencyFrom = Currency::where('code', strtoupper($currencyExchangeDto->getCurrencyFromCode()))
            ->first();
        if (!$currencyFrom) {
            throw new CurrencyException('currency from not found',404);
        }

        $currencyTo = Currency::where('code', strtoupper($currencyExchangeDto->getCurrencyToCode()))
            ->first();
        if (!$currencyTo) {
            throw new CurrencyException('currency to not found',404);
        }

        if ($currencyFrom == $currencyTo) {
            return $currencyExchangeDto->getSum();
        }

        $currencyRate = $this->model
            ->where('from_currency_id', $currencyFrom->id)
            ->where('to_currency_id', $currencyTo->id)
            ->first();
        if (!$currencyRate) {
            throw new CurrencyException('Currency rate from '.$currencyFrom->code.' to '.$currencyTo->code.' not found', 404);
        }

        return $currencyRate['value'] * $currencyExchangeDto->getSum();
    }
}
