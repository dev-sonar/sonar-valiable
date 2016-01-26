<?php

namespace Sonar\Valiable;

use Illuminate\Support\ServiceProvider;

class ValiableServiceProvider extends ServiceProvider
{
    protected $commands = [
        'Sonar\Valiable\Console\ValiableImportCommand',
        'Sonar\Valiable\Console\ValiableListCommand',
        'Sonar\Valiable\Console\ValiableClearCommand',
    ];

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../storage/app/sonar_valiables' => storage_path('app/sonar_valiables'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    public function provides()
    {
        return ['sonar_valiable'];
    }
}
