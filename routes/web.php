<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('home');
});

Route::get('register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'create']);
Route::get('/login', function () {
    return view('user.login');
});
Route::post('login', [UserController::class, 'login']);

Route::get('/success', function () {
    return view('user.success');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});