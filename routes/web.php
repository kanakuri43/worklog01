<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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

Route::get('/hello', function () {
    return view('hello', ['name' => "Hello World."]);
});

Route::resource('/book', 'App\Http\Controllers\BookController');

Route::get('/report/daily', [ReportController::class, 'daily']);
Route::resource('/report', 'App\Http\Controllers\ReportController');
