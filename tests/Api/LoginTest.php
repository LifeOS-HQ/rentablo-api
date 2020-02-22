<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;
use GuzzleHttp\Exception\ClientException;

class LoginTest extends \Dasumi\Rentablo\Tests\TestCase
{
    protected $needsAuthentifitcation = false;

    /**
     * @test
     */
    public function it_can_login()
    {
        $data = $this->api->login->login($this->username, $this->password);
        // var_dump($data);
        $this->assertArrayHasKey('username', $data);
        $this->assertArrayHasKey('token_type', $data);
        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('expires_in', $data);
        $this->assertArrayHasKey('refresh_token', $data);
    }

    /**
     * @test
     */
    public function it_can_not_login_with_wrong_cedentials()
    {
        $this->expectException(ClientException::class);

        $data = $this->api->login->login('wrong', 'wrong');
    }

    /**
     * @test
     */
    public function it_can_validate_the_access_token()
    {
        $data = $this->api->login->login($this->username, $this->password);

        $data = $this->api->login->validate($data['access_token']);
        $this->assertArrayHasKey('username', $data);
        $this->assertArrayHasKey('token_type', $data);
        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('expires_in', $data);
        $this->assertArrayHasKey('refresh_token', $data);
    }

    /**
     * @test
     */
    public function it_can_refresh_the_access_token()
    {
        $data = $this->api->login->login($this->username, $this->password);
        $this->api->setAccessToken($data['access_token']);
        sleep(1);

        $data = $this->api->login->refresh($data['refresh_token']);
        $this->assertArrayHasKey('username', $data);
        $this->assertArrayHasKey('token_type', $data);
        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('expires_in', $data);

        $this->api->setAccessToken($data['access_token']);
    }

}