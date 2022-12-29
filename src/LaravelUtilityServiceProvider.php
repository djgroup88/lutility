<?php

namespace Rakhasa\LaravelUtility;

use Spatie\LaravelPackageTools\Package;
use Rakhasa\LaravelUtility\RepositoryServiceProvider;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rakhasa\LaravelUtility\Commands\LaravelUtilityCommand;
use Rakhasa\LaravelUtility\Commands\MakeRepositoryCommand;
use Rakhasa\LaravelUtility\Commands\MakeServiceCommand;

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
            ->hasTranslations()
            ->hasMigration('create_laravel-utility_table')
            ->hasCommands([LaravelUtilityCommand::class, MakeRepositoryCommand::class, MakeServiceCommand::class]);
    }

    public function register()
    {
        parent::register();

        $this->app->register(RepositoryServiceProvider::class);
    }
}
