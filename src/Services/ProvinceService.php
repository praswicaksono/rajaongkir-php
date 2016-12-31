<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir\Services;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Jowy\RajaOngkir\Executor\ExecutorInterface;

/**
 * Class ProvinceService
 * @package Jowy\RajaOngkir\Services
 */
class ProvinceService implements ServiceInterface
{
    /**
     * @var string
     */
    private $edition;

    /**
     * @var string
     */
    private $endpoint = 'province';

    /**
     * @var ExecutorInterface
     */
    private $executor;

    /**
     * @var ArrayCollection
     */
    private $province;

    /**
     * ProvinceService constructor.
     */
    public function __construct()
    {
        $this->province = new ArrayCollection(
            json_decode(file_get_contents(__DIR__ . '/../../dist/province.json'), true)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName() : string
    {
        return 'province';
    }

    /**
     * {@inheritdoc}
     */
    public function setEdition(int $edition)
    {
        $this->edition = Edition::toString($edition);
    }

    /**
     * {@inheritdoc}
     */
    public function setExecutor(ExecutorInterface $executor)
    {
        $this->executor = $executor;
    }

    /**
     * @param string $phrase
     * @return Collection
     */
    public function searchByName(string $phrase) : Collection
    {
        return $this->province->matching(
            Criteria::create()->where(
                Criteria::expr()->contains('province_canonical', strtolower($phrase))
            )
        );
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function searchById(int $id) : Collection
    {
        return $this->province->matching(
            Criteria::create()->where(
                Criteria::expr()->eq('province_id', (string) $id)
            )
        );
    }
}
