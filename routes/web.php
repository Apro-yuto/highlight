<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
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

Route::middleware('guest')->group(function () {
    Route::get('/login/redirect', [AuthController::class, 'redirectLoginPage'])->name('login.redirect');
    Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'item', 'as' => 'item.'], function () {
        Route::get('/', [ItemController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [ItemController::class, 'detail'])->name('detail');
        Route::get('/create', [ItemController::class, 'create'])->name('create');
        Route::put('/detail/{id}/edit', [ItemController::class, 'edit'])->name('edit');
        Route::post('/', [ItemController::class, 'store'])->name('store');
        Route::put('/detail/{id}', [ItemController::class, 'update'])->name('update');
        Route::delete('/detail/{id}', [ItemController::class, 'destroy'])->name('destroy');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
