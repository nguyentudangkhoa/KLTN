<?php

namespace App\Providers;

use App\Product_type;
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
        view()->composer('component.hf.header',function($view){
            $option_kitchen = Product_type::where('id_group_type',1)->where('status',1)->get();//Kitchen item
            $view->with('option_kitchen',$option_kitchen);
        });
        view()->composer('component.hf.header',function($view){
            $option_household = Product_type::where('id_group_type',2)->where('status',1)->get();//Household item
            $view->with('option_household',$option_household);
        });
    }
}
