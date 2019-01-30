<?php

namespace App\Modules\Vlog\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('vlog', 'Resources/Lang', 'app'), 'vlog');
        $this->loadViewsFrom(module_path('vlog', 'Resources/Views', 'app'), 'vlog');
        $this->loadMigrationsFrom(module_path('vlog', 'Database/Migrations', 'app'), 'vlog');
        $this->loadConfigsFrom(module_path('vlog', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('vlog', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
