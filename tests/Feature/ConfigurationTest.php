<?php

namespace Tests\Feature;

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
    public function test_running_config()
    {
        $first_name = config("contoh.author.first");
        $last_name = config("contoh.author.last");
        $email = config("contoh.email");



        self::assertEquals('Amien', $first_name);
        self::assertEquals('Kurniawan', $last_name);
        self::assertEquals('offdevamienk@gmail.com', $email);
    }
}
