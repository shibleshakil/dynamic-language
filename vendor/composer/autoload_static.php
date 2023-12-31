<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1ff514d04847e47586a3fd121f6f753
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shibleshakil\\DynamicLanguage\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shibleshakil\\DynamicLanguage\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd1ff514d04847e47586a3fd121f6f753::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd1ff514d04847e47586a3fd121f6f753::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd1ff514d04847e47586a3fd121f6f753::$classMap;

        }, null, ClassLoader::class);
    }
}
