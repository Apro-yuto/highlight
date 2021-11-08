<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/reg', function () {
        return Inertia::render('Reg/Index', ['data' => ['yuto', 'hayashi', 'shu', 'sakadume', 'oowada'], 'user' => Auth::user()]);
    })->name('top');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
