<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Adminstrator\SkillController;
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

Route::get('/', [App\Http\Controllers\Front\FrontController::class, 'index'])->name('front');
Route::get('/single{id}', [App\Http\Controllers\Front\FrontController::class, 'blogDetail'])->name('blog.detail');






Auth::routes();

Route::middleware('admin')->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/home/home',App\Http\Controllers\Adminstrator\HomeController::class)->parameters(['home'=>'id']);
    Route::resource('/home/about', App\Http\Controllers\Adminstrator\AboutController::class)->parameters(['about'=>'id']);
    Route::resource('/home/skill', App\Http\Controllers\Adminstrator\SkillController::class)->parameters(['skill'=>'id']);
    Route::resource('/home/blog', App\Http\Controllers\Adminstrator\BlogController::class)->parameters(['blog'=>'id']);


});
