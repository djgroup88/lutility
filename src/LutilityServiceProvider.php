<?php

namespace Rakhasa\Lutility;

use Spatie\LaravelPackageTools\Package;
use Rakhasa\Lutility\Commands\MakeServiceCommand;
use Rakhasa\Lutility\Commands\SyncSettingCommand;
use Rakhasa\Lutility\Commands\ProgressClearComamnd;
use Rakhasa\Lutility\Commands\MakeRepositoryCommand;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LutilityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lutility')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations(['create_roles_table', 'create_permissions_table', 'create_files_table', 'create_settings_table'])
            ->hasCommands([MakeRepositoryCommand::class, MakeServiceCommand::class, SyncSettingCommand::class, ProgressClearComamnd::class]);
    }

    public function register()
    {
        parent::register();
    }
}
