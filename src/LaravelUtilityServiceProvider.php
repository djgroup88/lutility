<?php

namespace Rakhasa\LaravelUtility;

use Rakhasa\LaravelUtility\Commands\LaravelUtilityCommand;
use Rakhasa\LaravelUtility\Commands\MakeRepositoryCommand;
use Rakhasa\LaravelUtility\Commands\MakeServiceCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasMigration('create_files_table')
            ->hasCommands([LaravelUtilityCommand::class, MakeRepositoryCommand::class, MakeServiceCommand::class]);
    }

    public function register()
    {
        parent::register();
    }
}
