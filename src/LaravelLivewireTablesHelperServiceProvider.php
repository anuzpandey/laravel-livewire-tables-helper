<?php

namespace AnuzPandey\LaravelLivewireTablesHelper;

use AnuzPandey\LaravelLivewireTablesHelper\Commands\LaravelLivewireTablesHelperCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelLivewireTablesHelperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-livewire-tables-helper')
            ->hasViews();
    }
}
