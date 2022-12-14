<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e2063a84ec659bac9c5f14a5f5a73d0
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Ridwan\\MongoImportExport\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ridwan\\MongoImportExport\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e2063a84ec659bac9c5f14a5f5a73d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e2063a84ec659bac9c5f14a5f5a73d0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0e2063a84ec659bac9c5f14a5f5a73d0::$classMap;

        }, null, ClassLoader::class);
    }
}
