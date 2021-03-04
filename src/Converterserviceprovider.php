<?php

namespace adityar15\converter;

use adisk21\converter\Converter;
use Illuminate\Support\Serviceprovider;

class Converterserviceprovider extends Serviceprovider
{
    public function boot(){
        
    }

    public function register(){
        $this->app->singleton(Converter::class, function(){
            return new Converter();
        });
    }
}
