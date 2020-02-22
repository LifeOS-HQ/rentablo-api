<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class FundsTest extends \Dasumi\Rentablo\Tests\TestCase
{
    protected $needsAuthentifitcation = false;

    /**
     * @test
     */
    public function it_gets_funds()
    {
        $data = $this->api->funds->get();
        $this->assertArrayHasKey('funds', $data);
        $this->assertEquals('DE0009848119', $data['funds'][0]['isin']);
    }

}