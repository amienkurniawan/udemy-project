<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dependency()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function test_bind()
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

        self::assertEquals('Eko', $person1->firstname);
        self::assertEquals('Eko', $person2->firstname);
        self::assertNotSame($person1, $person2);
    }

    public function test_singleton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Eko", "Khannedy");
        });
        // setelah kita bind kita dapat membuat object dari class Person seperti dibawah ini:
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Eko', $person1->firstname);
        self::assertEquals('Eko', $person2->firstname);
        // self::assertNotSame($person1, $person2); // ini akan error karena person1 dan person2 merupakan object yang sama
        self::assertSame($person1, $person2);  // ini akan bernilai true karena person1 dan person2 merupakan object yang sama
    }

    public function test_instance()
    {
        // kita buat object person
        $person = new Person("Eko", "Khannedy");

        // kita bind object person tesebut ke dalam service container laravel
        $this->app->instance(Person::class, $person);

        // ketika kita membuat object person1,person2 dari class Person pada laravel maka akan mengembalikan object person yang sudah ada.
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Eko', $person1->firstname);
        self::assertEquals('Eko', $person2->firstname);
        // self::assertNotSame($person1, $person2); // ini akan error karena person1 dan person2 merupakan object yang sama
        self::assertSame($person1, $person2);  // ini akan bernilai true karena person1 dan person2 merupakan object yang sama
    }

    public function test_dependency_injection()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
        // setelah kita bind kita dapat membuat object dari class Person seperti dibawah ini:
        $foo = $this->app->make(Foo::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertNotSame($foo, $bar2); // ini akan bernilai true karena $foo dan $bar2 merupakan object yang berbeda meskipun $bar2 memerlukan construct $foo ketika object dibuat
        self::assertSame($foo, $bar2->foo);  // ini akan bernilai true karena $foo dan $bar2->foo merupakan object yang sama
    }
}
