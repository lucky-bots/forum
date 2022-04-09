<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9ca41b1106fbfd6a9f9c081ef93cf8d
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'U0A227\\Forum\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'U0A227\\Forum\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9ca41b1106fbfd6a9f9c081ef93cf8d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9ca41b1106fbfd6a9f9c081ef93cf8d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc9ca41b1106fbfd6a9f9c081ef93cf8d::$classMap;

        }, null, ClassLoader::class);
    }
}
