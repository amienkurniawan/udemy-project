<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_storage_local()
    {
        $filesystem = Storage::disk('local'); // jika local akan disimpan distorage saja tidak dipublish secara publik
        $filesystem->put('file.text', 'amien kurniawan');
        $content = $filesystem->get('file.text');
        $this->assertEquals('amien kurniawan', $content);
    }

    public function test_storage_public()
    {
        $filesystem = Storage::disk('public'); // jika public akan disimpan distorage public 
        $filesystem->put('file.text', 'amien kurniawan 1');
        $content = $filesystem->get('file.text');
        $this->assertEquals('amien kurniawan 1', $content);
    }
}
