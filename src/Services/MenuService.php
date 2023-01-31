<?php

namespace Rakhasa\Lutility\Services;

use Illuminate\Database\Eloquent\Collection;

class MenuService
{
    /**
     * Get All Menu From Model
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return config('menu.model')::get();
    }

    /**
     * Get Authorized Menu
     *
     * @return Collection
     */
    public function getAuthorized(): Collection
    {
        if (!auth()->user()) {
            return collect([]);
        }

        return $this->getAll()->filter(function($item) {
            return auth()->user()->can($item->permission);
        });
    }

}
