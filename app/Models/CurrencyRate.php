<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    protected $table = 'currency_rates';

    public function format() : array
    {
        return [
            'from_code' => $this->fromCurrency->code,
            'to_code'   => $this->toCurrency->code,
            'value'     => $this->value
        ];
    }

    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class, 'from_currency_id');
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, 'to_currency_id');
    }
}
