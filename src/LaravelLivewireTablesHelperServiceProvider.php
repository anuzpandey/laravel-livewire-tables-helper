<?php

namespace AnuzPandey\LaravelLivewireTablesHelper;

use AnuzPandey\LaravelLivewireTablesHelper\Commands\LaravelLivewireTablesHelperCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelLivewireTablesHelperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-livewire-tables-helper')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-livewire-tables-helper_table')
            ->hasCommand(LaravelLivewireTablesHelperCommand::class);
    }
}
