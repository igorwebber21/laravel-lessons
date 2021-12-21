<?php

namespace App\Providers;

use App\Rubric;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        DB::listen(function($query){
         //   dump($query->sql, $query->bindings);
              //  echo "<br/>";
            Log::channel('sqllogs')->info($query->sql);

        });

        view()->composer('layouts.footer', function($view){
            $view->with('rubrics', Rubric::all());
        });

    }
}
