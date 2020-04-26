<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class AccountsTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_get_accounts()
    {
        $data = $this->api->accounts->get();

        var_dump($data);
        $this->assertArrayHasKey('accounts', $data);
    }

    /**
     * @test
     */
    public function it_can_get_an_account()
    {
        $data = $this->api->accounts->get($this->accountIds['depot']);

        var_dump($data);

        $this->assertEquals($this->accountIds['depot'], $data['id']);
        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('type', $data);
        $this->assertArrayHasKey('depotIds', $data);
        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('balance', $data);
        $this->assertArrayHasKey('currency', $data);
        $this->assertArrayHasKey('defaultCommission', $data);
        $this->assertArrayHasKey('implicitTransactions', $data);
        $this->assertArrayHasKey('iconUrl', $data);
        $this->assertArrayHasKey('activeAssets', $data);
        $this->assertArrayHasKey('bankAccountTypeId', $data);
    }

    /**
     * @test
     */
    public function it_can_get_the_valuation_of_an_account()
    {
        $data = $this->api->accounts->valuation($this->accountIds['depot'], false);
        $this->assertIsFloat($data);
    }

    /**
     * @test
     */
    public function it_can_get_the_valuation_including_cash_of_an_account()
    {
        $data = $this->api->accounts->valuation($this->accountIds['depot'], true);
        $this->assertIsFloat($data);
    }

    /**
     * @test
     */
    public function it_can_get_the_cash_flows()
    {
        $data = $this->api->accounts->cashFlows($this->accountIds['cash'], 'year');
        $this->assertArrayHasKey('dateValuePairs', $data);
    }

}