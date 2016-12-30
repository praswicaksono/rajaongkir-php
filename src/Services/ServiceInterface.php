<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir\Services;

use Jowy\RajaOngkir\Executor\ExecutorInterface;

/**
 * Interface ServiceInterface
 * @package Jowy\RajaOngkir\Services
 */
interface ServiceInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param ExecutorInterface $executor
     */
    public function setExecutor(ExecutorInterface $executor);

    /**
     * @param int $edition
     */
    public function setEdition(int $edition);
}
