<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit66858c176b7dde4e7362d49b7f1b917a
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jowy\\RajaOngkir\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jowy\\RajaOngkir\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Collections\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/collections/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit66858c176b7dde4e7362d49b7f1b917a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit66858c176b7dde4e7362d49b7f1b917a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit66858c176b7dde4e7362d49b7f1b917a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}