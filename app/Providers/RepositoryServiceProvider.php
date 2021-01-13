<?php

namespace App\Providers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Repositories\Repository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Role', function () {
            return new Repository(new Role);
        });
        $this->app->singleton('User', function () {
            return new Repository(new User);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
