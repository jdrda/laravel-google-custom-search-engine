<?php

namespace JanDrda\LaravelGoogleCustomSearchEngine;

use Illuminate\Support\ServiceProvider;

class LaravelGoogleCustomSearchEngineProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/laravelGoogleCustomSearchEngine.php' => config_path('laravelGoogleCustomSearchEngine.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('laravelGoogleCustomSearchEngine', function () {

            return new LaravelGoogleCustomSearchEngine(config('laravelGoogleCustomSearchEngine.engineId'),
                config('laravelGoogleCustomSearchEngine.apiKey'));
        });
    }
}
