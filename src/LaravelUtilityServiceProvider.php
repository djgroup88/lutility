<?php

namespace Rakhasa\LaravelUtility;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rakhasa\LaravelUtility\Commands\LaravelUtilityCommand;

class LaravelUtilityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-utility')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-utility_table')
            ->hasCommand(LaravelUtilityCommand::class);
    }
}
