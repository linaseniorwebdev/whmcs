<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a909051e12bd1e184eb0a845345119c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'ModulesGarden\\Geolocation\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ModulesGarden\\Geolocation\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Detection' => 
            array (
                0 => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/namespaced',
            ),
        ),
    );

    public static $classMap = array (
        'Mobile_Detect' => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/Mobile_Detect.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a909051e12bd1e184eb0a845345119c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a909051e12bd1e184eb0a845345119c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3a909051e12bd1e184eb0a845345119c::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit3a909051e12bd1e184eb0a845345119c::$classMap;

        }, null, ClassLoader::class);
    }
}
