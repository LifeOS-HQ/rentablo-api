<?php

namespace Dasumi\Rentablo;

use Dasumi\Rentablo\Client;
use Dasumi\Rentablo\Api\Funds;
use Dasumi\Rentablo\Api\Login;
use Dasumi\Rentablo\Api\Accounts;
use Dasumi\Rentablo\Api\Bookings;
use Dasumi\Rentablo\Api\Dividends;
use Dasumi\Rentablo\Api\Investments;
use Dasumi\Rentablo\Api\Performance;
use Dasumi\Rentablo\Api\Authorizations;
use Dasumi\BaseApiWrapper\Client as BaseClient;

class Api extends \Dasumi\BaseApiWrapper\Api
{
    const URI = 'https://rentablo.de';
    const URI_SANDBOX = 'https://sandbox.rentablo.de';

    protected $base_uri;
    protected $access_token;
    protected $refresh_token;

    public function __construct(string $base_uri = '')
    {
        $this->base_uri = $base_uri;

        parent::__construct();
    }

    public function authenticate(string $username, string $password) : bool
    {
        try {
            $data = $this->login->login($username, $password);
            $this->setAccessToken($data['access_token']);
            $this->refresh_token = $data['refresh_token'];

            return true;
        }
        catch (\Exception $e) {
            return false;
        }
    }

    public function setAccessToken(string $access_token)
    {
        $this->access_token = $access_token;
        $this->registerEndpoints();
    }

    protected function getClient() : BaseClient
    {
        $headers = [];
        if ($this->access_token) {
            $headers['Authorization'] = 'Bearer ' . $this->access_token;
        }

        return new Client([
            'base_uri' => $this->base_uri,
            'timeout'  => 2.0,
            'headers' => $headers,
        ]);
    }

    protected function setEndpoints(BaseClient $client) : void
    {
        $this->accounts = new Accounts($client);
        $this->authorizations = new Authorizations($client);
        $this->bookings = new Bookings($client);
        $this->dividends = new Dividends($client);
        $this->funds = new Funds($client);
        $this->investments = new Investments($client);
        $this->login = new Login($client);
        $this->performance = new Performance($client);
    }
}