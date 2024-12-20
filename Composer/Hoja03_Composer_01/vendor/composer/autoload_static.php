<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit088c0ac0e5c40982cebc35b32857cf0a
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Brick\\Math\\' => 11,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Brick\\Math\\' => 
        array (
            0 => __DIR__ . '/..' . '/brick/math/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit088c0ac0e5c40982cebc35b32857cf0a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit088c0ac0e5c40982cebc35b32857cf0a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit088c0ac0e5c40982cebc35b32857cf0a::$classMap;

        }, null, ClassLoader::class);
    }
}
