<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Modificar para que se pueda usar resource
Route::get('home/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.edit');
Route::put('home/update', [App\Http\Controllers\HomeController::class, 'update']);
Route::get('verified', [App\Http\Controllers\SampleRouteController::class, 'verified'])->name('verified')->middleware('verified');
