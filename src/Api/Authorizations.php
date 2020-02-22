<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Authorizations extends AbstractApi
{
    public function get() : array
    {
        return $this->client->get('authorizations', [], [
            'debug' => $this->debug,
        ]);
    }

    public function secondFactor(string $secondFactor) : array
    {
        return $this->client->post('authorizations/secondFactor', '', [
            'query' => [
                'secondAuthenticationFactor' => $secondFactor,
            ],
            'debug' => $this->debug,
        ]);
    }
}