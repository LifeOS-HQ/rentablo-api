# Rentablo API Wrapper

A PHP Wrapper for the rentablo.de API

## Installation

```
composer require lifeos/rentablo-api
```

## Usage

```
$api = new Dasumi\Rentablo\Api(Api::URI);
$isAuthenticated = $api->authenticate($username, $passwort);

$accounts = $api->accounts->get();
```
