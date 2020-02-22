<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class PerformanceTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_get_the_absolute_return()
    {
        $investmentId = '';
        $data = $this->api->performance->absoluteReturn($investmentId);
        var_dump($data);
        exit;
    }

}