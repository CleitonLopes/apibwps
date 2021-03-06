<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Domains\Contracts\Repositories\ParametroEmpresaRepository::class, \App\Repositories\ParametroEmpresaRepositoryEloquent::class);
        $this->app->bind(\App\Domains\Contracts\Repositories\EmpresaConfiguracaoRepository::class, \App\Repositories\EmpresaConfiguracaoRepositoryEloquent::class);
        $this->app->bind(\App\Domains\Contracts\Repositories\MenuRepository::class, \App\Repositories\MenuRepositoryEloquent::class);
        $this->app->bind(\App\Domains\Contracts\Repositories\EmpresaRepository::class, \App\Repositories\EmpresaRepositoryEloquent::class);
        //:end-bindings:
    }
}
