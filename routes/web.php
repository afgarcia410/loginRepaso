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

/*Route::get('/', function () {
    //return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\EnlaceController::class, 'index'])->name('index');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Modificar para que se pueda usar resource
//Route::get('home/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('home/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.edit');
//Route::get('$id/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('user.edit');
//Route::get('home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('home.create');
Route::put('home/update', [App\Http\Controllers\HomeController::class, 'update']);
Route::resource('home/index',App\Http\Controllers\UserController::class);
//Destroy
//Route::delete('home/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.index');
//Route::get('verified', [App\Http\Controllers\SampleRouteController::class, 'verified'])->name('verified')->middleware('verified');

//Enlace
Route::resource('enlace',App\Http\Controllers\EnlaceController::class);
Route::get('enlace/tag/{tag}', [App\Http\Controllers\EnlaceController::class, 'showByTag'])->name('showByTag');

//Comments
Route::resource('comment', App\Http\Controllers\CommentController::class);

