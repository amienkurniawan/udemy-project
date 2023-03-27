<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_cookie()
    {
        $this->get('/cookie/set')
            ->assertSeeText('Hello Cookie')
            ->assertCookie('user-id', 'khannedy')
            ->assertCookie('is-member', 'true');
    }

    public function test_get_cookie()
    {
        $this->withCookie('user-id', 'khannedy')
            ->withCookie('is-member', 'true')
            ->get('/cookie/get')
            ->assertJson([
                'userId' => 'khannedy',
                'isMember' => 'true'
            ]);
    }
}
