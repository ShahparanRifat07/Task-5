<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;

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

Route::match(['get', 'post'],'register/' ,[UserController::class,'register'])->name('register');
Route::match(['get', 'post'],'login/' ,[UserController::class,'login'])->name('login');
Route::post('logout/' ,[UserController::class,'logout'])->name('logout');


Route::get('/' ,[TodoController::class,'index'])->name('home')->middleware('auth');;
Route::post('/' ,[TodoController::class,'create'])->name('create-todo')->middleware('auth');;
Route::match(['get', 'patch'],'edit/{todo}' ,[TodoController::class,'edit'])->name('edit-todo')->middleware('auth');
Route::delete('delete/{todo}' ,[TodoController::class,'delete'])->name('delete-todo')->middleware('auth');
