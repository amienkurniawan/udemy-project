<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testDependencyInjection extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dependency_injection()
    {
        $foo = new Foo();
        $bar = new Bar($foo); // kita melakukan injection dependency menggunakan construct

        // $foo = new Foo();
        // $bar = new Bar();
        // $bar->setFoo($foo); // kita juga bisa melakukan injection dependency menggunakan set attribute
        $this->assertEquals('Foo and Bar', $bar->bar());
    }
}
