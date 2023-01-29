<?php

namespace Rakhasa\Lutility\Providers;

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
            \Rakhasa\Lutility\Contracts\Repositories\ProgressRepositoryContract::class,
            \Rakhasa\Lutility\Repositories\ProgressRepository::class
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
