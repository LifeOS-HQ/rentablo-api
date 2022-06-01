<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Bookings extends AbstractApi
{
    public function get(int $id = 0, array $params = []): array
    {
        return $this->client->get('bookings' . ($id > 0 ? '/' . $id : ''), $params, [
            'debug' => $this->debug,
        ]);
    }

    public function addDividend(int $accountId, int $investmentId, array $params): array
    {
        return $this->client->postJson('bookings', [
            'accountId' => $accountId,
            'createOrUpdateInvestmentParamsList' => [
                [
                    'id' => $investmentId,
                    'createOrUpdateBookingParamsList' => [
                        [
                            'securityPrice' => $params['securityPrice'],
                            'date' => $params['date'],
                            'type' => 'dividend',
                            'taxAmount' => $params['taxAmount'],
                            'numberOfLots' => 1,
                        ],
                    ],
                ],
            ],
        ], [
            'debug' => $this->debug,
        ]);
    }

    public function addLots(int $accountId, int $investmentId, array $params): array
    {
        return $this->client->postJson('bookings', [
            'accountId' => $accountId,
            'createOrUpdateInvestmentParamsList' => [
                [
                    'id' => $investmentId,
                    'createOrUpdateBookingParamsList' => [
                        [
                            'securityPrice' => $params['securityPrice'],
                            'date' => $params['date'],
                            'type' => 'buy',
                            'numberOfLots' => $params['numberOfLots'],
                            'commission' => $params['commission'],
                        ],
                    ],
                ],
            ],
        ], [
            'debug' => true,
        ]);
    }
}