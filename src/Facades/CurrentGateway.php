<?php

namespace AudioJames\CurrentGateway\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AudioJames\CurrentGateway\CurrentGateway
 */
class CurrentGateway extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'current-gateway';
    }
}
