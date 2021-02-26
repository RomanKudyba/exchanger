<?php

namespace App\Services;

use App\Repositories\CurrencyRepoInterface;
use Illuminate\Database\Eloquent\Collection;

class CurrencyService
{
    private CurrencyRepoInterface $currencyRepo;
    public function __construct(CurrencyRepoInterface $currencyRepo)
    {
        $this->currencyRepo = $currencyRepo;
    }

    public function getAll() : Collection
    {
        return $this->currencyRepo->getAll();
    }
}
