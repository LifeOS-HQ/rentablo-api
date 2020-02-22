<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Dividends extends AbstractApi
{
    public function history(int $accountId, array $invenstmentIds, string $cutOffDate) : array
    {
        return $this->client->get('dividends/history', [
            'accountId' => $accountId,
            'investmentId' => $invenstmentIds,
            'cutoffDate' => $cutOffDate,
        ], [
            'debug' => $this->debug,
        ]);
    }
}