<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir\Services;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Jowy\RajaOngkir\Executor\ExecutorInterface;

/**
 * Class CityService
 * @package Jowy\RajaOngkir\Services
 */
class CityService implements ServiceInterface
{
    use PropertyChecker;
    
    /**
     * @var ExecutorInterface
     */
    private $executor;

    /**
     * @var string
     */
    private $edition;

    /**
     * @var string
     */
    private $endpoint = 'city';

    /**
     * @var ArrayCollection
     */
    private $cities;

    /**
     * CityService constructor.
     */
    public function __construct()
    {
        $this->cities = new ArrayCollection(
            json_decode(file_get_contents(__DIR__ . '/../../dist/cities.json'), true)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName() : string
    {
        return 'city';
    }

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
    public function setEdition(int $edition)
    {
        $this->edition = Edition::toString($edition);
    }

    /**
     * @param string $phrase
     * @return Collection
     */
    public function searchByName(string $phrase) : Collection
    {
        return $this->cities->matching(
            Criteria::create()->where(
                Criteria::expr()->contains('city_name_canonical', strtolower($phrase))
            )
        );
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function searchById(int $id) : Collection
    {
        return $this->cities->matching(
            Criteria::create()->where(
                Criteria::expr()->eq('city_id', (string) $id)
            )
        );
    }
}
