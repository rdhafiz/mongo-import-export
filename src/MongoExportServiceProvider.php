<?php

namespace Rdhafiz\MongoExport;

use Illuminate\Support\ServiceProvider;
use Rdhafiz\MongoExport\Console\Commands\MongoExportAll;
use Rdhafiz\MongoExport\Console\Commands\MongoImportAll;

class MongoExportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    MongoExportAll::class,
                    MongoImportAll::class,
                ]
            );
        }

        // Publish the config file
        $this->publishes(
            [
                __DIR__ . '/Console/Commands/dev/MongoExportAll.dev' => base_path('app/Console/Commands/MongoExportAll.php'),
                __DIR__ . '/Console/Commands/dev/MongoImportAll.dev' => base_path('app/Console/Commands/MongoImportAll.php'),
            ],
            'command'
        );
    }
}
