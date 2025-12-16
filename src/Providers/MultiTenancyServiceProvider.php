<?php

namespace Webkul\MultiTenancy\Providers;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Webkul\MultiTenancy\Http\Middleware\IdentifyTenant;
use Webkul\MultiTenancy\Console\Commands\TenantsMigrate;

class MultiTenancyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        // 1. Register Global Middleware
        // This makes sure tenant identification runs on every request
        $this->app->make(Kernel::class)
            ->pushMiddleware(IdentifyTenant::class);

        // 2. Load Routes
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        // 3. Load Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        // 4. Load Views
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'multi_tenancy');

        // 5. Register Menu Item on Main Domain Only, if enabled
        $host = request()->getHost();
        $landlordHost = parse_url(config('app.url'), PHP_URL_HOST);

        if ($host === $landlordHost && config('multi_tenancy.show_menu', false)) {
            $menuItems = config('menu.admin', []);

            $menuItems[] = [
                'key'        => 'tenants',
                'name'       => 'Tenants',
                'route'      => 'admin.tenants.index',
                'sort'       => config('multi_tenancy.sort', 100),
                'icon-class' => 'icon-settings-group',
            ];

            Config::set('menu.admin', $menuItems);
        }

        // 5. Register Publishes
        $this->publishes([
            __DIR__ . '/../Config/multi_tenancy.php' => config_path('multi_tenancy.php'),
        ], 'krayin-multi-tenancy-config');

        $this->publishes([
            __DIR__ . '/../Database/Migrations' => database_path('migrations'),
        ], 'krayin-multi-tenancy-migrations');

        $this->publishes([
            __DIR__ . '/../Resources/views' => resource_path('views/vendor/multi_tenancy'),
        ], 'krayin-multi-tenancy-views');



        // 6. Register Console Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                TenantsMigrate::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/multi_tenancy.php',
            'multi_tenancy'
        );

        $connectionName = config('multi_tenancy.landlord_connection_name', 'landlord');

        Config::set("database.connections.{$connectionName}", [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', '127.0.0.1'),
            'database'  => env('DB_LANDLORD_DATABASE', env('DB_DATABASE', 'krayin_landlord')),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
            'strict'    => true,
        ]);
    }
}
