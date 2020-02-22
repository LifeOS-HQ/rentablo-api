<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class DividendsTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_get_the_aggrigated_dividens_of_an_account()
    {
        $data = $this->api->dividends->history($this->accountIds['depot'], [], '2020-01-01');
        $this->assertArrayHasKey('nodesByYear', $data);
        $this->assertArrayHasKey('investmentReferenceById', $data);
    }

}