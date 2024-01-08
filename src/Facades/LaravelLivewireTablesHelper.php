<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AnuzPandey\LaravelLivewireTablesHelper\LaravelLivewireTablesHelper
 */
class LaravelLivewireTablesHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AnuzPandey\LaravelLivewireTablesHelper\LaravelLivewireTablesHelper::class;
    }
}
