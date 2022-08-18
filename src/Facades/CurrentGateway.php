<?php

namespace JJSoftwareLtd\CurrentGateway\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JJSoftwareLtd\CurrentGateway\CurrentGatewayBase
 */
class CurrentGateway extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'current-gateway';
    }
}
