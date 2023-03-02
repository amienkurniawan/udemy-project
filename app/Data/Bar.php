<?php

namespace App\Data;

class Bar
{
  public Foo $foo;

  public function __construct(Foo $foo) // contoh dependency injection
  {
    $this->foo = $foo;
  }
  public function bar(): string
  {
    return $this->foo->foo() . ' and Bar';
  }
}
