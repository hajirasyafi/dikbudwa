<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Sekolah;

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
        Paginator::useBootstrap();
        $countall = [
            'countsekolah' => Sekolah::count(),
            'countsma' => Sekolah::where('jenjang', 'SMA')->count(),
            'countsmp' => Sekolah::where('jenjang', 'SMP')->count(),
            'countsd' => Sekolah::where('jenjang', 'SD')->count(),
            'counttk' => Sekolah::where('jenjang', 'TK')->count(),
            'countpaud' => Sekolah::where('jenjang', 'PAUD')->count()
        ];
        View::share('countall', $countall);
    }
}
