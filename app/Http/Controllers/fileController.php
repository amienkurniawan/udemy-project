<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class fileController extends Controller
{
    public function upload(Request $request): string
    {

        $picture = $request->file('picture');

        $picture->storePubliclyAs("pictures", $picture->getClientOriginalName(), "public");

        return "OK " . $picture->getClientOriginalName();
    }
}
