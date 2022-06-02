<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Investments extends AbstractApi
{
    /**
     * Gets all investements
     *
     * @param array $filter [
     *      'accountId' => $accountId,
     *      'currency' => 'EUR',
     *      'id' => [],
     *      'includeHistoric' => false,
     *      'industryId' => [],
     *      'isin' => [],
     *      'name' => '',
     *      'order' => 'id asc',
     *      'page' => 1,
     *      'perPage' => 500,
     *      'positiveAmountOrLastTransactionAfter' => '',
     *      'regionId' => [],
     *      'tickerSymbol' => [],
     *      'wkn' => [],
     * ]
     * @return array
     */
    public function search(array $filter = []): array
    {
        return $this->client->get('investments', $filter, [
            'debug' => $this->debug,
        ]);
    }
}