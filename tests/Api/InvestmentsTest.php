<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class InvestmentsTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_gets_the_investments_of_an_account()
    {
        $data = $this->api->investments->search([
            'accountId' => $this->accountIds['depot'],
        ]);
        var_dump($data);
        $this->assertArrayHasKey('investments', $data);
    }

    /**
     * @test
     */
    public function it_can_get_all_the_investments()
    {
        $data = $this->api->investments->search();
        var_dump($data);
        $this->assertArrayHasKey('investments', $data);
    }

}