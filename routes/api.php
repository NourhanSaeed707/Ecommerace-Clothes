<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WomanClothes;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/women','App\Http\Controllers\WomanClothes');
Route::get('/womencreate',[WomanClothes::class,'create'])->name('womenClothes.create');
Route::post('/womenstore',[WomanClothes::class,'store'])->name('womenClothes.store');
Route::get('/womensearch',function(){
    return view('WomanClothes.search');
})->name('womanClothes.search');
// Route::get('/womensearch',[WomanClothes::class,'search'])->name('womenClothes.search');
Route::get('/womenedit',[WomanClothes::class,'edit'])->name('womenClothes.edit');
Route::get('/womenupdate',[WomanClothes::class,'update'])->name('womenClothes.update');
