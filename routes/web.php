<?php

use App\Http\Controllers\AjaxuploadController;
use App\Http\Controllers\CategoryController;
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
//AjaxUpload
Route::get('/',[AjaxuploadController::class,'index'])->name('index');
Route::get('/ajax',[AjaxuploadController::class,'ajax'])->name('ajax');
Route::post('/store',[AjaxuploadController::class,'store'])->name('store');
Route::get('/delete/{id}',[AjaxuploadController::class,'delete'])->name('delete');
Route::get('/edit/{id}',[AjaxuploadController::class,'edit'])->name('edit');
Route::post('/update',[AjaxuploadController::class,'update'])->name('update');

//Api routes
