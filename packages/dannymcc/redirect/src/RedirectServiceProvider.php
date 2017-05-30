<?php

namespace Dannymcc\Redirect;

use Illuminate\Support\ServiceProvider;

class RedirectServiceProvider extends ServiceProvider{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/redirect.php' => config_path('redirect.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');

        // Register redirect middleware.
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        $kernel->pushMiddleware('Dannymcc\Redirect\RedirectMiddleware');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/redirect.php', 'redirect'
        );
    }
}