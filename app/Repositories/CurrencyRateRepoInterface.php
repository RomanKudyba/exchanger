<?php

namespace App\Repositories;

use App\Dtos\CurrencyExchangeDto;

interface CurrencyRateRepoInterface extends BaseRepoInterface
{
    public function exchange(CurrencyExchangeDto $currencyExchangeDto): float;
}
