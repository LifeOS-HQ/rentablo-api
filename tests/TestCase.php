<?php

namespace Dasumi\Rentablo\Tests;

use Dasumi\Rentablo\Api;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected $api;

    protected $username;
    protected $password;
    protected $secondFactor;
    protected $accountIds;

    protected $needsAuthentifitcation = true;

    protected function setUp() : void
    {
        $this->username = $_ENV['username'];
        $this->password = $_ENV['password'];
        $this->secondFactor = $_ENV['secondFactor'];
        $this->accountIds = [
            'cash' => $_ENV['account_id_cash'],
            'depot' => $_ENV['account_id_depot'],
        ];

        $this->api = new Api($_ENV['base_uri']);

        if ($this->needsAuthentifitcation) {
            $isAuthenticated = $this->api->authenticate($this->username, $this->password);
            sleep(1);
        }
    }
}

?>