<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class PerformanceTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_get_the_absolute_return_of_an_investment()
    {
        $investmentId = '';
        $data = $this->api->performance->absoluteReturn($investmentId);
        var_dump($data);
        exit;
    }

    /**
     * @test
     */
    public function it_can_get_the_performance_of_an_account()
    {
        $data = $this->api->performance->depot([$this->accountIds['depot']], (new \DateTime('yesterday'))->format('Y-m-d'));
        var_dump($data);
        $this->assertArrayHasKeys('cashFlowAndPerformanceStatisticsList', $data);
    }

    /**
     * @test
     */
    public function it_can_get_the_performance_of_a_portfolio()
    {
        $investmentId = '';
        $data = $this->api->performance->portfolio($this->accountIds['depot'], '2020-02-20');
        var_dump($data);
        exit;
    }

}