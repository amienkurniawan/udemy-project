<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloServices;
use App\Services\HelloServicesIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * implements DeferrableProvider
 * jika service provider yang kita buat hanya dipanggil ketika dibutuhkan saja maka kita dapat meng-implements DeferredProvider
 */
class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * misalkan disini kita melakukan binding dengan cara yang sederhana, seperti interface ke class
     * kita dapat menggunakan fitur binding via properties di ServiceProvider
     * maka kita tidak perlu lagi register secara manual 
     * cukup lakukan dengan cara berikut ini
     */

    /**
     * All of the container bindings that should be registered.
     */
    public $bindings = [];

    /**
     * All of the container singletons that should be registered.
     */
    public $singletons = [
        HelloServices::class => HelloServicesIndonesia::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * jika aplikasi yang kita jalankan saat ini tidak membutuhkan HelloServices::class,Foo::class,Bar::class 
     * maka secara keseluruhan service provider ini tidak akan dijalankan karena kita sudah meng-implement DeferrableProvider
     */
    public function provides()
    {
        return [HelloServices::class, Foo::class, Bar::class];
    }
}
