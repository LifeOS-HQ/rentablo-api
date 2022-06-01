<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;
use GuzzleHttp\Exception\ClientException;

class BookingsTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_get_bookings_for_an_account()
    {
        $data = $this->api->bookings->get(0, [
            'accountId' => $this->accountIds['depot'],
        ]);
        var_dump($data);
    }

    /**
     * @test
     */
    public function it_can_get_a_booking()
    {
        $data = $this->api->bookings->get(131470);
        var_dump($data);
    }

    /**
     * @test
     */
    public function it_can_create_a_dividend_for_an_existing_investment()
    {
        try {
            $data = $this->api->bookings->addDividend(917, 1544, [
                'securityPrice' => 200,
                'date' => date('Y-m-d\TH:i:s.n\Z'),
                'taxAmount' => 10,
            ]);
            $this->assertFalse($data['hasValidationErrors']);
            $this->assertCount(0, $data['transactionValidationErrors']);
        } catch (ClientException $e) {
            var_dump(json_decode($e->getResponse()->getBody()->getContents(), true));
        }
    }

    /**
     * @test
     */
    public function it_can_add_lots_for_an_existing_investment()
    {
        try {
            $data = $this->api->bookings->addLots(917, 1544, [
                'securityPrice' => 100,
                'date' => date('Y-m-d\TH:i:s.n\Z'),
                'commission' => 10,
                'numberOfLots' => 12,
            ]);
            var_dump($data);
            $this->assertFalse($data['hasValidationErrors']);
            $this->assertCount(0, $data['transactionValidationErrors']);
        } catch (ClientException $e) {
            var_dump(json_decode($e->getResponse()->getBody()->getContents(), true));
        }
    }

}