<?php

namespace ConfrariaWeb\Dashboard\Providers;

use ConfrariaWeb\Dashboard\Contracts\DashboardContract;
use ConfrariaWeb\Dashboard\Repositories\DashboardRepository;
use ConfrariaWeb\Dashboard\Services\DashboardService;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../Databases/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'dashboard');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', 'dashboard');
        $this->publishes([__DIR__ . '/../../config/cw_dashboard.php' => config_path('cw_dashboard.php')], 'cw_dashboard');
    }

    public function register()
    {
        $this->app->bind(DashboardContract::class, DashboardRepository::class);
        $this->app->bind('DashboardService', function ($app) {
            return new DashboardService($app->make(DashboardContract::class));
        });
    }

}
