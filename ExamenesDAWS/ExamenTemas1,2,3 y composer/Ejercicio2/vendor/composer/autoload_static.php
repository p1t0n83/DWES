<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5bb5af7643678c979aab1398525691b
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Ejercicio2\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ejercicio2\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5bb5af7643678c979aab1398525691b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5bb5af7643678c979aab1398525691b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5bb5af7643678c979aab1398525691b::$classMap;

        }, null, ClassLoader::class);
    }
}