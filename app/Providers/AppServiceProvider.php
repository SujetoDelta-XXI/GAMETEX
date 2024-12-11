<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\TorneosModel;
use App\Observers\TorneoObservador;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    
    public function boot()
    {
        TorneosModel::observe(TorneoObservador::class);
    }
}
