<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Blade importado
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider {

    public function register() {
        //
    }

    public function boot() {

        //registra o componente com o "datalist"
        Blade::component('components.datalist', 'datalist');
    }
}
