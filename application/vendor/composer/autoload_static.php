<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2c5ba486f18d26df51ce5cad8b87e97
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2c5ba486f18d26df51ce5cad8b87e97::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2c5ba486f18d26df51ce5cad8b87e97::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc2c5ba486f18d26df51ce5cad8b87e97::$classMap;

        }, null, ClassLoader::class);
    }
}
