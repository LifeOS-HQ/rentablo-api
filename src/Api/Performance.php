<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Performance extends AbstractApi
{
    public function absoluteReturn(int $id) : float
    {
        return $this->client->get('performance/absoluteReturn' . ($id ? '/' . $id : ''), [], [
            'debug' => $this->debug,
        ]);
    }

    public function depot(array $accountIds, string $startDate) : array
    {
        return $this->client->postJson('performance/depots', [
            'startDate' => $startDate,
            'accountIds' => $accountIds,
            'cachedQuotesOnly' => true,
            'cashFlowAndPerformanceStatisticsParamsList' => [
                [
                    'assetClasses' => [],
                    'includeCash' => false,
                    'includeDividends' => true,
                ],
            ],
        ], [
            'debug' => $this->debug,
        ]);
    }

    public function portfolio(int $accountId, string $startDate) : array
    {
        return $this->client->get('performance/portfolio', [
            'accountId' => $accountId,
            'startDate' => $startDate,
        ], [
            'debug' => $this->debug,
        ]);
    }
}