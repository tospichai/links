<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\SocialController;
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

Route::get('/', function () {return view('index');})->name('home');
Route::get('login', [SocialController::class, 'login'])->name('login');
Route::post('login', [SocialController::class, 'loginAuth']);
Route::get('checkusername', [SocialController::class, 'checkusername'])->name('checkusername');
Route::get('register', [SocialController::class, 'register'])->name('register');
Route::post('register', [SocialController::class, 'registerAuth']);
Route::post('logout', [SocialController::class, 'logout'])->name('logout');

Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [SocialController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [SocialController::class, 'callbackFromFacebook'])->name('callback');
});

Route::prefix('manage')->name('manage.')->group(function () {
    Route::get('/', [ManageController::class, 'index'])->name('index');
    Route::get('/add', [ManageController::class, 'add'])->name('add');
    Route::get('/profile', [ManageController::class, 'profile'])->name('profile');
    Route::post('/profile', [ManageController::class, 'updateprofile']);
});

Route::get('/{username}', [DisplayController::class, 'index'])->name('index');
