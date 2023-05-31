<?php

use App\Http\Controllers\Auth\VerifyAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['guest']], function () {
    /*
        Login
    */
    Route::get('/', [VerifyAuthController::class, 'getLogin'])->name('user.login');
    Route::get('login', [VerifyAuthController::class, 'getLogin'])->name('user.login');
    Route::post('login/store', [VerifyAuthController::class, 'login'])->name('user.login.store');
    /*
        Register
    */
    Route::get('register', [VerifyAuthController::class, 'getRegister'])->name('user.register');
    Route::post('register', [VerifyAuthController::class, 'register'])->name('user.register.store');
});
/*
    Dashboard & Logout
*/
Route::get('/dashboard', [VerifyAuthController::class, 'dashboard'])->name('user.dashboard');
Route::get('/logout', [VerifyAuthController::class, 'logout'])->name('user.logout');
Route::get('/profile', [VerifyAuthController::class, 'profile'])->name('user.profile');
Route::put('/profile/store', [VerifyAuthController::class, 'postProfile'])->name('user.profile.store');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/users', UserController::class);
});