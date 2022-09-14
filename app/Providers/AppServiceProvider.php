<?php

namespace App\Providers;

use App\Models\Contrato;
use App\Models\Multas;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;

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

        $contratosPorVencer = Contrato::whereHas('convenio', function($q){
            $q->where('vigencia_fin', '<', Carbon::now()->addMonth())
            ->where('vigencia_fin', '>=', Carbon::now());
          })->get();
          //dd($contratosPorVencer);
          View::share('contratosPorVencer', $contratosPorVencer->count());

        $multasPorVencer = Contrato::whereHas('multas', function($q){
            $q->where('fecha_notificacion', '<', Carbon::now()->addMonth())
            ->where('fecha_notificacion', '>=', Carbon::now());
          })->get();
          //dd($contratosPorVencer);
          View::share('multasPorVencer', $multasPorVencer->count());

          $boletasPorVencer = Contrato::whereHas('montoboleta', function($q){
            $q->where('fecha_vencimiento', '<', Carbon::now()->addMonth())
            ->where('fecha_vencimiento', '>=', Carbon::now());
          })->get();
          //dd($contratosPorVencer);
          View::share('boletasPorVencer', $boletasPorVencer->count());

          $contratosVencidos = Contrato::whereHas('convenio', function($q){
            $q->where('vigencia_fin', '<=', Carbon::now());
          })->get();

          View::share('contratosVencidos', $contratosVencidos->count());
    }
}
