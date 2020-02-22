<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Investments extends AbstractApi
{
    public function search(int $accountId) : array
    {
        return $this->client->get('investments', [
            'accountId' => $accountId,
            // 'currency' => 'EUR',
            // 'id' => [],
            // 'includeHistoric' => false,
            // 'industryId' => [],
            // 'isin' => [],
            // 'name' => '',
            // 'order' => 'id asc',
            // 'page' => 1,
            // 'perPage' => 500,
            // 'positiveAmountOrLastTransactionAfter' => '',
            // 'regionId' => [],
            // 'tickerSymbol' => [],
            // 'wkn' => [],

        ], [
            'debug' => $this->debug,
        ]);
    }
}