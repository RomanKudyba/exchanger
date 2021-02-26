<?php

namespace App\Dtos;

class CurrencyExchangeDto {
    private String $currencyFromCode;
    private String $currencyToCode;
    private float $sum;


    public function __construct(String $currencyFromCode, String $currencyToCode, float $sum) {
        $this->currencyFromCode = $currencyFromCode;
        $this->currencyToCode = $currencyToCode;
        $this->sum = $sum;
    }

    public function getCurrencyFromCode() : String {
        return $this->currencyFromCode;
    }

    public function getCurrencyToCode() : String {
        return $this->currencyToCode;
    }

    public function getSum() : float {
        return $this->sum;
    }
}
