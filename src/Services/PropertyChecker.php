<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir\Services;

/**
 * Class PropertyChecker
 * @package Jowy\RajaOngkir\Services
 */
trait PropertyChecker
{
    private function checkProperties()
    {
        if ($this->executor === null) {
            throw new \InvalidArgumentException('Executor have not set yet');
        }

        if ($this->edition === null) {
            throw new \InvalidArgumentException('Edition is missing');
        }
    }
}