<?php

namespace App\Providers;

use App\Components\OrderComponent;
use Illuminate\Support\ServiceProvider;

class OrderComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('order', function (){
            return new OrderComponent();
        });
    }

    public function provides(): array
    {
        return [
            'order',
        ];
    }
}
