<?php


namespace App\Providers;


use App\Repositories\Impl\CurrencyRateRepo;
use App\Repositories\CurrencyRateRepoInterface;
use App\Repositories\Impl\CurrencyRepo;
use App\Repositories\CurrencyRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CurrencyRateRepoInterface::class, CurrencyRateRepo::class);
        $this->app->bind(CurrencyRepoInterface::class, CurrencyRepo::class);
    }
}
