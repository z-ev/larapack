<?php

namespace Darkjinnee\Footing\Facades;

use Illuminate\Support\Facades\Facade;

class Footing extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'footing';
    }
}
