<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit033348a6dbc31f7b88584740753b6034
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        '305e7c5f524898726b2e25d18ed5d513' => __DIR__ . '/../..' . '/app/common/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit033348a6dbc31f7b88584740753b6034::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit033348a6dbc31f7b88584740753b6034::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
