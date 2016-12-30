<?php
declare(strict_types = 1);

require 'vendor/autoload.php';

$client = (new \Jowy\RajaOngkir\Client(
    new \Jowy\RajaOngkir\Executor\CurlExecutor('d9ab1781fe366d5c1f86b9c316e14347')
));

var_dump($client->cities());
var_dump($client->cost());
