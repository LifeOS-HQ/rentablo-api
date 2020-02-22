<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Performance extends AbstractApi
{
    public function absoluteReturn(int $id) : array
    {
        return $this->client->get('performance/absoluteReturn' . ($id ? '/' . $id : ''), [], [
            'debug' => $this->debug,
        ]);
    }
}