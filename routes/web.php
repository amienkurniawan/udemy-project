<?php

use App\Http\Controllers\CookieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/amien', function () {
    return 'amien kurniawan';
});
Route::get('/pzn', function () {
    return 'Hello Programmer Zaman Now';
});
Route::redirect('/youtube', '/pzn');
Route::fallback(function () {
    return "404 by programmer zaman now";
});
Route::view('/hello', 'hello', ['name' => 'amien']);
Route::get('/hello-again', function () {
    return view('hello', ['name' => 'amien']);
});
Route::get('/hello-world', function () {
    return view('hello.world', ['name' => 'amien']);
});

Route::get('/products/{id}', function ($productId) {
    return "Product $productId";
})->name('product.detail');

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name('product.item.detail');

Route::get('categories/{id}', function ($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+')->name('category.detail');

Route::get('/users/{id?}', function ($userId = '404') {
    return "User $userId";
})->name('user.detail');

Route::get('/conflict/eko', function () {
    return "Conflict Eko Kurniawan Khannedy";
});

Route::get('/conflict/{name}', function ($name) {
    return "Conflict $name";
});

Route::get('/product/{id}', function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('/product-redirect/{id}', function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

Route::middleware(['contoh:PZN,401'])->prefix('/middleware')->group(function () {
    Route::get('/api', function () {
        return 'Ok';
    });
});

Route::middleware(['pzn'])->prefix('/middleware')->group(function () {
    Route::get('/group', function () {
        return 'Group';
    });
});

// Route Cookie
Route::controller(CookieController::class)->group(function () {
    Route::get('/cookie/set', 'createCookie');
    Route::get('/cookie/get', 'getCookie');
    Route::get('/cookie/clear', 'clearCookie');
});

// Route Upload file
Route::post('/file/upload', [\App\Http\Controllers\FileController::class, 'upload']);
