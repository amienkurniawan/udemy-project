<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class fileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $image = UploadedFile::fake()->image("khannedy.jpg");
        $this->post('/file/upload', [
            'picture' => $image
        ])->assertSeeText("OK khannedy.jpg");
    }
}
