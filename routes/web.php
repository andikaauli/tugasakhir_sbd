<?php

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

Route::get('/dashboard',[App\Http\Controllers\MusicsController::class, 'index']);

Route::get('/song',[App\Http\Controllers\SongsController::class, 'index']);
Route::post('/song',[App\Http\Controllers\SongsController::class, 'store']);
Route::get('/song/create',[App\Http\Controllers\SongsController::class, 'create']);
Route::delete('/song/{id_songs}',[App\Http\Controllers\SongsController::class, 'destroy']);
Route::get('/song/{id_songs}/edit',[App\Http\Controllers\SongsController::class, 'edit']);
Route::put('/song/{id_songs}',[App\Http\Controllers\SongsController::class, 'update']);

Route::get('/band',[App\Http\Controllers\BandsController::class, 'index']);

Route::get('/member',[App\Http\Controllers\MembersController::class, 'index']);
Route::post('/member',[App\Http\Controllers\MembersController::class, 'store']);
Route::get('/member/create',[App\Http\Controllers\MembersController::class, 'create']);
Route::delete('/member/{id_personil}',[App\Http\Controllers\MembersController::class, 'destroy']);
Route::get('/member/{id_personil}/edit',[App\Http\Controllers\MembersController::class, 'edit']);
Route::put('/member/{id_personil}',[App\Http\Controllers\MembersController::class, 'update']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', function (){
    \Auth::logout();
    return redirect('/home');
});
