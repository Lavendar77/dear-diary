<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// My imports
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Categories;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 
        Blade::directive('category', function($expression) {
            $exp = explode(',', $expression);
            $id = $exp[0];
            $column = $exp[1];

            $data = DB::table('categories')
                                ->where('id', 1)
                                ->value($column);

            return "'$data'";
        });

        Blade::directive('readDate', function($expression) {
            $data = User::find(1)->created_at->diffForHumans();

            return "'$data'";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
