<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Funds extends AbstractApi
{
    public function get() : array
    {
        return $this->client->get('funds', [
            'isin' => 'DE0009848119',
        ]);
    }
}