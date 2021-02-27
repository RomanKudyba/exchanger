<?php

namespace App\Console\Commands;

use App\Services\CurrencyService;
use Illuminate\Console\Command;

class CurrencyList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get list of all active currencies to exchange';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private CurrencyService $currencyService;
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() : void
    {
        $currencies = $this->currencyService->getAll();
        $header = ['code', 'name', 'symbol'];

        $this->table($header, $currencies);
    }
}
