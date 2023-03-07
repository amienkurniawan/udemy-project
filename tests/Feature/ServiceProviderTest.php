<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class TestServiceProvider extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_service_provider()
    {
        // FooBarServiceProvider.php
        // $this->app->singleton(Foo::class, function ($app) {
        //     return new Foo();
        // });

        // $this->app->singleton(Bar::class, function ($app) {
        //     return new Bar($app->make(Foo::class));
        // });


        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertSame($foo1, $foo2); // akan bernilai true karena foo disini dibuat secara singleton artinya object yang dibuat berkali-kali akan sama

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2); // akan bernilai true karena object bar1,bar2 dibuat secara singleton 
        self::assertSame($bar1->foo, $bar2->foo); // bernilai true karena object $bar1->foo, $bar2->foo itu mereference itu ke object foo yang sama karena object foo dibuat secara singleton juga

        self::assertSame($foo1, $bar1->foo); // bernilai true karena $foo1 itu dibuat secara singleton sehingga object yang ada didalam $bar1->foo itu sama dengan object foo 
        self::assertSame($foo2, $bar2->foo); // bernilai true karena $foo2 itu dibuat secara singleton sehingga object yang ada didalam $bar2->foo itu sama dengan object foo 

        self::assertSame($foo2, $bar1->foo); // bernilai true karena $foo2 itu dibuat secara singleton sehingga object yang ada didalam $bar1->foo itu sama dengan object foo 
        self::assertSame($foo1, $bar2->foo); // bernilai true karena $foo1 itu dibuat secara singleton sehingga object yang ada didalam $bar2->foo itu sama dengan object foo 
    }

    public function test_deferrable_provider()
    {
        self::assertTrue(true);
    }
}
