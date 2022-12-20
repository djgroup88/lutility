<?php

namespace Rakhasa\LaravelUtility\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rakhasa\LaravelUtility\LaravelUtility
 */
class LaravelUtility extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rakhasa\LaravelUtility\LaravelUtility::class;
    }
}
