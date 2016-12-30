<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir\Executor;

/**
 * Interface ExecutorInterface
 * @package Jowy\RajaOngkir\Executor
 */
interface ExecutorInterface
{
    /**
     * @param string $url
     * @param string $method
     * @param array $params
     * @return array
     */
    public function execute(string $url, string $method = 'GET', array $params = []) : array;
}