<?php

namespace App\Providers;

use App\Models\loai_sp;
use Illuminate\Support\ServiceProvider;

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
     */
    public function boot(): void
    {
        view()->composer('navbar',function($view){
            $lsp = loai_sp::all();
            $view->with('loaisp',$lsp);
        });
    }
}
