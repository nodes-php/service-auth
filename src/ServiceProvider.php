<?php

namespace Nodes\ServiceAuthenticator;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Nodes\ServiceAuthenticator\Console\Commands\CreateClient;
use Nodes\ServiceAuthenticator\Console\Commands\RefreshClients;

/**
 * Class ServiceProvider
 *
 * @package Nodes\ServiceAuthenticator
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(CreateClient::class);
        $this->commands(RefreshClients::class);

        // Figure out how routes we can register the route
//        include $itemPath;
    }
}
