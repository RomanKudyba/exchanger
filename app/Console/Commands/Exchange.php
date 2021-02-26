<?php

namespace App\Console\Commands;

use App\Dtos\CurrencyExchangeDto;
use App\Services\CurrencyRateService;
use App\Services\CurrencyService;
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

        $sumAfterExchange = $this->currencyRateService->exchange(new CurrencyExchangeDto($currencyFromCode, $currencyToCode, $sum));
        $this->info('sum after exchange is: ' . $sumAfterExchange);
    }
}
