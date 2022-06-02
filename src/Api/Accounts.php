<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Accounts extends AbstractApi
{
    public function cashFlows(int $id, string $interval = 'day') : array
    {
        return $this->client->get('accounts/cashFlows', [
            'id' => $id,
            'interval' => $interval,
        ], [
            'debug' => $this->debug,
        ]);
    }

    public function get(int $id = 0, array $filter = []) : array
    {
        return $this->client->get('accounts' . ($id ? '/' . $id : ''), $filter, [
            'debug' => $this->debug,
        ]);
    }

    public function valuation(int $id, bool $includeCash = false) : float
    {
        return $this->client->get('accounts/valuation', [
            'id' => $id,
            'includeCash' => $includeCash,
        ], [
            'debug' => $this->debug,
        ]);
    }
}