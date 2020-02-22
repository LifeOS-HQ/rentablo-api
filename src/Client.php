<?php

namespace Dasumi\Rentablo;

class Client extends \Dasumi\BaseApiWrapper\Client
{
    protected function pathPrefix() : string
    {
        return 'api/v1/';
    }
}