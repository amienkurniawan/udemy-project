<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_encryption()
    {
        $encryption = Crypt::encrypt('amien kurniawan');
        var_dump($encryption);

        $decrypt = Crypt::decrypt($encryption);
        $this->assertEquals('amien kurniawan', $decrypt);
    }
}
