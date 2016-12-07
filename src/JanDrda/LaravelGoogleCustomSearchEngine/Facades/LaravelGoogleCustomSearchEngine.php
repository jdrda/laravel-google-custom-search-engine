<?php

namespace JanDrda\LaravelGoogleCustomSearchEngine\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleCustomSearchEngine extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelGoogleCustomSearchEngine';
    }
}
