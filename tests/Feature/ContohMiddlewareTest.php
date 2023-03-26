<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Middleware_Invalid()
    {
        $this->get('/middleware/api')->assertStatus(401)->assertSeeText('Access Denied');
    }

    public function test_Middleware_Valid()
    {
        $this->withHeader('X-API-KEY', 'PZN')
            ->get('/middleware/api')
            ->assertStatus(200)
            ->assertSeeText('Ok');
    }

    public function test_Middleware_Invalid_Group()
    {
        $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');
    }

    public function test_Middleware_Valid_Group()
    {
        $this->withHeader('X-API-KEY', 'PZN')
            ->get('/middleware/group')
            ->assertStatus(200)
            ->assertSeeText('Group');
    }
}
