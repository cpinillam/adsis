<?php

namespace App\Providers;

use App\Evaluation;
use Illuminate\Support\Facades\Schema;
use App\Observers\EvaluationObserver;
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

        Evaluation::observe(EvaluationObserver::class);

        Schema::defaultStringLength(191);
    }
}
