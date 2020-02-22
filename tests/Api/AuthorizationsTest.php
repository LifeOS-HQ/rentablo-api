<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;

class AuthorizationsTest extends \Dasumi\Rentablo\Tests\TestCase
{
    /**
     * @test
     */
    public function it_can_get_the_authorizations_for_the_currently_logged_in_user()
    {
        $data = $this->api->authorizations->get();
        $this->assertArrayHasKey('isLoggedIn', $data);
        $this->assertArrayHasKey('requiresSecondAuthenticationFactor', $data);
        $this->assertArrayHasKey('hasSecondAuthenticationFactor', $data);
        $this->assertArrayHasKey('isTwoFactorAuthenticated', $data);
        $this->assertArrayHasKey('isSecondAuthenticationFactorDisabled', $data);
        $this->assertArrayHasKey('roles', $data);
        $this->assertArrayHasKey('thirdPartyAccounts', $data);
        $this->assertArrayHasKey('mandatorReference', $data);
    }

    /**
     * @test
     */
    public function it_can_set_the_second_factor()
    {
        $data = $this->api->authorizations->secondFactor($this->secondFactor);

        $this->assertArrayHasKey('isLoggedIn', $data);
        $this->assertArrayHasKey('requiresSecondAuthenticationFactor', $data);
        $this->assertArrayHasKey('hasSecondAuthenticationFactor', $data);
        $this->assertArrayHasKey('isTwoFactorAuthenticated', $data);
        $this->assertArrayHasKey('isSecondAuthenticationFactorDisabled', $data);
        $this->assertArrayHasKey('roles', $data);
        $this->assertArrayHasKey('thirdPartyAccounts', $data);
        $this->assertArrayHasKey('mandatorReference', $data);

        $this->assertTrue($data['isTwoFactorAuthenticated']);
    }

}