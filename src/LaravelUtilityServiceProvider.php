<?php

namespace Rakhasa\LaravelUtility;

use Rakhasa\LaravelUtility\Commands\MakeRepositoryCommand;
use Rakhasa\LaravelUtility\Commands\MakeServiceCommand;
use Rakhasa\LaravelUtility\Commands\SyncSettingCommand;
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
            ->hasConfigFile('setting')
            ->hasConfigFile('permission')
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations(['create_roles_table', 'create_permissions_table', 'create_files_table', 'create_settings_table'])
            ->hasCommands([MakeRepositoryCommand::class, MakeServiceCommand::class, SyncSettingCommand::class]);
    }

    public function register()
    {
        parent::register();
    }
}
