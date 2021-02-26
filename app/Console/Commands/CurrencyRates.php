<?php

namespace App\Console\Commands;

use App\Services\CurrencyRateService;
use Illuminate\Console\Command;

class CurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get available currency rates';

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
        $currencyRates = $this->currencyRateService->getAll();
        $header = ['Code from', 'Code to', 'Exchange rate'];

        $this->table($header, $currencyRates);
    }
}
