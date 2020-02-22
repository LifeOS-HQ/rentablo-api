<?php

namespace Dasumi\Rentablo\Api;

use Dasumi\Rentablo\Api\AbstractApi;

class Login extends AbstractApi
{
    public function login(string $username, string $password) : array
    {
        return $this->client->post('login', '', [
            'debug' => $this->debug,
            'json' => [
                'username' => $username,
                'password' => $password,
            ],
        ]);
    }

    public function validate(string $access_token)
    {
        return $this->client->get('validate', [], [
            'debug' => $this->debug,
            'query' => [
                'access_token' => $access_token,
            ],
        ]);
    }

    public function refresh(string $refresh_token)
    {
        return $this->client->get('validate', [], [
            'debug' => $this->debug,
            'query' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refresh_token,
            ],
        ]);
    }
}