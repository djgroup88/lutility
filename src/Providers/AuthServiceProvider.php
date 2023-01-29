<?php

namespace Rakhasa\Lutility\Providers;

use Rakhasa\Lutility\Models\BasePermission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Foundation\Auth\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (BasePermission::all() as $permission) {

            foreach ($permission->actions as $action) {
                Gate::define("{$action}-{$permission->name}", function (User $user) use ($permission, $action) {
                    return $user->role->hasPermissionTo($permission->name, $action);
                });
            }

        }
    }
}
