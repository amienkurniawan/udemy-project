<?php

namespace App\Data;

class Bar
{
  private Foo $foo;

  public function __construct(Foo $foo) // contoh dependency injection
  {
    $this->foo = $foo;
  }
  public function bar(): string
  {
    return $this->foo->foo() . ' and Bar';
  }
}
