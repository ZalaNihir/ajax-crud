<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('category/view',[CategoryController::class,'view'])->name('view');
Route::post('category/store',[CategoryController::class,'store'])->name('store');
Route::post('category/{id}/delete',[CategoryController::class,'delete'])->name('delete');

Route::post('category/{id}/edit',[CategoryController::class,'edit'])->name('edit');
Route::post('category/update',[CategoryController::class,'update'])->name('update');
