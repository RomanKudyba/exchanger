<?php

namespace App\Console\Commands;

use App\Dtos\CurrencyExchangeDto;
use App\Exceptions\CurrencyException;
use App\Services\CurrencyRateService;
use Illuminate\Console\Command;

class Exchange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:exchange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Currency exchange';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private CurrencyRateService $currencyRateService;
    public function __construct(CurrencyRateService $currencyRateService)
    {
        $this->currencyRateService = $currencyRateService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currencyFromCode = $this->ask('Put currency code from');
        $currencyToCode = $this->ask('Put currency code to');
        $sum = $this->ask('Put sum to exchange');

        if (!$currencyFromCode || !is_string($currencyFromCode)) {
            $this->error('Bad currency from');die();
        }

        if (!$currencyToCode || !is_string($currencyToCode)) {
            $this->error('Bad currency to');die();
        }

        if (!$sum || !is_numeric($sum)) {
            $this->error('Bad sum');die();
        }

        try {
            $sumAfterExchange = $this->currencyRateService->exchange(new CurrencyExchangeDto($currencyFromCode, $currencyToCode, $sum));
            $this->info('Sum after exchange is: ' . $sumAfterExchange);
        } catch (CurrencyException $e) {
            $this->error($e->getMessage());
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
