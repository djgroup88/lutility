<?php

namespace Rakhasa\LaravelUtility\Concerns;

trait HasPermissions
{
    /**
     * Get Permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(config('permission.permission.model'));
    }

    /**
     * Update Permission
     *
     * @param string $name
     * @param string $action
     * @param boolean $value
     * @return void
     */
    public function updatePermission(string $name, string $action, bool $value): void
    {
        $this->permissions()->updateOrCreate([
            'name' => $name
        ], [
            $action => $value
        ]);
    }

    /**
     * Give Specific Permission Action
     *
     * @param string $name
     * @param string $action
     * @return void
     */
    public function givePermissionTo(string $name, string $action): void
    {
        $this->updatePermission($name, $action, true);
    }

    /**
     * Revoke Specific Permission Action
     *
     * @param string $name
     * @param string $action
     * @return void
     */
    public function revokePermissionTo(string $name, string $action): void
    {
        $this->updatePermission($name, $action, false);
    }

    /**
     * Sync Permission
     *
     * @param string $name
     * @param array $actions
     * @return void
     */
    public function syncPermission(string $name, array $actions): void
    {
        foreach ($actions as $action => $value) {
            $this->updatePermission($name, $action, $value);
        }
    }

    /**
     * Sync Permissions
     *
     * @param array $permissions
     * @return void
     */
    public function syncPermissions(array $permissions): void
    {
        foreach ($permissions as $permission) {
            $this->syncPermission($permission['permission'], $permission['actions']);
        }
    }
}
