<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('mahasiswa', function (User $user) {
            return $user->role->jenis_role == 'Mahasiswa';
        });

        Gate::define('dosen', function (User $user) {
            return $user->role->jenis_role == 'Dosen';
        });

        Gate::define('paa', function (User $user) {
            return $user->role->jenis_role == 'PAA';
        });
    }
}
