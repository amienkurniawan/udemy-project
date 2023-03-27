<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response
    {
        return response('Hello Cookies')
            ->cookie('user-id', 'khannedy', 1000, '/')
            ->cookie('is-member', 'true', 1000, '/');
    }

    public function getCookie(Request $request): JsonResponse
    {
        return response()->json([
            'userId' => $request->cookie('user-id', 'guest'), // memberikan default value cookie user-id
            'isMember' => $request->cookie('is-member', 'false') // memberikan default value cookie is-member
        ]);
    }

    public function clearCookie(Request $request): Response
    {
        return response('Clear Cookie')
            ->withoutCookie('user-id')
            ->withoutCookie('is-member');
    }
}
