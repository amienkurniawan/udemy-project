<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    /**
     * A basic feature test facedes.
     *
     * @return void
     */
    public function test_facedes()
    {

        $firstname1 = Config::get('contoh.author.first');
        $firstname2 = config('contoh.author.first');

        self::assertSame($firstname1, $firstname2);
    }
}
