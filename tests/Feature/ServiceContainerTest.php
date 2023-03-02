<?php

namespace Tests\Feature;

use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dependency_injection()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo_());
        self::assertEquals('Foo', $foo2->foo_());
        self::assertNotSame($foo1, $foo2);
    }

    public function test_bind_injection()
    {
        // kita tidak dapat langsung melakukan hal ini karena class Person membutuhkan construct parameter berupa firstName dan lastName
        // $person = $this->app->make(Person::class); 

        // yang bisa kita lakukan adalah menggunakan fitur bind kemudian kita definisikan bagaimana cara membuat object pada class Person tersebut seperti dibawah ini:
        $this->app->bind(Person::class, function ($app) {
            return new Person("Eko", "Khannedy");
        });
        // setelah kita bind kita dapat membuat object dari class Person seperti dibawah ini:
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Eko', $person1->firstName);
        self::assertEquals('Eko', $person2->firstName);
        self::assertNotSame($person1, $person2);
    }
}
