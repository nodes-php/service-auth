<?php

namespace Nodes\ServiceAuthenticator;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Nodes\ServiceAuthenticator\Console\Commands\CreateClient;
use Nodes\ServiceAuthenticator\Console\Commands\RefreshClients;

/**
 * Class ServiceProvider.
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
        // Config files
        $this->publishes([
            __DIR__.'/../config/service-authenticator.php' => config_path('nodes/service-authenticator.php'),
        ], 'config');

        // Route files
        $this->publishes([
            __DIR__.'/../routes' => base_path('project/Routes/ServiceAuthenticator'),
        ], 'routes');

        // Migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => base_path('database/migrations'),
        ], 'routes');
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
    }
}
