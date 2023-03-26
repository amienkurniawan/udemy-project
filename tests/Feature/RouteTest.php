<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_routes()
    {
        $this->get('/amien')
            ->assertStatus(200)
            ->assertSeeText('amien kurniawan');
    }
}
