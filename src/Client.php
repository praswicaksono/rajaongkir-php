<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir;

use Jowy\RajaOngkir\Executor\ExecutorInterface;
use Jowy\RajaOngkir\Services\CityService;
use Jowy\RajaOngkir\Services\CostService;
use Jowy\RajaOngkir\Services\Edition;
use Jowy\RajaOngkir\Services\ProvinceService;
use Jowy\RajaOngkir\Services\ServiceInterface;

/**
 * Class Client
 * @package Jowy\RajaOngkir
 */
class Client
{
    /**
     * @var array
     */
    private $services;

    /**
     * @var array
     */
    private $defaultServices = [
        CityService::class,
        CostService::class,
        ProvinceService::class
    ];

    /**
     * @var int
     */
    private $edition;

    /**
     * @var ExecutorInterface
     */
    private $executor;

    /**
     * Client constructor.
     * @param ExecutorInterface $executor
     * @param int $edition
     */
    public function __construct(ExecutorInterface $executor, int $edition = Edition::STARTER)
    {
        $this->executor = $executor;
        $this->edition = $edition;

        // Register default services
        array_walk($this->defaultServices, function ($class) {
            /** @var ServiceInterface $service */
            $service = new $class;
            $service->setEdition($this->edition);
            $service->setExecutor($this->executor);

            $this->services[$service->getName()] = $service;
        });
    }

    /**
     * @param ServiceInterface $service
     * @return $this
     */
    public function enableService(ServiceInterface $service)
    {
        if (array_key_exists($service->getName(), $this->services)) {
            return $this;
        }

        $service->setExecutor($this->executor);
        $service->setEdition($this->edition);
        $this->services[$service->getName()] = $service;

        return $this;
    }

    /**
     * @return CityService
     */
    public function cities() : CityService
    {
        return $this->services['city'];
    }

    /**
     * @return CostService
     */
    public function cost() : CostService
    {
        return $this->services['cost'];
    }
}
