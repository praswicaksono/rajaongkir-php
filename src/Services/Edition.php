<?php
declare(strict_types = 1);


namespace Jowy\RajaOngkir\Services;


class Edition
{
    const STARTER = 1;

    const BASIC = 2;

    const PRO = 3;

    /**
     * @param int $edition
     * @return string
     */
    public static function toString(int $edition)
    {
        switch ($edition) {
            case 1:
                return 'starter';
            case 2:
                return 'basic';
            case 3:
                return 'pro';
            default:
                throw new \InvalidArgumentException('Invalid edition');
        }
    }
}
