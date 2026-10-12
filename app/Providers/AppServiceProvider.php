<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * Membagikan variabel layout ke semua view secara global agar
     * $namaUser, $inisial, $namaRole selalu tersedia di layouts/app.blade.php
     * tanpa bergantung pada urutan render @php di template.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $namaUser = session('user_nama', 'Pengguna');
            $roleId   = (int) session('role_id', 0);

            $namaRole = match($roleId) {
                1 => 'Super Admin',
                2 => 'Admin Cabang',
                3 => 'Petugas Servis',
                4 => 'Teknisi',
                5 => 'Montir Lapangan',
                default => 'Pengguna',
            };

            $bagian  = explode(' ', trim($namaUser));
            $inisial = strtoupper(
                substr($bagian[0], 0, 1) .
                (isset($bagian[1]) ? substr($bagian[1], 0, 1) : '')
            );

            // pathAktif dihitung di sini (runtime) agar tidak konflik dengan view:cache
            $pathAktif = request()->path();

            $view->with([
                'namaUser'  => $namaUser,
                'namaRole'  => $namaRole,
                'inisial'   => $inisial,
                'pathAktif' => $pathAktif,
            ]);
        });
    }
}
