<?php

namespace Rakhasa\LaravelUtility\Models;

use Illuminate\Database\Eloquent\Model;

class BasePermission extends Model
{
    use \Sushi\Sushi;

    /**
     * Model Schema
     *
     * @var array
     */
    protected $schema = [
        'id' => 'integer',
        'name' => 'string',
        'alias' => 'string',
        'actions' => 'json'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'actions' => 'array'
    ];

    /**
     * Source Rows Data
     *
     * @return void
     */
    public function getRows()
    {
        return collect(config('permission.permission.list'))->map(function($item) {
            $item['actions'] = json_encode($item['actions']);
            return $item;
        })->toArray();
    }
}
