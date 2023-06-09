<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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

Route::get('/', function () {
    $title = "DashBoard";
    return view('dashboard', compact('title'));
})->middleware(['auth', 'verified', 'locked'])->name('dashboard');

Route::get('/dashboard', function () {
    $title = "DashBoard";
    return view('dashboard', compact('title'));
})->middleware(['auth', 'verified', 'locked'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('locked', [AuthenticatedSessionController::class, 'get'])->name('locked');

    Route::post('locked/check', [AuthenticatedSessionController::class, 'post'])->name('locked.check');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'locked'], 'prefix' => 'admin'], function () {
    Route::resource('users', UserController::class);
    Route::resource('setting', SettingController::class);
});