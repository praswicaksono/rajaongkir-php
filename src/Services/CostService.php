<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir\Services;

use Jowy\RajaOngkir\Executor\ExecutorInterface;

/**
 * Class CostService
 * @package Jowy\RajaOngkir\Services
 */
class CostService implements ServiceInterface
{
    use PropertyChecker;

    /**
     * @var ExecutorInterface
     */
    private $executor;

    /**
     * @var string
     */
    private $endpoint = 'cost';

    /**
     * @var string
     */
    private $edition;

    /**
     * {@inheritdoc}
     */
    public function setExecutor(ExecutorInterface $executor)
    {
        $this->executor = $executor;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() : string
    {
        return 'cost';
    }

    /**
     * {@inheritdoc}
     */
    public function setEdition(int $edition)
    {
        $this->edition = Edition::toString($edition);
    }

    /**
     * @param int $origin
     * @param int $destination
     * @param int $weight
     * @param string $courier
     * @return array
     */
    public function calculateCost(int $origin, int $destination, int $weight, string $courier = 'jne') : array
    {
        $this->checkProperties();
        
        $uri = $this->edition . '/' . $this->endpoint;

        return $this->executor->execute(
            $uri,
            'POST',
            [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' =>$courier
            ]
        );
    }
}
