<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Http\Request;
use App\Models\pemesanan;

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
    public function boot(Request $request)
    {
        Paginator::useBootstrap();
        view()->composer('*', function ($view) {
            $id = session()->get('id_bengkel');
            $notif = pemesanan::with('masalah_pesanan', 'jenis_pesanan', 'merek_pesanan','estimasi_biaya')->where("id_bengkel_service","LIKE","%{$id}%")->where('status_pesanan','request')->get();
            view()->share('notif', $notif);
        });
    }
}
