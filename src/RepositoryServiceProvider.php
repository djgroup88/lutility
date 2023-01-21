<?php

namespace Rakhasa\LaravelUtility;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Progress Repository
         */
        $this->app->bind(
            \Rakhasa\LaravelUtility\Contracts\Repositories\ProgressRepositoryContract::class,
            \Rakhasa\LaravelUtility\Repositories\ProgressRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
