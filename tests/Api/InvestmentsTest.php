<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class InvestmentsTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_gets_the_investsments_of_an_account()
    {
        $data = $this->api->investments->search($this->accountIds['depot']);
        var_dump($data);
        $this->assertArrayHasKey('investments', $data);
    }

}