<?php

namespace App\Services;

use App\Dtos\CurrencyExchangeDto;
use App\Repositories\CurrencyRateRepoInterface;
use Illuminate\Support\Collection;

class CurrencyRateService
{
    private CurrencyRateRepoInterface $currencyRateRepo;
    public function __construct(CurrencyRateRepoInterface $currencyRateRepo)
    {
        $this->currencyRateRepo = $currencyRateRepo;
    }

    public function getAll() : Collection
    {
        return $this->currencyRateRepo->getAll();
    }

    public function exchange(CurrencyExchangeDto $currencyExchangeDto) : float
    {
        return $this->currencyRateRepo->exchange($currencyExchangeDto);
    }
}
