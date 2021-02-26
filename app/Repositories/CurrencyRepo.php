<?php


namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepo implements CurrencyRepoInterface
{
    private Currency $model;
    public function __construct(Currency $currencyModel)
    {
        $this->model = $currencyModel;
    }

    public function getAll() : Collection
    {
        return $this->model->select($this->model->fieldsToShow)->get();
    }
}
