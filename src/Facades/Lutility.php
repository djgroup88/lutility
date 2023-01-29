<?php

namespace Rakhasa\Lutility\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rakhasa\Lutility\Lutility
 */
class Lutility extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rakhasa\Lutility\Lutility::class;
    }
}
