<?php

namespace OnDezk\Estimate\App\Providers;

use Illuminate\Support\ServiceProvider;
use OnDezk\Estimate\Console\InstallCommand;
use OnDezk\Estimate\Console\UninstallCommand;
use OnDezk\Estimate\Console\UpdateCommand;

class EstimateServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->publishes([
            __DIR__ . '/../../public/assets' => public_path('vendor/estimate')
        ], 'estimate-assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            InstallCommand::class,
            UpdateCommand::class,
            UninstallCommand::class,
        ]);
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'estimate');
    }

}
